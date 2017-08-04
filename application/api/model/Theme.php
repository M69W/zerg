<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/8
 * Time: 15:15
 */

namespace app\api\model;

class Theme extends BaseModel
{
    protected  $hidden = ["delete_time","update_time","topic_img_id","head_img_id"]; //私有变量
    public function topicImg() //首页展示分类
    {
        return $this->belongsTo('image','topic_img_id',"id");
    }
    public function headImg() //列表头部
    {
        return $this->belongsTo('image','head_img_id',"id");
    }
    public function products(){
        return $this ->belongsToMany("product","theme_product",
            "product_id","theme_id");
    }

    //belongsToMany(‘关联模型名’,‘中间表名’,‘外键名’,‘当前模型关联键名’,[‘模型别名定义’
    //
    //]);
    public static function getThemeWithProducts($id){
        $theme = self::with("products,topicImg,headImg")
            ->find($id);
        return $theme;
    }


}
