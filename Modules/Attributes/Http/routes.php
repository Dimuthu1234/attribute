<?php

Route::model('type', 'Modules\Attributes\Entities\Type');
Route::model('master-category', 'Modules\Attributes\Entities\MasterCategory');
Route::model('attribute-label', 'Modules\Attributes\Entities\AttributeLabel');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'admin/settings', 'namespace' => 'Modules\Attributes\Http\Controllers'], function () {
// Attribute resource
        Route::resource('/type', 'TypesController', resourceNames('type'));
        Route::resource('/master-category', 'MasterCategoriesController', resourceNames('master_category'));
        Route::resource('/attribute-label', 'AttributeLabelsController', resourceNames('attribute_label'));
    });
});