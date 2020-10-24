<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Broadcast;
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
        Route::get('work-order/ajax/data','HomeController@ajaxDataWorkOrder')->name('work-order.ajax.data');
        Route::resource('abnormality', 'AbnormalityController');
        Route::get('abnormality/ajax/data','HomeController@ajaxDataAbnormality')->name('abnormality.ajax.data');
        Route::get('abnormality/exports/excel', 'AbnormalityController@export')->name('abnormality.exports.excel')->middleware('role:super admin|admin');
        Route::post('abnormality/status/draft/{id}', 'AbnormalityController@draft')->name('abnormality.status.draft');
        Route::post('abnormality/status/open/{id}', 'AbnormalityController@open')->name('abnormality.status.open');
        Route::post('abnormality/status/approved/{id}', 'AbnormalityController@approved')->name('abnormality.status.approved');
        Route::post('abnormality/status/on_progress/{id}', 'AbnormalityController@on_progress')->name('abnormality.status.on_progress');
        Route::post('abnormality/status/on_progress/{id}/attachment', 'AbnormalityController@attachmentProgress')->name('abnormality.attachment.on_progress');
        Route::post('abnormality/status/closed/{id}', 'AbnormalityController@closed')->name('abnormality.status.closed');
        Route::post('abnormality/status/closed/{id}/attachment', 'AbnormalityController@attachmentClosed')->name('abnormality.attachment.closed');

        Route::get('work-order/exports/excel', 'WorkOrderController@export')->name('work-order.exports.excel')->middleware('role:super admin|admin');
        Route::post('work-order/status/draft/{id}', 'WorkOrderController@draft')->name('work-order.status.draft');
        Route::post('work-order/status/open/{id}', 'WorkOrderController@open')->name('work-order.status.open');
        Route::post('work-order/status/approved/{id}', 'WorkOrderController@approved')->name('work-order.status.approved');
        Route::post('work-order/status/on_progress/{id}', 'WorkOrderController@on_progress')->name('work-order.status.on_progress');
        Route::post('work-order/status/on_progress/{id}/attachment', 'WorkOrderController@attachmentProgress')->name('work-order.attachment.on_progress');
        Route::post('work-order/status/closed/{id}', 'WorkOrderController@closed')->name('work-order.status.closed');
        Route::post('work-order/status/closed/{id}/attachment', 'WorkOrderController@attachmentClosed')->name('work-order.attachment.closed');
    });
});

Route::get('sections', 'SectionController@findAll')->name('sections.find');
Route::resource('notifications', 'NotificationController');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
