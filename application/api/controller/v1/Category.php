<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/15
 * Time: 11:45
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
        //$categories=CategoryModel::all([],'img');
        $categories=new CategoryModel();
        $result=$categories->with('img')->select();
        if (!$result){
            throw new CategoryException();
        }
        return json($result);
    }
}