<?php

namespace MiaoxingTest\WechatMp\Pages\Api\Login;

use Miaoxing\Plugin\Service\Tester;
use Miaoxing\Plugin\Test\BaseTestCase;
use Miaoxing\WechatMp\Service\WechatMpApi;

class IndexTest extends BaseTestCase
{
    public function testPost()
    {
        $wechatMpApi = $this->getMockBuilder(WechatMpApi::class)
            ->addMethods(['snsJsCode2Session'])
            ->getMock();
        $this->registerMockServices(WechatMpApi::class, $wechatMpApi);

        $wechatMpApi->expects($this->once())
            ->method('snsJsCode2Session')
            ->willReturn(suc([
                'openid' => 'test-openid',
                'unionid' => 'test-unionid',
                'session_key' => 'test',
            ]));

        $ret = Tester::request(['code' => 'test'])->post('/api/wechat-mp/login');
        $this->assertRetSuc($ret);
    }
}
