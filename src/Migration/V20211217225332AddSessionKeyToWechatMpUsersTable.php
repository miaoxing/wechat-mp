<?php

namespace Miaoxing\WechatMp\Migration;

use Wei\Migration\BaseMigration;

class V20211217225332AddSessionKeyToWechatMpUsersTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('wechat_mp_users')
            ->char('session_key', 24)->after('language')
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->table('wechat_mp_users')
            ->dropColumn('session_key')
            ->exec();
    }
}
