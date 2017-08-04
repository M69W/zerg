<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/6
 * Time: 20:53
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{

    protected  function prefixImgUrl($value,$data){
        $finalUrl =$value;
        if ($data["from"] == 1) {
            $finalUrl =  config("setting.img_prefix") . $value; //返回本地绝对地址
        }
        return $finalUrl;
    }
}