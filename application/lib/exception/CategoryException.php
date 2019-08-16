<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 12:06
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code=400;
    public $msg='指定的类目不存在，请检查分类';
    public $errorCode=50000;
}