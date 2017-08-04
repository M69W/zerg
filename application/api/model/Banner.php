<?php
namespace app\api\model;
use think\Db;
use think\Exception;
use think\Model;

class Banner extends Model {
   // protected $table = "category";
    protected  $hidden = ["delete_time","update_time"]; //私有变量
    public function items(){
    return $this -> hasMany("BannerItem","banner_id","id");
}

    public static function getBannerByID($id)
    {
        $banner = self::with(["items","items.img"])
            ->find($id);
       return $banner;
    }

}


