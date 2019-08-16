<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 16:40
 */
namespace app\api\service;

use app\lib\exception\TokenException;
use think\Cache;
use think\Request;

class Token
{
    public static function generateToken()
    {
        $randChars = getRandChar(32);
        $timestame=$_SERVER('REQUEST_TIME_FLOAT');
        $salt=config('secure.token_salt');
        return md5($randChars.$timestame.$salt);
    }

    public static function getCurrentToKenVar($key){
        $token=Request::instance()->header('token');
        $vars=Cache::get($token);
        if (!$vars){
            throw new TokenException();
        }else{
            if (!is_array($vars)) {
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    public static function getCurrentUid(){
        $uid=self::getCurrentToKenVar('uid');
        return $uid;
    }
}