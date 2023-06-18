<?php

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
    return view('welcome');
});

Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/brand/create', [App\Http\Controllers\Admin\BrandController::class, 'create'])
        ->name('admin.brand.create');
    Route::get('admin/brand/edit/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'edit'])
        ->name('admin.brand.edit');
    Route::patch('admin/brand/update/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'update'])
        ->name('admin.brand.update');
    Route::post('/admin/brand/store', [App\Http\Controllers\Admin\BrandController::class, 'store'])
        ->name('admin.brand.store');
    Route::get('admin/brand/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'show'])
        ->name('admin.brand.show');
    Route::get('admin/brand/{brand}/filtered', [App\Http\Controllers\Admin\BrandFilterableController::class, 'show'])
        ->name('admin.brand.show.filterable');
    Route::delete('/admin/brand/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'destroy'])
        ->name('admin.brand.delete');

    Route::get('/admin/supply/create/{brand}', [App\Http\Controllers\Admin\SupplyController::class, 'create'])
        ->name('admin.supply.create');
    Route::post('/admin/supply/store', [App\Http\Controllers\Admin\SupplyController::class, 'store'])
        ->name('admin.supply.store');

});



Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'dashboardIndex'])
    ->name('user.dashboard');
Route::get('user/brand/{brand}', [App\Http\Controllers\User\UserController::class, 'showBrand'])
    ->name('user.brand.show');
Route::get('user/brand/{brand}/filtered', [App\Http\Controllers\User\UserController::class, 'showBrandFilterable'])
    ->name('user.brand.show.filterable');
Route::get('admin/statistic/index', [App\Http\Controllers\Admin\StatisticController::class, 'index'])
    ->name('statistic.index');
Route::get('admin/statistic/index/filterable',[App\Http\Controllers\Admin\StatisticController::class, 'indexFilterable'])
    ->name('statistic.index.filterable');
Route::get('/admin/supplies.view', [App\Http\Controllers\Admin\SupplyController::class, 'index'])
    ->name('admin.supplies.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
