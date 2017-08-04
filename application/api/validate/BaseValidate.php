<?php
namespace app\api\validate;
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;
class BaseValidate extends Validate
{
  public function goCheck(){
    //获取http传人的参数
    //对这些参数做检验
    $request = Request::instance();
    $params = $request ->param();//获取当前请求的所有变量
    $result = $this ->batch()-> check($params); //使用check方法校验是否符合
    if(!$result){
        $e = new ParameterException([
            "msg"  => $this -> error,
//            "code" => 400,
//            "errorCode" => 10002


        ]); //调用参数异常的方法
//        $e -> msg =$this -> error; //取到参数错误的问题
//        $e ->errorCode = 10002;
        throw  $e; //抛出异常
      //  $error = $this ->error;
      //  throw new Exception($error); //抛出异常
    }
    else{
        return true;
    }
}
    //自定义验证规则
    protected function isPositoveInteger($value,$rule = "",$data = "",$field = ""){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
            echo $value,$data,$field,$rule;
        }
        else{
           // return $field.'必须是正整数';
            return false;
            echo $value,$data,$field,$rule;
        }
    }
    protected function isNotEmpty($value,$rule = "",$data = "",$field = ""){
        if(empty($value)){
            return false;
        }
        else{
           // return $field.'必须是正整数';
            return true;

        }
    }
}


