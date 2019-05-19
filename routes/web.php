<?php

Route::get('/','IndexController@menu');

// Route::get('people/{lastName}/{firstName}', 'PeopleController@show');
Route::get('detail-product/{idProduct}','ProductController@detailProduct');
Route::get('product-category/{idCate}','ProductController@productCategory');
Route::post('searchInputProduct','ProductController@searchInputProduct')->name('searchInputProduct');
Route::get('searchButtonProduct','ProductController@searchButtonProduct')->name('searchButtonProduct');

Route::group(['prefix' => '/admin',], function()
{
    Route::get('/', 'AuthController@index')->name('index');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/postLogin', 'AuthController@postLogin')->name('postLogin');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::post('/setting', 'AuthController@setting')->name('setting');
    Route::get('/edit-password/{id}', 'AuthController@getEditPassword')->name('users_edit_password');
    Route::post('/edit-password/{id}', 'AuthController@postEditPassword');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');


    Route::group(['middleware' => ['web','auth'], 'prefix' => '/',], function() {

        Route::group(['prefix' => '/product',], function()
        {
            Route::get('/list','ProductController@getList')->name('list_product');
            Route::get('add','ProductController@getAdd')->name('add_product');
            Route::post('add','ProductController@postAdd')->name('add_product');
            Route::post('delete','ProductController@delete')->name('delete_product');
            Route::get('edit/{id}', 'ProductController@getEdit')->name('edit_product');
            Route::post('edit/{id}','ProductController@postEdit')->name('edit_product');
        });

        Route::group(['prefix' => '/menu',], function()
        {
            Route::get('/list','CategoryController@getList')->name('list_menu');
            Route::get('add','CategoryController@getAdd')->name('add_menu');
            Route::post('add','CategoryController@postAdd')->name('add_menu');
            Route::post('delete','CategoryController@delete')->name('delete_menu');
            Route::get('edit/{id}', 'CategoryController@getEdit')->name('edit_menu');
            Route::post('edit/{id}','CategoryController@postEdit')->name('edit_menu');
        });

        Route::group(['prefix' => '/sub-menu',], function()
        {
            Route::get('/list','SubCategoryController@getList')->name('list_sub_menu');
            Route::get('add','SubCategoryController@getAdd')->name('add_sub_menu');
            Route::post('add','SubCategoryController@postAdd')->name('add_sub_menu');
            Route::post('delete','SubCategoryController@delete')->name('delete_sub_menu');
            Route::get('edit/{id}', 'SubCategoryController@getEdit')->name('edit_sub_menu');
            Route::post('edit/{id}','SubCategoryController@postEdit')->name('edit_sub_menu');
            Route::post('/getSubCategory','SubCategoryController@getSubCategory')->name('getSubCategory');
        });
        Route::group(['prefix' => '/banner',], function()
        {
            Route::get('/list','BannerController@getList')->name('list_banner');
            Route::get('add','BannerController@getAdd')->name('add_banner');
            Route::post('add','BannerController@postAdd')->name('add_banner');
            Route::post('delete','BannerController@delete')->name('delete_banner');
            Route::get('edit/{id}', 'BannerController@getEdit')->name('edit_banner');
            Route::post('edit/{id}','BannerController@postEdit')->name('edit_banner');
        });

        Route::group(['prefix' => '/setting',], function()
        {
            Route::get('edit', 'SettingController@getEdit')->name('edit_setting');
            Route::post('edit','SettingController@postEdit')->name('edit_setting');
            Route::post('/uploadImg', 'SettingController@uploadImg')->name('upload_img');
        });
    });
});


