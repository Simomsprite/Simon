<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/14
 * Time: 18:26
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code=404;
    public $msg='The specified topic does not exist, please check the topic ID';
    public $errorCode=30000;
}