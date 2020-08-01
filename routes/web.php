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

Route::get('/', 'CategoriesController@listCategory');

Route::get('/categories', 'CategoriesController@listCategory');
Route::get('/categories/add', 'CategoriesController@add');
Route::get('/categories/edit/{id}', 'CategoriesController@edit');
Route::post('/categories/save', 'CategoriesController@save');
Route::post('/categories/update', 'CategoriesController@update');
Route::get('/categories/remove/{id}', 'CategoriesController@remove');
Route::get('/categories/view/{id}', 'CategoriesController@view');

Route::get('/products', 'ProductsController@listProduct');
Route::get('/products/add', 'ProductsController@add');
Route::get('/products/edit/{id}', 'ProductsController@edit');
Route::post('/products/save', 'ProductsController@save');
Route::post('/products/update', 'ProductsController@update');
Route::get('/products/remove/{id}', 'ProductsController@remove');
Route::get('/products/view/{id}', 'ProductsController@view');
Route::get('/products/br', 'ProductsController@listProduct');
Route::get('/products/us', 'ProductsController@listProduct');
