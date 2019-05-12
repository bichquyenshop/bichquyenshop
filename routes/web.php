<?php



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
        Route::post('edit/{id}','ProductController@postEdit');
    });

    Route::group(['prefix' => '/menu',], function()
    {
        Route::get('/list','MenuController@getList')->name('list_menu');
        Route::get('add','MenuController@getAdd')->name('add_menu');
        Route::post('add','MenuController@postAdd');
        Route::post('delete','MenuController@delete')->name('delete_menu');
        Route::get('edit/{id}', 'MenuController@getEdit')->name('edit_menu');
        Route::post('edit/{id}','MenuController@postEdit');
    });

    Route::group(['prefix' => '/sub-menu',], function()
    {
        Route::get('/list','SubMenuController@getList')->name('list_sub_menu');
        Route::get('add','SubMenuController@getAdd')->name('add_sub_menu');
        Route::post('add','SubMenuController@postAdd');
        Route::post('delete','SubMenuController@delete')->name('delete_sub_menu');
        Route::get('edit/{id}', 'SubMenuController@getEdit')->name('edit_sub_menu');
        Route::post('edit/{id}','SubMenuController@postEdit');
    });
});


