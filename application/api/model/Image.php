<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/4
 * Time: 17:21
 */

namespace app\api\model;


use think\Model;

class Image extends BaseModel
{
    protected $visible = ["url"];
    // protected  $hidden = ["id","from","delete_time","update_time"]; //私有变量
    //get固定 Attr固定 Url是字段值
    public  function getUrlAttr($value,$data){
    return $this -> prefixImgUrl($value,$data);
}
}