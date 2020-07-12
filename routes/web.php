<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'Trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaisanpham'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getchitietsanpham'
]);
Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getlienhe'
]);
Route::get('gioithieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getgioithieu'
]);
Route::get('dangnhap',[
	'as'=>'login',
	'uses'=>'PageController@getdangnhap'
]);
Route::get('dangki',[
	'as'=>'signin',
	'uses'=>'PageController@getdangki'
]);
Route::post('dangki',[
	'as'=>'signin',
	'uses'=>'PageController@postdangki'
]);
Route::post('dangnhap',[
	'as'=>'login',
	'uses'=>'PageController@postdangnhap'
]);
Route::get('dangxuat',[
	'as'=>'logout',
	'uses'=>'PageController@postdangxuat'
]);
Route::get('timkiem',[
	'as'=>'timkiem',
	'uses'=>'PageController@gettimkiem'
]);
Route::get('themvaogiohang/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getdathang'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postdathang'
]);


	