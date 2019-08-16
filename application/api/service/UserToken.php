<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 14:53
 */
namespace app\api\service;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WechatException;
use app\api\model\User as UserModel;
use app\api\service\Token;
use Symfony\Component\Yaml\Tests\DumperTest;
use think\Exception;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    /**
     * UserToken constructor.
     * @param $code
     * @param $wxAppID
     * @param $wxAppSecret
     * @param $wxLoginUrl
     */
    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),
        $this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get(){
        $result=curl_get($this->wxLoginUrl);
        $wxResult=json_decode($result,true);
        dump($result);
        if (empty($wxresult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }else{
            $loginFail=array_key_exists('errcode',$wxResult);
            if ($loginFail){
                $this->processLoginError($wxResult);
            }else{
               return  $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        $openid=$wxResult['openid'];
        $user=UserModel::getByOpenID($openid);
        if ($user){
            $uid=$user->id;
        }else{
            $uid=$this->newUser($openid);
        }
        $cachedValue=$this->prepareCachedValue($wxResult,$uid);
        $token=$this->saveToCache($cachedValue);
        return $token;
    }

    private function saveToCache($cacheValue){
        $key=self::generateToken();
        $value=json_encode($cacheValue);
        $expire_in=config('setting.token_expire_in');
        $request=cache($key,$value,$expire_in);
        if (!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005,
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wxResult,$uid){
        $cacheValue=$wxResult;
        $cacheValue['uid']=$uid;
        $cacheValue['scope']=ScopeEnum::User;
        return $cacheValue;
    }

    private function newUser($openid){
        $user=UserModel::create([
           'openid'=>$openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult){
        throw new WechatException([
            'msg'=>$wxResult['errmsg'],
            'errorCode'=>$wxResult['errCode']
        ]);
    }
}