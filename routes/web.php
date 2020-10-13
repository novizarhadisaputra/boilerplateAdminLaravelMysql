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
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::group(['prefix' => 'master-data', 'middleware' => ['role:super admin']], function () {
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('departments', 'DepartmentController');
        Route::resource('sections', 'SectionController');
        Route::resource('categories', 'CategoryController');
        Route::resource('status-work-order', 'StatusWorkOrderController');
        Route::resource('status-abnormality', 'StatusAbnormalityController');
    });

    Route::group(['prefix' => 'management',  'middleware' => ['role:super admin']], function () {
        Route::resource('users', 'UserController');
        // Route::get('users/{id}/profile', 'UserController@profile')->name('users.profile');
        Route::resource('roles-and-permissions', 'RolePermissionController');
    });

    Route::group(['prefix' => 'request'], function () {
        Route::resource('work-order', 'WorkOrderController');
        Route::resource('abnormality', 'AbnormalityController');
        Route::get('abnormality/exports/excel', 'AbnormalityController@export')->name('abnormality.exports.excel')->middleware('role:super admin');
        Route::get('work-order/exports/excel', 'WorkOrderController@export')->name('work-order.exports.excel')->middleware('role:super admin');
        Route::post('abnormality/status/open', 'WorkOrderController@open')->name('abnormality.status.open');
        Route::post('work-order/status/open', 'WorkOrderController@open')->name('work-order.status.open');

    });
});

Route::get('sections', 'SectionController@findAll')->name('sections.find');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
