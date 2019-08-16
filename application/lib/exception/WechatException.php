<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 15:54
 */

namespace app\lib\exception;


class WechatException extends BaseException
{
    public $code=400;
    public $msg='WeChat server interface call failed';
    public $errorCode=999;
}