<?php

namespace Miaoxing\WechatMp;

use Miaoxing\Admin\Service\AdminMenu;
use Miaoxing\App\Service\PermissionMap;
use Miaoxing\Plugin\BasePlugin;
use Miaoxing\Wxa\Payment\WxaPay;

class WechatMpPlugin extends BasePlugin
{
    /**
     * {@inheritdoc}
     */
    protected $name = '微信小程序';

    protected $code = 212;

    public function onAdminMenuGetMenus(AdminMenu $menu)
    {
        $menu->child('setting')->addChild()->setLabel('小程序设置')->setUrl('admin/wechat-mp/account');

        $menu->child('user')->addChild()->setLabel('小程序用户管理')->setUrl('admin/wechat-mp/users')->setSort(900);
    }

    public function onPermissionGetMap(PermissionMap $map)
    {
        $map->prefix('admin/wechat-mp', function (PermissionMap $map) {
            $map->add('account', [
                'PATCH api/admin/wechat-mp/account'
            ]);
            $map->addList('users');
        });
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
