<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/9
 * Time: 20:15
 */

namespace app\lib\exception;


class ThemeException extends BaseExcrption
{
    public $code = 404;
    public $msg = "指定主体不存在，请检查id";
    public $errorCode = 30000;
}