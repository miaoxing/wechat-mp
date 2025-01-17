<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseModel;
use Miaoxing\Plugin\Model\HasAppIdTrait;
use Miaoxing\Plugin\Model\MineTrait;
use Miaoxing\Plugin\Model\ModelTrait;
use Miaoxing\Plugin\Model\ReqQueryTrait;
use Miaoxing\Plugin\Model\SnowflakeTrait;
use Miaoxing\User\Service\UserModel;

/**
 * @property UserModel $user
 * @property string|null $id
 * @property string $appId 应用编号
 * @property string $userId 用户编号
 * @property string $openId 微信用户 OpenID
 * @property string $unionId 微信用户 UnionID
 * @property string $nickName 昵称
 * @property string $avatarUrl 头像地址
 * @property string $origAvatarUrl 原始微信头像地址
 * @property int $gender 性别。0:未知;1:男;2:女
 * @property string $country 国家
 * @property string $province 城市
 * @property string $city 省份
 * @property string $language 语言
 * @property string $sessionKey
 * @property string|null $updatedInfoAt 最后更新信息时间
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string $createdBy
 * @property string $updatedBy
 */
class WechatMpUserModel extends BaseModel
{
    use HasAppIdTrait;
    use MineTrait;
    use ModelTrait;
    use ReqQueryTrait;
    use SnowflakeTrait;

    public function user(): UserModel
    {
        return $this->belongsTo(UserModel::class);
    }
}
