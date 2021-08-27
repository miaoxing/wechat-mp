<?php

namespace MiaoxingTest\WechatMp\Pages\MApi\Login;

use Miaoxing\Plugin\Service\Tester;
use Miaoxing\Plugin\Test\BaseTestCase;
use Miaoxing\Wechat\Service\WechatApi;
use Miaoxing\WechatMp\Service\WechatMpAccountModel;

class IndexTest extends BaseTestCase
{
    public function testPost()
    {
        $wechatApi = $this->getMockBuilder(WechatApi::class)
            ->addMethods(['snsJsCode2Session'])
            ->getMock();

        $account = $this->getModelServiceMock(WechatMpAccountModel::class, [
            'findBy',
            'getApi',
        ]);

        $account->expects($this->once())
            ->method('getApi')
            ->willReturn($wechatApi);

        $wechatApi->expects($this->once())
            ->method('snsJsCode2Session')
            ->willReturn(suc([
                'openid' => 'test-openid',
                'unionid' => 'test-unionid',
            ]));

        $account->expects($this->once())
            ->method('findBy')
            ->willReturn($account);

        $ret = Tester::request(['code' => 'test'])->post('/m-api/wechat-mp/login');
        $this->assertRetSuc($ret);
    }
}
