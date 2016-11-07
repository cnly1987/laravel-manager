<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function () { return view('welcome');});
Route::get('/401', function () { return view('errors/401');});
Route::get('/403', function () { return view('errors/403');});
Route::get('/404', function () { return view('errors/404');});


Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@index');
    Route::resource('technicalsupports', 'TechnicalsupportController');
    Route::resource('users', 'Auth\UsersController');
    Route::resource('role_permission', 'Auth\RolesPermissionsController');
    Route::resource('roles', 'Auth\RolesController');
    Route::resource('permissions', 'Auth\PermissionsController');
    Route::resource('worksheets', 'WorksheetController');
});

//统计报表
Route::get('graph', 'GraphController@index');
Route::get('/graph/worksheet', 'GraphController@worksheet');
Route::get('/graph/ticket', 'GraphController@ticket');

//事业部管理
Route::get('/department', 'DeptController@index');
Route::get('/department/_list', 'DeptController@_list');
Route::post('/department/createGroup', 'DeptController@createGroup');
Route::post('/department/createDepartment', 'DeptController@createDepartment');
Route::post('/department/update', 'DeptController@update');
Route::post('/department/down', 'DeptController@down');
Route::post('/department/up', 'DeptController@up');
Route::post('/department/delete', 'DeptController@delete');
Route::get('/devsuite', 'DevsuiteController@index');
Route::get('/devsuite/_list', 'DevsuiteController@_list');
Route::get('devsuite/detail/{id}', 'DevsuiteController@detail');

//服务器管理
Route::get('/server', 'ServerController@index');
Route::get('/server/_list', 'ServerController@_list');
Route::post('/server/create', 'ServerController@create');
Route::post('/server/update', 'ServerController@update');
Route::post('/server/delete', 'ServerController@delete');

//系统配置
Route::get('/appconfig/server', 'AppconfigController@server');
Route::post('/appconfig/server/create', 'AppconfigController@addServerAttr');
Route::post('/appconfig/server/update', 'AppconfigController@updateServerAttr');
Route::post('/appconfig/server/delete', 'AppconfigController@deleteServerAttr');
Route::get('/appconfig/product/catagory', 'AppconfigController@productCatagory');
Route::get('/appconfig/product/catagory/attr/{id}', 'AppconfigController@productCatagoryDetail');
Route::post('/appconfig/product/catagory/create', 'AppconfigController@createProductCatagory');
Route::post('/appconfig/product/catagory/update', 'AppconfigController@updateProductCatagory');
Route::post('/appconfig/product/catagory/delete', 'AppconfigController@deleteProductCatagory');
Route::post('/appconfig/product/attr/create', 'AppconfigController@createProductAttr');
Route::post('/appconfig/product/attr/update', 'AppconfigController@updateProductAttr');
Route::post('/appconfig/product/attr/delete', 'AppconfigController@deleteProductAttr');

//产品
Route::get('product', 'ProductController@index');
Route::get('product/_list', 'ProductController@_list');
Route::get('product/{sku}', 'ProductController@detail');




