<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/11
 * Time: 10:54
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected  $hidden = ["delete_time","update_time"]; //私有变量
     public function img(){
     return $this -> belongsTo("Image","topic_img_id","id");

            }

}