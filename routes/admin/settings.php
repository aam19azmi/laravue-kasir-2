<?php

use App\Http\Controllers\Settings\UserManagementController;


Route::prefix('settings')->name('settings.')->group(function () {

    Route::controller(UserManagementController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-data', 'getData')->name('getdata');
    });

});
