<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/10
 * Time: 15:42
 */

namespace app\api\validate;


class Count extends BaseValidate{
    public $rule = [
        "count" => "isPositoveInteger|between:1,15" //不能加空格
    ];

}