<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\UserProfileController;

/**
 * Utility route - clear cache
 */
Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('key:generate');
    return 'DONE';
});

/**
 * Homepage - show welcome for guest, redirect for logged in
 */
Route::get('/', function () {
    return redirect()->route('studentposts.index');
});

  Route::get('studentposts', [StudentPostController::class, 'index'])->name('studentposts.index');
/**
 * PDF & Reports
 */
Route::get('pdf', [PdfController::class, 'index'])->name('pdf.index');
Route::get('/export-pdf', [PdfController::class, 'exportPdf'])->name('export-pdf');

Route::get('/get-customer-info/{customerId}', [ConsumptionController::class, 'getCustomerInfo']);
Route::get('/consumptions', [ConsumptionController::class, 'index'])->name('consumptions.index');
Route::get('/consumptions/monthly-report', [ConsumptionController::class, 'monthlyReport'])->name('consumptions.monthlyReport');
Route::get('/filter', [CustomerController::class, 'filter'])->name('filter');
Route::get('/monthly-report', [ConsumptionController::class, 'monthlyReport'])->name('monthly.report');

/**
 * Authenticated routes
 */
Route::group(['middleware' => ['auth']], function () {

    /**
     * Admin & Manager Roles
     */
    Route::group(['middleware' => ['role:Admin|Super-Admin|Whse-Admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'roles' => RoleController::class,
            'users' => UserController::class,
            'permissions' => PermissionController::class,
            'logs' => AuditController::class,
            'researchs' => ResearchController::class,
            'update-password' => SettingController::class,
            'customers' => CustomerController::class,
            'costs' => CostController::class,
            'consumptions' => ConsumptionController::class,
            'authors' => AuthorController::class,
        ]);

        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('posts', [PostController::class, 'index'])->name('posts.index');
        Route::put('posts/published/{id}', [PostController::class, 'published'])->name('posts.published');
        Route::put('posts/unpublished/{id}', [PostController::class, 'unpublished'])->name('posts.unpublished');

        Route::put('authors/featured/{id}', [AuthorController::class, 'featured'])->name('authors.featured');
    });

    /**
     * Student Routes
     */
    Route::group(['middleware' => ['role:Student']], function () {
      
        Route::get('studentposts/create', [StudentPostController::class, 'create'])->name('studentposts.create');
        Route::get('studentposts/{id}', [StudentPostController::class, 'show'])->name('studentposts.show');
        Route::post('studentposts/store', [StudentPostController::class, 'store'])->name('studentposts.store');
        Route::get('studentposts/edit/{id}', [StudentPostController::class, 'edit'])->name('studentposts.edit');
        Route::put('studentposts/update/{id}', [StudentPostController::class, 'update'])->name('studentposts.update');
        Route::delete('studentposts/destroy/{id}', [StudentPostController::class, 'destroy'])->name('studentposts.destroy');

        Route::get('userprofiles/show/{id}', [UserProfileController::class, 'show'])->name('userprofiles.show');

        Route::get('userprofiles/edit/{id}', [UserProfileController::class, 'edit'])->name('userprofiles.edit');
        Route::put('userprofiles/update/{id}', [UserProfileController::class, 'update'])->name('userprofiles.update');
    });
});

/**
 * Auth routes (login, register, etc.)
 */
require __DIR__ . '/auth.php';
