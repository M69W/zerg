<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/13
 * Time: 8:29
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        "code"=>"require|isNotEmpty"
    ];
    public $message = [
        "code" => "没有code还想获取Token,别做梦"
    ];
}