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
        Route::resource('safety-patrol-categories', 'SafetyPatrolCategoryController');
        Route::resource('status-work-order', 'StatusWorkOrderController');
        Route::resource('status-abnormality', 'StatusAbnormalityController');
    });

    Route::group(['prefix' => 'management', 'middleware' => ['role:super admin']], function () {
        Route::resource('users', 'UserController');
        // Route::get('users/{id}/profile', 'UserController@profile')->name('users.profile');
        Route::resource('roles-and-permissions', 'RolePermissionController');
    });

    Route::group(['prefix' => 'request'], function () {
        Route::resource('work-order', 'WorkOrderController');
        Route::get('work-order/ajax/data', 'HomeController@ajaxDataWorkOrder')->name('work-order.ajax.data');
        Route::resource('abnormality', 'AbnormalityController');
        Route::get('abnormality/ajax/data', 'HomeController@ajaxDataAbnormality')->name('abnormality.ajax.data');
        Route::resource('safety-patrol', 'SafetyPatrolController');
        Route::get('safety-patrol/ajax/data', 'HomeController@ajaxDataSafetyPatrol')->name('safety-patrol.ajax.data');

        Route::get('abnormality/exports/excel', 'AbnormalityController@export')->name('abnormality.exports.excel')->middleware('role:super admin|admin');
        Route::post('abnormality/status/draft/{id}', 'AbnormalityController@draft')->name('abnormality.status.draft');
        Route::post('abnormality/status/open/{id}', 'AbnormalityController@open')->name('abnormality.status.open');
        Route::post('abnormality/status/approved/{id}', 'AbnormalityController@approved')->name('abnormality.status.approved');
        Route::post('abnormality/status/on_progress/{id}', 'AbnormalityController@on_progress')->name('abnormality.status.on_progress');
        Route::post('abnormality/status/on_progress/{id}/attachment', 'AbnormalityController@attachmentProgress')->name('abnormality.attachment.on_progress');
        Route::post('abnormality/status/closed/{id}', 'AbnormalityController@closed')->name('abnormality.status.closed');
        Route::post('abnormality/status/closed/{id}/attachment', 'AbnormalityController@attachmentClosed')->name('abnormality.attachment.closed');

        Route::delete('abnormality/file/{id}/{idFile}/remove', 'AbnormalityController@removeFile')->name('abnormality.file.remove');
        Route::delete('abnormality/attachment/{id}/{idAttachment}/remove', 'AbnormalityController@removeAttachment')->name('abnormality.attachment.remove');

        Route::get('work-order/exports/excel', 'WorkOrderController@export')->name('work-order.exports.excel')->middleware('role:super admin|admin');
        Route::post('work-order/status/draft/{id}', 'WorkOrderController@draft')->name('work-order.status.draft');
        Route::post('work-order/status/open/{id}', 'WorkOrderController@open')->name('work-order.status.open');
        Route::post('work-order/status/approved/{id}', 'WorkOrderController@approved')->name('work-order.status.approved');
        Route::post('work-order/status/on_progress/{id}', 'WorkOrderController@on_progress')->name('work-order.status.on_progress');
        Route::post('work-order/status/on_progress/{id}/attachment', 'WorkOrderController@attachmentProgress')->name('work-order.attachment.on_progress');
        Route::post('work-order/status/closed/{id}', 'WorkOrderController@closed')->name('work-order.status.closed');
        Route::post('work-order/status/closed/{id}/attachment', 'WorkOrderController@attachmentClosed')->name('work-order.attachment.closed');

        Route::delete('work-order/file/{id}/{idFile}/remove', 'WorkOrderController@removeFile')->name('work-order.file.remove');
        Route::delete('work-order/attachment/{id}/{idAttachment}/remove', 'WorkOrderController@removeAttachment')->name('work-order.attachment.remove');

        Route::get('safety-patrol/exports/excel', 'SafetyPatrolController@export')->name('safety-patrol.exports.excel')->middleware('role:super admin|admin');
        Route::post('safety-patrol/status/draft/{id}', 'SafetyPatrolController@draft')->name('safety-patrol.status.draft');
        Route::post('safety-patrol/status/open/{id}', 'SafetyPatrolController@open')->name('safety-patrol.status.open');
        Route::post('safety-patrol/status/approved/{id}', 'SafetyPatrolController@approved')->name('safety-patrol.status.approved');
        Route::post('safety-patrol/status/on_progress/{id}', 'SafetyPatrolController@on_progress')->name('safety-patrol.status.on_progress');
        Route::post('safety-patrol/status/on_progress/{id}/attachment', 'SafetyPatrolController@attachmentProgress')->name('safety-patrol.attachment.on_progress');
        Route::post('safety-patrol/status/closed/{id}', 'SafetyPatrolController@closed')->name('safety-patrol.status.closed');
        Route::post('safety-patrol/status/closed/{id}/attachment', 'SafetyPatrolController@attachmentClosed')->name('safety-patrol.attachment.closed');

        Route::delete('safety-patrol/file/{id}/{idFile}/remove', 'SafetyPatrolController@removeFile')->name('safety-patrol.file.remove');
        Route::delete('safety-patrol/attachment/{id}/{idAttachment}/remove', 'SafetyPatrolController@removeAttachment')->name('safety-patrol.attachment.remove');
    });
});

Route::get('sections', 'SectionController@findAll')->name('sections.find');
Route::resource('notifications', 'NotificationController');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
