<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/16
 * Time: 15:45
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code=403;
    public $msg='权限不够';
    public $errorCode=10001;
}