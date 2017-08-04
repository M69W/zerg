<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/15
 * Time: 10:32
 */

namespace app\lib\exception;


class WeChatExcption extends BaseExcrption
{
    public $code = 404;
    public $msg = "微信服务器接口调用失败";
    public $errorCode = 999;
}