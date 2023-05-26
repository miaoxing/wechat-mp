<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;

return new class () extends BaseController {
    public function get()
    {
        $account = WechatMpAccountModel::findOrInitBy();

        return suc([
            'data' => $account->toArray([
                'nickName',
                'headImg',
            ]),
        ]);
    }
};
