<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/6/25
 * Time: 9:35
 */

namespace app\lib\exception;

use think\Exception;
use think\Config;
use think\exception\Handle;
use think\exception\HttpException;
use think\Log;
use think\Request;
use think\response\Json;

class ExceptionHandler extends Handle //Tp5全局异常处理类
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的URL
  public function render(\Exception $e)
    {

        //  return parent::render($e);  TODO: Change the autogenerated stub 更改自动生成的存根
        if($e instanceof BaseExcrption){
            //如果是自定义异常
            $this -> code = $e->code;   // HTTP 状态码 404,200
            $this -> msg = $e->msg;     // 错误具体信息
            $this -> errorCode = $e->errorCode;    //自定义的错误码
        }else{
            //开关变量
          //  config("app_debug");
          //  $switch = Config::get("app_debug");
            if(Config::get("app_debug")){
                //返回TP5自带报错页面
               return parent::render($e);
            }else{
                $this -> code =500 ;   // HTTP 状态码 404,200
                $this -> msg = "服务器异常错误";     // 错误具体信息
                $this -> errorCode = 999;    //自定义的错误码
                $this -> recordErrorLog($e);//调用日志
            }
        }
        $requset =Request::instance();
        $result =[
            'msg' => $this -> msg,
             'errorCode' => $this -> errorCode,
             'request_url' => $requset->url() //获取url
             ];
          return json($result , $this -> code);
    }
    //定义记录日志方法
    private function recordErrorLog(\Exception $e){
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type'  => 'File',
            // 日志保存目录
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ["error"],
        ]);
        Log::record($e->getMessage(),"error");
    }
}

