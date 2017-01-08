<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//get路由
Route::get('basic1', function (){
    return 'Hello world!';
});

//post路由
Route::post('basic2', function (){
    return 'Hello world!';
});

//多请求路由
Route::match(['get', 'post'], 'basic3', function (){
    return 'Hello world too !';
});

//响应所以路由请求
Route::any('basic4', function (){
    return 'any';
});

//带参数路由
Route::get('user/{id}', function ($id){
    return 'user-id='.$id;
});

Route::get('users/{name?}', function ($name=123){
    return 'user-name='.$name;
});

Route::get('user2/{name?}', function ($name=sean){
    return 'user-name='.$name;
})->where('name', '[A-Za-z]');

//路由别名
Route::get('nankademingzi', ['as'=>'center', function(){
    return route('center');
}]);

//关联路由
Route::get('memberinfo', 'MemberController@info');

