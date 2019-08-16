<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/13
 * Time: 18:31
 */

namespace app\lib\exception;


class ParameterException extends  BaseException
{
    public $code=400;
    public $msg='param error';
    public $errorCode=10000;
}