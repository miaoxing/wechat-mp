<?php

use Miaoxing\File\Service\File;
use Miaoxing\Plugin\BasePage;
use Miaoxing\Plugin\Service\User;
use Miaoxing\WechatMp\Service\WechatMpUserModel;
use Wei\Req;
use Wei\Time;

return new class () extends BasePage {
    public function patch(Req $req)
    {
        $mpUser = WechatMpUserModel::findByOrFail('userId', User::id());

        $mpUser->save([
            'nickName' => $req['nickName'],
            'gender' => $req['gender'],
            'language' => $req['language'],
            'city' => $req['city'],
            'province' => $req['province'],
            'country' => $req['country'],
            'avatarUrl' => $this->getAvatarUrl($mpUser->origAvatarUrl, $req['avatarUrl'], $mpUser->openId),
            'origAvatarUrl' => $req['avatarUrl'],
            'updatedInfoAt' => Time::now(),
        ]);

        // 同步资料到主表
        $user = User::cur();
        $columns = [
            'nickName',
            'sex' => 'gender',
            'city',
            'province',
            'country',
            'avatar' => 'avatarUrl',
        ];
        foreach ($columns as $column => $mpColumn) {
            if (is_int($column)) {
                $column = $mpColumn;
            }
            // NOTE: 暂无修改资料的入口，全部同步到用户主表
            $user->set($column, $mpUser->get($mpColumn));
        }
        if ($user->isChanged()) {
            $user->save();
        }

        return suc();
    }

    /**
     * @todo 移到队列去下载
     */
    private function getAvatarUrl(string $origAvatarUrl, string $avatarUrl, string $openId): string
    {
        if ($origAvatarUrl === $avatarUrl) {
            return '';
        }

        if (!$avatarUrl) {
            return '';
        }

        $ret = File::saveRemote($avatarUrl, [
            'path' => implode('/', [
                'wechat-mp',
                substr($openId, -3), // 前 6 位固定，因此使用后面字符层的分目录
                $openId . '.jpg',
            ]),
        ]);
        if ($ret->isSuc()) {
            $avatarUrl = $ret['data']['url'];
        }

        return $avatarUrl;
    }
};
