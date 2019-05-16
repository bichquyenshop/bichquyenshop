<?php

Route::get('/','IndexController@menu');

// Route::get('people/{lastName}/{firstName}', 'PeopleController@show');
Route::get('detail-product/{idProduct}','ProductController@detailProduct');
Route::get('product-category/{idCate}','ProductController@productCategory');
Route::post('searchInputProduct','ProductController@searchInputProduct')->name('searchInputProduct');
Route::get('searchButtonProduct/{stringSearch}','ProductController@searchButtonProduct')->name('searchButtonProduct');

Route::group(['prefix' => '/admin',], function()
{
    Route::get('/', 'AuthController@index')->name('index');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/postLogin', 'AuthController@postLogin')->name('postLogin');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::post('/setting', 'AuthController@setting')->name('setting');
    Route::get('/edit-password/{id}', 'AuthController@getEditPassword')->name('users_edit_password');
    Route::post('/edit-password/{id}', 'AuthController@postEditPassword');

    Route::group(['prefix' => '/product',], function()
    {
        Route::get('/list','ProductController@getList')->name('list_product');
        Route::get('add','ProductController@getAdd')->name('add_product');
        Route::post('add','ProductController@postAdd');
        Route::post('delete','ProductController@delete')->name('delete_product');
        Route::get('edit/{id}', 'ProductController@getEdit')->name('edit_product');
        Route::post('edit/{id}','ProductController@postEdit')->name('edit_product');
    });

    Route::group(['prefix' => '/menu',], function()
    {
        Route::get('/list','CategoryController@getList')->name('list_menu');
        Route::get('add','CategoryController@getAdd')->name('add_menu');
        Route::post('add','CategoryController@postAdd');
        Route::post('delete','CategoryController@delete')->name('delete_menu');
        Route::get('edit/{id}', 'CategoryController@getEdit')->name('edit_menu');
        Route::post('edit/{id}','CategoryController@postEdit')->name('edit_menu');
    });

    Route::group(['prefix' => '/sub-menu',], function()
    {
        Route::get('/list','SubCategoryController@getList')->name('list_sub_menu');
        Route::get('add','SubCategoryController@getAdd')->name('add_sub_menu');
        Route::post('add','SubCategoryController@postAdd');
        Route::post('delete','SubCategoryController@delete')->name('delete_sub_menu');
        Route::get('edit/{id}', 'SubCategoryController@getEdit')->name('edit_sub_menu');
        Route::post('edit/{id}','SubCategoryController@postEdit')->name('edit_sub_menu');
    });
});


