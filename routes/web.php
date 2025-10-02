<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\StudentPostController;


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



Route::get('pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf.index');
Route::get('/export-pdf', [App\Http\Controllers\PdfController::class, 'exportPdf'])->name('export-pdf');
Route::get('/get-customer-info/{customerId}', [App\Http\Controllers\ConsumptionController::class, 'getCustomerInfo']);
Route::get('/consumptions', 'App\Http\Controllers\ConsumptionController@index')->name('consumptions.index');
Route::get('/consumptions/monthly-report', 'App\Http\Controllers\ConsumptionController@monthlyReport')->name('consumptions.monthlyReport');
Route::get('/filter', 'App\Http\Controllers\CustomerController@filter')->name('filter');
Route::get('/monthly-report',  [App\Http\Controllers\ConsumptionController::class, 'monthlyReport'])->name('monthly.report');

Route::group(['middleware' => ['auth']], function () {

    // For Admin, Super-Admin, Whse-Admin roles
    Route::group(['middleware' => ['role:Admin|Super-Admin|Whse-Admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('logs', AuditController::class);
        Route::resource('researchs', ResearchController::class);
        Route::resource('update-password', SettingController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('costs', CostController::class);
        Route::resource('consumptions', ConsumptionController::class);

        Route::get('consumptions/destroy/{id}', [ConsumptionController::class, 'destroy'])->name('consumptions.destroy');
        Route::get('consumptions/payment/{id}', [ConsumptionController::class, 'paymentShow'])->name('consumptions.paymentShow');
        Route::put('consumptions/payment/{id}', [ConsumptionController::class, 'payment'])->name('consumptions.payment');
        Route::post('consumptions', [ConsumptionController::class, 'storeSingle'])->name('consumptions.storeSingle');
    });

    // For Student role
    Route::group(['middleware' => ['role:Student']], function () {
        Route::get('studentposts', [StudentPostController::class, 'index'])->name('studentposts.index');
        Route::get('studentposts', [StudentPostController::class, 'create'])->name('studentposts.create');
        Route::get('studentposts/{id}', [StudentPostController::class, 'show'])->name('studentposts.show');
        Route::post('studentposts/store', [StudentPostController::class, 'store'])->name('studentposts.store');
        Route::get('studentposts/edit/{id}', [StudentPostController::class, 'edit'])->name('studentposts.edit');
        Route::put('studentposts/update/{id}', [StudentPostController::class, 'update'])->name('studentposts.update');
        Route::delete('studentposts/destroy/{id}', [StudentPostController::class, 'destroy'])->name('studentposts.destroy');

    });
});

require __DIR__.'/auth.php';
