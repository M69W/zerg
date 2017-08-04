<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/11
 * Time: 12:37
 */

namespace app\lib\exception;


class CategoryException extends BaseExcrption
{
    public $code = 404;
    public $msg = "指定类目不存在，请检查参数";
    public $errorCode = 50000;
}