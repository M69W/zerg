<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/8
 * Time: 15:14
 */

namespace app\api\model;


class Product extends BaseModel
{
     protected  $hidden = ["category_id","from","create_time","update_time","pivot"]; //私有变量
   public function getMainImgUrlAttr($value,$data){ //调用本地地址
       return $this -> prefixImgUrl($value,$data);
   }
 public static function getMostRecent($count){ //字符串倒序排列
      $products = self::limit($count)
          ->order("create_time desc")
          ->select(); //desc表示降序
      return $products;
 }
 //商品分类模型
    public static function getProdutsByCategoryID($categoryID)
    {
        //将id传给category_id，进行查询
        $products = self::where("category_id","=",$categoryID)
        ->select();
        return $products;
    }
}