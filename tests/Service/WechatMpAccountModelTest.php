<?php

namespace MiaoxingTest\WechatOa\Service;

use Miaoxing\Plugin\Test\BaseTestCase;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;

class WechatMpAccountModelTest extends BaseTestCase
{
    public function testGetApi()
    {
        $account = WechatMpAccountModel::new([
            'applicationId' => 'appId',
            'applicationSecret' => 'appSecret',
        ]);

        $api = $account->getApi();
        $this->assertSame('appId', $api->getAppId());
        $this->assertSame('appSecret', $api->getAppSecret());

        $api2 = $account->getApi();
        $this->assertSame($api, $api2);
    }
}
