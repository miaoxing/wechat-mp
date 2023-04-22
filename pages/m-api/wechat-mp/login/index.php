<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\Plugin\Service\User;
use Miaoxing\User\Service\UserModel;
use Miaoxing\WechatMp\Service\WechatMpApi;
use Miaoxing\WechatMp\Service\WechatMpUserModel;

return new class () extends BaseController {
    protected $controllerAuth = false;

    public function post($req)
    {
        // 1. code 换取 OpenID
        $ret = WechatMpApi::snsJsCode2Session(['js_code' => $req['code']]);
        if ($ret->isErr()) {
            return $ret;
        }

        // 2. 创建用户并登录
        $mpUser = WechatMpUserModel::findOrInitBy(['openId' => $ret['openid']]);
        if (isset($ret['unionid'])) {
            $mpUser->unionId = $ret['unionid'];
        }

        if ($mpUser->isNew()) {
            $user = UserModel::save();
            $mpUser->userId = $user->id;
        } else {
            $user = $mpUser->user;
        }

        $mpUser->sessionKey = $ret['session_key'];
        $mpUser->save();

        $ret = User::loginByModel($user);

        return $ret;
    }
};
