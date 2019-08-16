<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/13
 * Time: 15:56
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends BaseModel
{
    protected $hidden=['update_time','delete_time'];
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        $banner=self::with(['items','items.img'])->find($id);
        return $banner;
    }
}