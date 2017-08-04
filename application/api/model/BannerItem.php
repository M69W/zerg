<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/4
 * Time: 8:14
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model
{
    protected  $hidden = ["id","banner_id","img_id","delete_time","update_time"]; //私有变量
    public function img(){
        return $this -> belongsTo("Image","img_id","id"
        //return $this -> belongsTo("Image",    "id",        "img_id"
        //  elongsTo(‘关联模型名’,‘外键名’,‘关联表主键名’,[‘模型别名定义’],‘join类型’);
        );

        /*
         * hasMany : 一对多 => 一个客户可以有很多订单
         *hasOne和belongsTo  : 一对一 => 一个订单只能有一个客户
         * 当前模型是banner,关联模型：banner_id,外键:banner_id,主键:id
         * belongsTo(‘关联模型名’,‘外键名’,‘关联表主键名’,[‘模型别名定义’],‘join类型’);

         * */

    }
}