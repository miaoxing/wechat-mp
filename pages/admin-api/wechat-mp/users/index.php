<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\Services\Page\CollGetTrait;
use Miaoxing\WechatMp\Service\WechatMpUserModel;

return new class () extends BaseController {
    use CollGetTrait;

    public function createModel()
    {
        return WechatMpUserModel::new();
    }
};
