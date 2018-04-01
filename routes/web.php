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







Route::get('/', ['middleware' =>['auth','menu'],function () {
    return view('admin');
}]);


Route::get('/admin', ['middleware' => ['auth','menu'],function () {
    return view('admin');
}]);


Route::auth();




Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth','menu']],  function()
{
    
    //Products
    Route::get('products',['as'=>'admin.products.index','uses'=>'ProductController@products']);
    Route::get('products/view/{id}',['as'=>'admin.products.view','uses'=>'ProductController@view']);
    Route::get('products/edit/{id}',['as'=>'admin.products.edit','uses'=>'ProductController@edit']);
    Route::post('products/edit/{id}',['as'=>'admin.products.edit','uses'=>'ProductController@edit_post']);
    // Route::post('products/edit/{id}',['as'=>'admin.products.edit','uses'=>'ProductController@edit']);
    Route::post('products/add',['as'=>'admin.products.add','uses'=>'ProductController@add']);
    Route::get('products/add',['as'=>'admin.products.add','uses'=>'ProductController@add']);
    Route::get('products/delete/{id}',['as'=>'admin.products.delete','uses'=>'ProductController@delete']);
    Route::get('products/grafic',['as'=>'admin.products.gradic','uses'=>'ProductController@grafic']);
    Route::post('products/grafic',['as'=>'admin.products.gradic','uses'=>'ProductController@grafic']);
    Route::get('products/test',['as'=>'admin.products.test','uses'=>'ProductController@test']);
    
});   

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth', 'Admin','menu']],  function()
{
    
    //Users
    Route::get('users',['as'=>'admin.user.index','uses'=>'UserController@users']);
    Route::get('user/view/{id}',['as'=>'admin.user.view','uses'=>'UserController@view']);
    Route::get('user/edit/{id}',['as'=>'admin.user.edit','uses'=>'UserController@edit']);
    Route::post('user/edit/{id}',['as'=>'admin.user.edit','uses'=>'UserController@edit_post']);
    Route::get('user/add',['as'=>'admin.user.add','uses'=>'UserController@add']);
    Route::post('user/add',['as'=>'admin.user.add','uses'=>'UserController@add_post']);
    Route::get('user/delete/{id}',['as'=>'admin.user.delete','uses'=>'UserController@delete']);
    
});;





// 

// Route::get('/home', 'HomeController@index');


// Route::group(['namespace' => 'Auth'], function()
// {
//      Route::get('logout', 'AuthController@logout');

// });


