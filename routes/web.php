<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::prefix('dashboard')->group(function(){
    Route::name('admin.')->middleware('is.admin')->group(function(){
        Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
        Route::get('/requests', [App\Http\Controllers\Admin\RequestController::class, 'index'])->name('requests');
        Route::get('/requests/{action}/{id}', [App\Http\Controllers\Admin\RequestController::class, 'action'])->name('requests.action');
    });

    Route::name('master.')->prefix('master')->middleware('is.master')->group(function (){
        Route::get('/offers', [App\Http\Controllers\Master\OffersController::class, 'index'])->name('offers.index');
        Route::get('/offers/{id}', [App\Http\Controllers\Master\OffersController::class, 'show'])->name('offers.show');
        Route::get('/offers/request/{id}', [App\Http\Controllers\Master\OffersController::class, 'request'])->name('offers.request');

        Route::get('/my-offers/', [App\Http\Controllers\Master\OffersController::class, 'myOffers'])->name('offers.my');

        Route::get('/payments', [App\Http\Controllers\Master\PaymentsController::class, 'index'])->name('payments');

        Route::get('/finances', [App\Http\Controllers\Master\FinanceController::class, 'index'])->name('finances');
    });
});


