<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/8
 * Time: 15:12
 */

namespace app\api\controller\v1;
use app\api\model\Theme as ThemeModel;//别名

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /*
     * @url /theme?ids=id1,id2,id3
     * @return 一组theme模型
     * */
    public function getSimpleList($ids = ""){
        (new IDCollection())->goCheck(); //校验id
        $ids = explode(",",$ids);
        //$theme = ThemeModel::getBannerByID($ids); //调用静态方法，如果没用异常，就输出json
        $result = ThemeModel::with("topicImg,headImg")->select($ids);
        if($result -> isEmpty())
        {
            throw new ThemeException();
        }
        return $result;
    }
    /*
     * @url /theme/:id
     * **/
    public function getConplexOne($id){
        (new IDMustBePostiveInt())->goCheck(); //校验id
        $theme = ThemeModel::getThemeWithProducts($id);
   /*     if (!$theme){
            throw new ThemeException();
        }*/
return $theme;
    }
}