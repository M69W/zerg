<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/10
 * Time: 20:30
 */

namespace app\api\validate;


class ProductException extends BaseValidate
{
    public $code = 404;
    public $msg = "指定的商品不存在，请检查参数";
    public $errorCode = 20000;
}