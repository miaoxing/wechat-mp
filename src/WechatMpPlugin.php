<?php

namespace Miaoxing\WechatMp;

use Miaoxing\Plugin\BasePlugin;
use Miaoxing\Wxa\Payment\WxaPay;

class WechatMpPlugin extends BasePlugin
{
    /**
     * {@inheritdoc}
     */
    protected $name = '微信小程序';

    protected $code = 212;

    public function onAdminNavGetNavs(&$navs, &$categories, &$subCategories)
    {
        $subCategories[] = [
            'parentId' => 'setting',
            'url' => 'admin/wechat-mp/account',
            'name' => '小程序设置',
        ];

        $subCategories[] = [
            'parentId' => 'user',
            'url' => 'admin/wechat-mp/users',
            'name' => '小程序用户管理',
            'sort' => 900,
        ];
    }

    public function onPaymentGetTypes(&$types)
    {
        $types['wxaPay'] = [
            'id' => 'wxaPay',
            'type' => 'wxaPay',
            'name' => '微信支付',
            'displayName' => '微信支付-小程序',
            'image' => '/plugins/payment/images/wechat.png',
            'class' => WxaPay::class,
        ];
    }
}
