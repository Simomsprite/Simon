<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/16
 * Time: 10:53
 */

namespace app\lib\exception;


class SuccessMessage extends BaseException
{
    public $code=201;
    public $msg='Ok';
    public $errorCode=0;

}