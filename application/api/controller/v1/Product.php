<?php
/**
 * Created by PhpStorm.
 * User: ASR
 * Date: 2019/8/14
 * Time: 19:41
 */

namespace app\api\controller\v1;
use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;
class Product
{
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products= ProductModel::getMostRecent($count);
        if (!$products){
            throw new ProductException();
        }
        return json($products);
    }

    public function getAllCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $allCategory=ProductModel::getProductsByCategoryID($id);
        if (!$allCategory){
            throw new ProductException();
        }
        return json($allCategory);
    }

    public function getOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $product=ProductModel::getProductDetail($id);
        if (!$product){
            throw new ProductException();
        }
        return json($product);
    }
}