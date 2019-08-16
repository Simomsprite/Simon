<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 17:06
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code=401;
    public $msg='Token has expired or invalid Token';
    public $errorCode=10001;
}