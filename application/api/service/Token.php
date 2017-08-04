<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/21
 * Time: 15:00
 */

namespace app\api\service;


class Token
{
  public static function generateToken(){

      //32个字符组成一组随机字符串
      $randChars =getRandChar(32);
      //用三组字符串，进行md5加密（加强安全性）
      $timestamp = $_SERVER["REQUEST_TIME_FLOAT"];//时间戳
      //salt 盐
      $salt = config("secure.token_salt");
      return md5($randChars.$timestamp.$salt);
 }
}