<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/13
 * Time: 9:17
 */

namespace app\api\service;

use app\api\model\User as UserModel;//别名
use app\lib\exception\TokenException;
use app\lib\exception\WeChatExcption;
use think\Exception;

class UserToken extends Token
{
    protected $code; //客户端过来的code
    protected $wxAppID; //$wxAddID小程序传过来的
    protected $wxAppSecret;
    protected $wxLoginUrl;

     function __construct($code)
    { //获取url

        $this ->code = $code;
        $this ->wxAppID = config('wx.app_id');
        $this ->wxAppSecret = config('wx.app_secret');
        $this ->wxLoginUrl = sprintf(config('wx.login_url'),
            $this ->wxAppID,$this->wxAppSecret,$this ->code);

    }

    public function get(){
$result = curl_get($this->wxLoginUrl); //返回字符串
$wxResult = json_decode($result,true); //把字符串变成数组
        if(empty($wxResult)){
            throw new Exception("获取session_key及openID时异常，微信内部错误");
        }
        else{
            $loginFail = array_key_exists("errcode",$wxResult);
            if ($loginFail){
                $this -> processLoginError($wxResult);
            }
            else{
                $this ->grantToken($wxResult);
            }
        }
    }
    private function grantToken($wxResult){
        // 拿到openid
        // 数据库里看下，这个openid是不是已经存在
        // 如果存在，则处理，如果不存在那么新增一条user记录
        // 生成令牌，准备缓存数据，写入缓存数据
        // 把令牌返回到客户端去
        //key ：令牌
        //value :wxResult,uid,scope（权限级别）

        $openid = $wxResult["openid"];
      $user =UserModel::getByOpenID($openid);
      //判断openid是不是已经存在
      if($user){
         $uid = $user ->id;
      }
      else{
          $uid = $this-> newUser($openid);
      }
      $cachedValue = $this ->prepareCachedValue($wxResult,$uid);
      $token = $this -> saveToCache($cachedValue); //缓存写入
        return $token;
    }
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);//把数组转成字符串
        $expire_in = config("setting.token_expire_in");  //缓存7200秒
        $request = cache($key,$value,$expire_in); // 设置缓存数据
        //已经不存在，不需要再次缓存，如果存在，就增加一条md5加密
        if(!$request){
              new TokenException([
                "mgs" => "服务器缓存异常",
                "errorCode" => 10005
            ]);
        };
        return $key;
    }

    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue["uid"] = $uid;
        $cachedValue["scope"] =16;//作用域，数字越大，权限越大
        return $cachedValue;
    }
    //插入数据库
    private function newUser($openid){
        $user = UserModel::create([
            "openid" => $openid
        ]);
       return  $user ->id;
    }

    private function processLoginError($wxResult){

        throw new WeChatExcption([
            "msg" => $wxResult["errmsg"],
            "errorCode"=> $wxResult["errcode"]
        ]);
    }

}
