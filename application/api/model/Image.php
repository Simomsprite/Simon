<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden=['from','delete_time','update_time','id'];

    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}
