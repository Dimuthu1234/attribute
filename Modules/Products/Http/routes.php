<?php
Route::model('product', 'Modules\Products\Entities\Product');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Products\Http\Controllers'], function () {
// Product resource
        Route::resource('/product', 'ProductsController', resourceNames('product'));
    });
});