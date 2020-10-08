<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false, 'password.request' => false, 'password.reset' => false]);

// admin site
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'master-data'], function () {
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('departments', 'DepartmentController');
        Route::resource('sections', 'SectionController');
        Route::resource('categories', 'CategoryController');
        Route::resource('status-work-order', 'StatusWorkOrderController');
        Route::resource('status-abnormality', 'StatusAbnormalityController');
    });

    Route::group(['prefix' => 'management'], function () {
        Route::resource('users', 'UserController');
        Route::get('users/{id}/profile', 'UserController@profile')->name('users.profile');
        Route::resource('roles-and-permissions', 'RolePermissionController');
    });

    Route::group(['prefix' => 'request'], function () {
        Route::resource('work-order', 'WorkOrderController');
        Route::resource('abnormality', 'AbnormalityController');
    });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
