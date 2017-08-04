<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/21
 * Time: 15:52
 */

namespace app\lib\exception;


class TokenException extends BaseExcrption
{
    public $code = 401;
    public $msg = "Token已过期或无效Token";
    public $errorCode = 10001;

}