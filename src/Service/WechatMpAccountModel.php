<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseModel;
use Miaoxing\Plugin\Model\HasAppIdTrait;
use Miaoxing\Plugin\Model\ModelTrait;
use Miaoxing\Plugin\Model\SnowflakeTrait;
use Miaoxing\Wechat\Service\WechatApi;
use Miaoxing\WechatMp\Metadata\WechatMpAccountTrait;

class WechatMpAccountModel extends BaseModel
{
    use HasAppIdTrait;
    use ModelTrait;
    use SnowflakeTrait;
    use WechatMpAccountTrait;

    /**
     * @var WechatApi
     */
    protected $api;

    /**
     * 获取当前账号的微信 API 服务
     *
     * @return WechatApi
     */
    public function getApi(): WechatApi
    {
        if (!$this->api) {
            $this->api = new WechatApi([
                'wei' => $this->wei,
                'appId' => $this->applicationId,
                'appSecret' => $this->applicationSecret,
            ]);
        }
        return $this->api;
    }
}
