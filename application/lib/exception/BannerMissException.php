<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/13
 * Time: 17:08
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code=404;
    public $msg='request: Banner not found';
    public $errorCode=40000;//40000表示Banner不存在
}