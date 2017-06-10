<?php

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

Route::get('/', 'moduleController@phome');
Route::get('home', 'moduleController@home');

//CATEGORIES [ADD CATEGORIES]
Route::get('category','categoriesController@index_categories');
Route::post('module/categoriesCRUD','categoriesController@categoriesCRUD');

//CATEGORIES [ADD PRODUCTS]
Route::get('product','productController@index_product');
Route::post('module/productCRUD','productController@productCRUD');
Route::resource('module/retrieveData','productController@retrieveData');
Route::post('module/product', 'productController@find');