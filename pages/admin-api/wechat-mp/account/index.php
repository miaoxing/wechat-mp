<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;
use Wei\V;

return new class () extends BaseController {
    public function get()
    {
        return $this->getAccount()->toRet();
    }

    public function patch($req)
    {
        $account = $this->getAccount();

        $v = V::defaultOptional();
        $v->maxCharLength('nickName', '名称', 16);
        $v->imageUrl('headName', '头像')->allowEmpty();
        $v->maxCharLength('applicationId', 'AppID（应用ID）', 32);
        $v->maxCharLength('applicationSecret', 'AppSecret（应用密钥）', 64);
        $data = $v->assert($req);

        $account->save($data);

        return $account->toRet();
    }

    protected function getAccount()
    {
        return WechatMpAccountModel::findOrInitBy();
    }
};
