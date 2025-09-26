<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SettingController;


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('key:generate');
    return 'DONE';
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf.index');
Route::get('/export-pdf', [App\Http\Controllers\PdfController::class, 'exportPdf'])->name('export-pdf');
Route::get('/get-customer-info/{customerId}', [App\Http\Controllers\ConsumptionController::class, 'getCustomerInfo']);
Route::get('/consumptions', 'App\Http\Controllers\ConsumptionController@index')->name('consumptions.index');
Route::get('/consumptions/monthly-report', 'App\Http\Controllers\ConsumptionController@monthlyReport')->name('consumptions.monthlyReport');
Route::get('/filter', 'App\Http\Controllers\CustomerController@filter')->name('filter');
Route::get('/monthly-report',  [App\Http\Controllers\ConsumptionController::class, 'monthlyReport'])->name('monthly.report');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('logs', 'App\Http\Controllers\AuditController');
    Route::resource('researchs', 'App\Http\Controllers\ResearchController');
    Route::resource('update-password','App\Http\Controllers\SettingController');
    Route::resource('customers','App\Http\Controllers\CustomerController');
    Route::resource('costs','App\Http\Controllers\CostController');
    Route::resource('consumptions','App\Http\Controllers\ConsumptionController');
    Route::get('consumptions/destroy/{id}',[App\Http\Controllers\ConsumptionController::class, 'destroy'])->name('consumptions.destroy');
    Route::get('consumptions/payment/{id}',[App\Http\Controllers\ConsumptionController::class, 'paymentShow'])->name('consumptions.paymentShow');
    Route::put('consumptions/payment/{id}',[App\Http\Controllers\ConsumptionController::class, 'payment'])->name('consumptions.payment');
    Route::post('consumptions',[App\Http\Controllers\ConsumptionController::class, 'storeSingle'])->name('consumptions.storeSingle');

});

require __DIR__.'/auth.php';
