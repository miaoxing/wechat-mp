<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseService;
use Miaoxing\User\Service\UserModel;
use Wei\Ret;

/**
 * @mixin \LoggerMixin
 * @experimental
 */
class WechatMpSubscribeMessage extends BaseService
{
    /**
     * @param UserModel $user
     * @param array{template_id: string, data: array} $options
     * @return Ret
     * @svc
     */
    protected function send(UserModel $user, array $options): Ret
    {
        $api = WechatMpApi::instance();

        if (!isset($options['miniprogram_state'])) {
            $options['miniprogram_state'] = $api->getAccount()->getMiniProgramState();
        }

        return $this->sendByApi($user, $options, $api);
    }

    /**
     * @param UserModel $user
     * @param array{template_id: string, data: array} $options
     * @param WechatMpApi $api
     * @return Ret
     * @svc
     */
    protected function sendByApi(UserModel $user, array $options, WechatMpApi $api): Ret
    {
        $mpUser = WechatMpUserModel::findOrInitBy(['userId' => $user->id]);

        $ret = $api->sendSubscribeMessage(array_merge([
            'touser' => $mpUser->openId,
        ], $options));

        $this->logger->info('Send subscribe message result', $ret);

        return $ret;
    }
}
