<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/12
 * Time: 19:09
 */
namespace app\api\controller\v2;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
{
    public function getBanner($id,$version)
    {

       return 'this is v2';
    }
}