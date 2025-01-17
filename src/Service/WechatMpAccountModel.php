<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseModel;
use Miaoxing\Plugin\Model\HasAppIdTrait;
use Miaoxing\Plugin\Model\ModelTrait;
use Miaoxing\Plugin\Model\SnowflakeTrait;
use Miaoxing\Wechat\Service\WechatApi;

/**
 * @property string|null $id
 * @property string $appId 应用编号
 * @property string $sourceId 微信原始ID
 * @property string $nickName 昵称
 * @property string $headImg 头像
 * @property string $applicationId 应用ID
 * @property string $applicationSecret 应用密钥
 * @property string $token 消息签名参数
 * @property string $encodingAesKey 消息加密密钥
 * @property bool $isVerified 是否认证
 * @property bool $isAuthed 是否已通过第三方平台授权
 * @property int $env 小程序环境
 * @property string $refreshToken 授权方的刷新令牌
 * @property string $verifyTicket component_verify_ticket
 * @property string $funcInfo 授权给开发者的权限集列表
 * @property string $businessInfo 功能的开通状况
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string $createdBy
 * @property string $updatedBy
 */
class WechatMpAccountModel extends BaseModel
{
    use HasAppIdTrait;
    use ModelTrait;
    use SnowflakeTrait;

    /**
     * @var WechatApi
     */
    protected $api;

    /**
     * @var string[]
     */
    protected $miniProgramStats = [
        1 => 'formal',
        2 => 'trial',
        3 => 'developer',
    ];

    /**
     * @var string[]
     */
    protected $envVersions = [
        1 => 'develop',
        2 => 'trial',
        3 => 'release',
    ];

    /**
     * 获取当前账号的微信 API 服务
     *
     * @return WechatApi
     */
    public function getApi(): WechatApi
    {
        if (!$this->api) {
            $this->api = new WechatApi([
                'wei' => $this->wei,
                'appId' => $this->applicationId,
                'appSecret' => $this->applicationSecret,
            ]);
        }
        return $this->api;
    }

    /**
     * @return string
     */
    public function getMiniProgramState(): string
    {
        return $this->miniProgramStats[$this->env];
    }

    /**
     * @return string
     */
    public function getEnvVersion(): string
    {
        return $this->envVersions[$this->env];
    }
}
