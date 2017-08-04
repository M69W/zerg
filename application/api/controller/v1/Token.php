<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/13
 * Time: 8:28
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
 public function getToken($code="")
 {
     (new TokenGet())->goCheck();

     $ut = new UserToken($code); //创建service对象
     $token = $ut ->get(); //调用对象下的get方法
     return [
         "token" =>$token
     ];
}
}