<?php
namespace app\api\validate;
use think\Validate;  //先引用方法，主要V必须是大写的
class TestValidate extends Validate
{
    protected $rule = [
    "name" => "require|max:10",
    "email" => "email"
    ];//判断验证
}
