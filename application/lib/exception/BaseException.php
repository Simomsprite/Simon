<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/13
 * Time: 17:05
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code=400;
    public $msg="param error";
    public $errorCode=10000;

    /**
     * BaseException constructor.
     * @param int $code
     * @param string $msg
     * @param int $errorCode
     */
    public function __construct($params=[])
    {
        if(!is_array($params)){
            return;
            //throw new Exception('params must be an array');
        }if (array_key_exists('code',$params)) {
            $this->code = $params['code'];
        }if (array_key_exists('msg',$params)) {
        $this->msg = $params['msg'];
        }if (array_key_exists('errorCode',$params)) {
        $this->errorCode = $params['errorCode'];
    }
    }


}