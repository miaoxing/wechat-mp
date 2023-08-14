<?php

use Miaoxing\Plugin\BasePage;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;
use Wei\V;

return new class () extends BasePage {
    public function get()
    {
        return $this->getAccount()->toRet();
    }

    public function patch($req)
    {
        $account = $this->getAccount();

        $v = V::defaultOptional();
        $v->setModel($account);
        $v->modelColumn('nickName', '名称');
        $v->imageUrl('headName', '头像')->allowEmpty();
        $v->modelColumn('applicationId', 'AppID（应用ID）');
        $v->modelColumn('applicationSecret', 'AppSecret（应用密钥）');
        $v->modelColumn('env', '小程序环境');
        $data = $v->assert($req);

        $account->save($data);

        return $account->toRet();
    }

    protected function getAccount()
    {
        return WechatMpAccountModel::findOrInitBy();
    }
};
