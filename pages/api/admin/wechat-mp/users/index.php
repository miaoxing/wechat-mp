<?php

use Miaoxing\Plugin\BasePage;
use Miaoxing\Services\Page\CollGetTrait;
use Miaoxing\WechatMp\Service\WechatMpUserModel;

return new class () extends BasePage {
    use CollGetTrait;

    public function createModel()
    {
        return WechatMpUserModel::new();
    }
};
