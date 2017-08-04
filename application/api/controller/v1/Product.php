<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/10
 * Time: 15:36
 */

namespace app\api\controller\v1;
/*
 * @url: api/v1/Product/...
 * */

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\ProductException;
use app\lib\exception\ParameterException;//别名

class Product
{
 public function getRecent($count = 15){
     (new Count()) -> goCheck(); //校验id
     $products = ProductModel::getMostRecent($count); //模型对象
     if($products->isEmpty()){
         throw new ParameterException();
     }
     $products = $products ->hidden(["summary"]);
     return $products;
 }
 //商品分类模型
    public function getAllInCategory($id){
        (new ProductException())->goCheck();
        $products = ProductModel::getProdutsByCategoryID($id);
        if($products->isEmpty()){
           throw new ParameterException();
        }
        $products = $products ->hidden(["summary"]);
        return $products;

    }
}