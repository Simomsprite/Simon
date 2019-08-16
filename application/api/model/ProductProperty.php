<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 18:23
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected  $hidden=['product_id','delete_time','id'];
}