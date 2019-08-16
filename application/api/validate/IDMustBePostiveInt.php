<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/12
 * Time: 19:48
 */
namespace app\api\validate;
use app\api\validate\BaseValidate;

class IDMustBePostiveInt extends BaseValidate {
    protected $rule=[
        'id'=>'require|isPostiveInteger',
    ];

    protected $message=[
        'id'=>'id must be is integer',
    ];
}