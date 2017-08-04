<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/6/25
 * Time: 10:34
 */

namespace app\lib\exception;


class BannerMissException extends BaseExcrption
{
    public $code = 404;
    public $msg = "请求的banner不存在";
    public $errorCode = 40000;
}
