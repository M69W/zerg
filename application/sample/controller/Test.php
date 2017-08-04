<?php
namespace app\sample\controller;
use think\Request;
class Test
{
    public function hello($name,$id,$me)
    {
  $id = Request::instance() -> param("id");
echo $id;
echo $name;
        return 'nihao';
    }
}
