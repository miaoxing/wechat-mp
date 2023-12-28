<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseService;
use Miaoxing\Wechat\WechatApiTrait;
use Wei\Ret;

/**
 * @method static Ret snsJsCode2Session(array $data)
 * @method static Ret sendSubscribeMessage(array $data)
 * @method static Ret getWxaCodeUnlimited(array $data)
 * @method static Ret sendUniformMessage(array $data) @deprecated 已下线，需使用服务号发送消息
 */
class WechatMpApi extends BaseService
{
    use WechatApiTrait;

    /**
     * @var WechatMpAccountModel
     */
    protected $account;

    protected $configs = [
        'snsJsCode2Session' => [
            'url' => 'sns/jscode2session?grant_type=authorization_code',
            'method' => 'GET',
            'accessToken' => false,
            'data' => [
                'appid' => '',
                'secret' => '',
            ],
        ],
        'sendSubscribeMessage' => 'cgi-bin/message/subscribe/send',
        'getWxaCodeUnlimited' => [
            'url' => 'wxa/getwxacodeunlimit',
            'dataType' => 'text',
        ],
        'sendUniformMessage' => 'cgi-bin/message/wxopen/template/uniform_send',
    ];

    public function getAccount(): WechatMpAccountModel
    {
        if (!$this->account) {
            $this->account = WechatMpAccountModel::findOrInitBy();
        }
        return $this->account;
    }

    protected function loadApp()
    {
        $account = $this->getAccount();
        $this->appId = $account->applicationId;
        $this->appSecret = $account->applicationSecret;
    }
}
