<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/13
 * Time: 9:14
 */

namespace app\api\model;


class User extends BaseModel
{
    //查询数据库是否有openid
public function getByOpenID($openid){
    $user = self::where("openid", "=","$openid")
        ->find();
    return $user;

}
}