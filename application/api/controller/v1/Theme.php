<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;
use think\Controller;
use think\Request;
use app\api\model\Theme as ThemeModel;
class Theme
{
    public function getSimpleList($ids=''){
        (new IDCollection())->goCheck();
        $ids=explode(',',$ids);
        $result=ThemeModel::with('topicImg,headImg')->select($ids);
        if (!$result){
            throw new ThemeException();
        }
        return json($result);
    }

    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme=ThemeModel::getThemeWithProducts($id);
        if (!$theme){
            throw new ThemeException();
        }
        return json($theme);
    }
}
