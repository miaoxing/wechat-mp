<?php

namespace Miaoxing\WechatMp\Service;

use Miaoxing\Plugin\BaseModel;
use Miaoxing\Plugin\Model\HasAppIdTrait;
use Miaoxing\Plugin\Model\ModelTrait;
use Miaoxing\Plugin\Model\SnowflakeTrait;
use Miaoxing\User\Service\UserModel;
use Miaoxing\WechatMp\Metadata\WechatMpUserTrait;

/**
 * @property UserModel $user
 */
class WechatMpUserModel extends BaseModel
{
    use HasAppIdTrait;
    use ModelTrait;
    use SnowflakeTrait;
    use WechatMpUserTrait;

    public function user(): UserModel
    {
        return $this->belongsTo(UserModel::class);
    }
}
