<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 19:24
 */

namespace app\api\controller\v1;

use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\validate\AddressNew;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;

class Address extends Controller
{
    protected $beforeActionList=[
        'checkPrimaryScope'=>['only'=>'createOrUpdateAddress']
    ];

    protected function checkPrimaryScope(){
        $scope=TokenService::getCurrentToKenVar('scope');
        if($scope){
                if ($scope>=ScopeEnum::User){
                    return true;
                }else{
                    throw new ForbiddenException();
                }
            }else{
            throw new TokenException();
        }
    }

    public function createOrUpdateAddress(){
        $validate=new AddressNew();
        $validate->goCheck();
        $uid=TokenService::getCurrentUid();
        $user=UserModel::get($uid);
        if (!$user){
            throw new UserException();
        }
        $dataArray=$validate->getDataByRule(input('post.'));

        $userAddress=$user->address;
        if (!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return json(new SuccessMessage(),201);
    }
}