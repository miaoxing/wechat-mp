<?php

namespace Miaoxing\WechatMp\Migration;

use Wei\Migration\BaseMigration;

class V20221108110654AddEnvToWechatMpAccountsTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('wechat_mp_accounts')
            ->uTinyInt('env')->defaults(1)->comment('小程序环境')->after('is_authed')
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->table('wechat_mp_accounts')
            ->dropColumn('env')
            ->exec();
    }
}
