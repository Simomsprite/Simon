<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/14
 * Time: 19:43
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected  $rule=[
        'count'=>'isPostiveInteger|between:1,15',
    ];
}