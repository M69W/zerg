<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//Route::get('banner/:id','api/v1.Banner/getBanner'); 
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
Route::get('api/:version/theme/','api/:version.theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.theme/getConplexOne');
Route::get('api/:version/product/recent','api/:version.Product/getRecent');
Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');
Route::get('api/:version/Category/all','api/:version.Category/getAllCategories'); //列表商品
Route::post('api/:version/Token/user','api/:version.Token/getToken'); //Token
