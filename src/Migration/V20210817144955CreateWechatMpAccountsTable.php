<?php

namespace Miaoxing\WechatMp\Migration;

use Wei\Migration\BaseMigration;

class V20210817144955CreateWechatMpAccountsTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('wechat_mp_accounts')->tableComment('微信小程序账号')
            ->bigId()
            ->uBigInt('app_id')->comment('应用编号')
            ->string('source_id', 32)->comment('微信原始ID')
            ->string('nick_name', 16)->comment('昵称')
            ->string('head_img')->comment('头像')
            ->string('application_id', 32)->comment('应用ID')
            ->string('application_secret', 64)->comment('应用密钥')
            ->string('token', 32)->comment('消息签名参数')
            ->string('encoding_aes_key', 64)->comment('消息加密密钥')
            ->bool('is_verified')->comment('是否认证')
            ->bool('is_authed')->comment('是否已通过第三方平台授权')
            ->string('refresh_token', 64)->comment('授权方的刷新令牌')
            ->string('verify_ticket', 128)->comment('component_verify_ticket')
            ->string('func_info', 1024)->comment('授权给开发者的权限集列表')
            ->string('business_info', 1024)->comment('功能的开通状况')
            ->timestamps()
            ->userstamps()
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->dropIfExists('wechat_mp_accounts');
    }
}
