<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/11
 * Time: 10:52
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;//别名

class Category
{
 public function getAllCategories(){
       $categories = CategoryModel::all([],"img");
     if($categories -> isEmpty()) {
           throw new CategoryException();
       }
      return $categories;
 }
}