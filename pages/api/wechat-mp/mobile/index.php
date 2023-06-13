<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\Plugin\Service\User;
use Miaoxing\User\Service\UserModel;
use Miaoxing\WechatMp\Service\WechatMpApi;
use Wei\Time;

return new class () extends BaseController {
    public function patch($req)
    {
        $ret = WechatMpApi::post([
            'url' => 'wxa/business/getuserphonenumber',
            'data' => [
                'code' => $req['code'],
            ],
        ]);
        if ($ret->isErr()) {
            return $ret;
        }

        $mobile = $ret['phone_info']['phoneNumber'];
        if (!isset($req['save']) || $req['save']) {
            $this->updateUser($mobile);
        }

        return suc([
            'mobile' => $mobile,
        ]);
    }

    protected function updateUser($mobile)
    {
        // 更新手机号为当前用户
        UserModel::where('mobile', $mobile)
            ->whereNotNull('mobileVerifiedAt')
            ->update([
                'mobile' => '',
                'mobileVerifiedAt' => null,
            ]);
        User::cur()->saveAttributes([
            'mobile' => $mobile,
            'mobileVerifiedAt' => Time::now(),
        ]);
    }
};
