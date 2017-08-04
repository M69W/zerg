<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/9
 * Time: 16:27
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    public $rule = [

        "ids" => "require|checkIDs",
    ];
    public $message = [
        "ids" => "ids参数必须是以逗号分隔的多个正整数"
    ];
    //自定义验证规则
    protected function checkIDs($value){
       $values = explode(",",$value); //转化成数组的格式
       if (empty($values)){
         return false;
       };
       foreach ($values as $id){ //遍历数据下每个id号
           if(!$this->isPositoveInteger($id)){
               return false;
            }
        }
       return true;
    }
}