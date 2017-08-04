<?php
namespace app\api\controller\v1;
use app\lib\exception\BannerMissException;
use think\Exception;//引用抛出模块
// use think\Validate;
// use app\api\validate\TestValidate; //引用模块
use app\api\validate\IDMustBePostiveInt; //自定义验证规则
use app\api\model\Banner as BannerModel;//别名
class Banner
{
    public function getBanner($id)
    {
      (new IDMustBePostiveInt())->goCheck(); //校验id
          $banner = BannerModel::getBannerByID($id); //调用静态方法，如果没用异常，就输出json
 //  $banner ->hidden(["delete_time"]);
      //  $banner ->visible(["id"]);
 //$banner -> hidden(["id","delete_time","items.id"]);
  if(!$banner)
  {
       throw new BannerMissException();
  }
      $c = config("setting.img_prefix");
    return $banner; // 返回$banner方法
    }
}


