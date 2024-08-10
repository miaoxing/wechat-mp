<?php

use Miaoxing\Plugin\BasePage;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;

return new class extends BasePage {
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
