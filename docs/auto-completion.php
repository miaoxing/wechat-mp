<?php

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpAccountModel $wechatMpAccountModel
 */
class WechatMpAccountModelMixin
{
}

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpAccountModel $wechatMpAccountModel
 */
class WechatMpAccountModelPropMixin
{
}

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpApi $wechatMpApi
 */
class WechatMpApiMixin
{
}

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpApi $wechatMpApi
 */
class WechatMpApiPropMixin
{
}

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpUserModel $wechatMpUserModel
 */
class WechatMpUserModelMixin
{
}

/**
 * @property    Miaoxing\WechatMp\Service\WechatMpUserModel $wechatMpUserModel
 */
class WechatMpUserModelPropMixin
{
}

/**
 * @mixin WechatMpAccountModelMixin
 * @mixin WechatMpApiMixin
 * @mixin WechatMpUserModelMixin
 */
class AutoCompletion
{
}

/**
 * @return AutoCompletion
 */
function wei()
{
    return new AutoCompletion();
}

/** @var Miaoxing\WechatMp\Service\WechatMpAccountModel $wechatMpAccount */
$wechatMpAccount = wei()->wechatMpAccountModel;

/** @var Miaoxing\WechatMp\Service\WechatMpAccountModel|Miaoxing\WechatMp\Service\WechatMpAccountModel[] $wechatMpAccounts */
$wechatMpAccounts = wei()->wechatMpAccountModel();

/** @var Miaoxing\WechatMp\Service\WechatMpApi $wechatMpApi */
$wechatMpApi = wei()->wechatMpApi;

/** @var Miaoxing\WechatMp\Service\WechatMpUserModel $wechatMpUser */
$wechatMpUser = wei()->wechatMpUserModel;

/** @var Miaoxing\WechatMp\Service\WechatMpUserModel|Miaoxing\WechatMp\Service\WechatMpUserModel[] $wechatMpUsers */
$wechatMpUsers = wei()->wechatMpUserModel();
