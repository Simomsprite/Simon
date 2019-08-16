<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/16
 * Time: 11:30
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden=['id','delete_time','user_id'];
}