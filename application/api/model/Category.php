<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 11:46
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden=['delete_time','update_time'];
    public  function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}