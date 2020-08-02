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

Route::get('/', 'CategoriesController@listCategory')->name('categories.list');
Route::get('categories.list', 'CategoriesController@listCategory')->name('categories.list');

Route::get('/categories', 'CategoriesController@listCategory');
Route::post('/categories/add', 'CategoriesController@add');
Route::post('/categories/edit/{id}', 'CategoriesController@edit');
Route::get('/categories/remove/{id}', 'CategoriesController@remove');
Route::get('/categories/view/{id}', 'CategoriesController@view');

Route::get('/products', 'ProductsController@listProduct');
Route::post('/products/add', 'ProductsController@add');
Route::get('/products/edit/{id}', 'ProductsController@edit');
Route::post('/products/save', 'ProductsController@save');
Route::post('/products/update', 'ProductsController@update');
Route::get('/products/remove/{id}', 'ProductsController@remove');
Route::get('/products/view/{id}', 'ProductsController@view');
Route::get('/products/br', 'ProductsController@listProduct');
Route::get('/product/view/{id}', 'ProductsController@view');

