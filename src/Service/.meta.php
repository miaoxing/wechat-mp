<?php

namespace Miaoxing\WechatMp\Service;

use Wei\Ret;

class WechatMpApi
{
    /**
     * 获取凭证
     *
     * @param array{appid?: string, secret?: string} $data
     * @return Ret|array{access_token: string, expires_in: int}
     */
    public function getToken(array $data = []): Ret
    {
        return suc();
    }

    /**
     * 获取小程序登录凭证校验
     *
     * @param array{js_code: string} $data
     * @return Ret|array{openid: string, session_key: string, unionid?: string, errcode: int, errmsg: string}
     */
    public function snsJsCode2Session(array $data): Ret
    {
        return suc();
    }

    /**
     * 发送订阅消息
     *
     * @param array{template_id: string, touser: string, miniprogram_state: string, data: array} $data
     * @return Ret|array{openid: string, session_key: string, unionid?: string, errcode: int, errmsg: string}
     */
    public function sendSubscribeMessage(array $data): Ret
    {
        return suc();
    }

    /**
     * 获取小程序码，永久有效，数量暂无限制
     *
     * @param array $data
     * @return Ret
     */
    public function getWxaCodeUnlimited(array $data): Ret
    {
        return suc();
    }

    /**
     * 下发小程序和公众号统一的服务消息
     *
     * @param array{touser: string, weapp_template_msg: array, mp_template_msg: array} $data
     * @return Ret|array{errcode: int, errmsg: string}
     * @deprecated 已下线，需使用服务号发送消息
     */
    public function sendUniformMessage(array $data): Ret
    {
        return suc();
    }
}
