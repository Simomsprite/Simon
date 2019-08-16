<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/14
 * Time: 17:54
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule=[
        'ids'=>'require|checkIDs'
    ];

    protected $message=[
        'ids'=>'The ids parameter must be a positive integer separated by commas'
    ];

    protected function checkIDs($value){
        $value=explode(',',$value);
        if (empty($value)){
            return false;
        }
        foreach ($value as $id){
            if (!$this->isPostiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}