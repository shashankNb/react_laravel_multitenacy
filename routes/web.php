<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => 1);


require __DIR__ . '/admin.php';

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::group(['prefix' => 'tenants'], function() {

        Route::get('',            [TenantController::class, 'index'])->name('tenant.manage');
        Route::any('edit/{id}',   [TenantController::class, 'updateTenant'])->name('tenant');
        Route::post('delete/{id}', [TenantController::class, 'deleteTenant'])->name('delete.tenant');

    });
});

require __DIR__ . '/client.php';

Route::group(['prefix' => 'customers', 'middleware' => 'auth:client'], function () {
    Route::get('/', fn() => auth()->user()->email_address)->name('customer.dashboard');
});
