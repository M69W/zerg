<?php
namespace app\api\validate;

use think\Validate;

class IDMustBePostiveInt extends BaseValidate{
    public $rule = [
    
          "id" => "require|isPositoveInteger",
    ];
    public $message = [
        "id" => "必须是正整数"
    ];

}


