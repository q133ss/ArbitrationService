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

Route::middleware('guest')->group(function (){
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
});

Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/{id}', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
});

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::post('/clear/notifications', [App\Http\Controllers\NotificationController::class, 'clear'])->name('clear.notifications');

    Route::name('admin.')->middleware('is.admin')->group(function(){
        Route::post('users/balance/{id}', [App\Http\Controllers\Admin\UsersController::class, 'balance']);
        Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
        Route::get('/requests', [App\Http\Controllers\Admin\RequestController::class, 'index'])->name('requests');
        Route::get('/requests/{action}/{id}', [App\Http\Controllers\Admin\RequestController::class, 'action'])->name('requests.action');
        Route::post('/offers/delete-file/', [App\Http\Controllers\Admin\OffersController::class, 'deleteFile'])->name('offers.delete.file');
        Route::post('/offers/approved/{id}', [App\Http\Controllers\Admin\OffersController::class, 'approved'])->name('offers.approved');
        Route::resource('offers', App\Http\Controllers\Admin\OffersController::class)->except('show');
        Route::get('withdraws', [App\Http\Controllers\Admin\WithdrawController::class, 'index'])->name('withdraws');
        Route::get('withdraw/{id}/{status}', [App\Http\Controllers\Admin\WithdrawController::class, 'withdraw'])->name('withdraw');
        Route::get('/numbers', [App\Http\Controllers\Admin\NumbersController::class, 'index'])->name('numbers.index');
        Route::get('/numbers/update', [App\Http\Controllers\Admin\NumbersController::class, 'update'])->name('numbers.get');
        Route::get('/numbers/edit/{id}', [App\Http\Controllers\Admin\NumbersController::class, 'edit'])->name('numbers.edit');
        Route::post('/numbers/edit/{id}', [App\Http\Controllers\Admin\NumbersController::class, 'updateNumber'])->name('numbers.update');
        Route::get('/leads', [App\Http\Controllers\Admin\LeadController::class, 'index'])->name('leads');
    });

    Route::name('master.')->prefix('master')->middleware('is.master')->group(function (){
        Route::get('/offers', [App\Http\Controllers\Master\OffersController::class, 'index'])->name('offers.index');
        Route::get('/offers/{id}', [App\Http\Controllers\Master\OffersController::class, 'show'])->name('offers.show');
        Route::get('/offers/request/{id}', [App\Http\Controllers\Master\OffersController::class, 'request'])->name('offers.request');

        Route::get('/my-offers/', [App\Http\Controllers\Master\OffersController::class, 'myOffers'])->name('offers.my');

        Route::get('/payments', [App\Http\Controllers\Master\PaymentsController::class, 'index'])->name('payments');

        Route::get('/finances', [App\Http\Controllers\Master\FinanceController::class, 'index'])->name('finances');
        Route::post('/add-card', [App\Http\Controllers\Master\FinanceController::class, 'addCard'])->name('finances.add.card');

        Route::post('/without', [App\Http\Controllers\Master\FinanceController::class, 'without'])->name('finances.without');

        Route::get('/leads', [App\Http\Controllers\Master\LeadsController::class, 'index'])->name('leads.index');
        Route::get('/leads/new', [App\Http\Controllers\Master\LeadsController::class, 'create'])->name('leads.create');
        Route::post('/leads/new', [App\Http\Controllers\Master\LeadsController::class, 'store'])->name('leads.store');

        Route::get('/numbers', [App\Http\Controllers\Master\NumbersController::class, 'index'])->name('numbers.index');

        Route::get('/statistics', [App\Http\Controllers\Master\StatisticController::class, 'index'])->name('statistics.index');
    });

    Route::name('adv.')->prefix('advertiser')->middleware('is.adv')->group(function (){
        Route::get('/offers', [App\Http\Controllers\Adv\OffersController::class, 'index'])->name('offers');
        Route::get('/offers/show/{id}', [App\Http\Controllers\Adv\OffersController::class, 'show'])->name('offers.show');
        Route::post('/offers/update/{id}', [App\Http\Controllers\Adv\OffersController::class, 'update'])->name('offers.update');
        Route::post('/offers/{id}/add-file', [App\Http\Controllers\Adv\OffersController::class, 'addFile'])->name('offers.add.file');
        Route::post('/offers/remove-file', [App\Http\Controllers\Adv\OffersController::class, 'removeFile'])->name('offers.remove.file');
        Route::get('/offers/create', [App\Http\Controllers\Adv\OffersController::class, 'create'])->name('offers.create');
        Route::post('/offers/store', [App\Http\Controllers\Adv\OffersController::class, 'store'])->name('offers.store');
        Route::get('/leads', [App\Http\Controllers\Adv\LeadController::class, 'index'])->name('leads.index');
        Route::get('/lead/{id}', [App\Http\Controllers\Adv\LeadController::class, 'show'])->name('lead.show');
        Route::post('/lead/{id}', [App\Http\Controllers\Adv\LeadController::class, 'update'])->name('leads.update');
        Route::get('/finances', [App\Http\Controllers\Adv\FinanceController::class, 'index'])->name('finances');
        Route::get('/calls', [App\Http\Controllers\Adv\CallsController::class, 'index'])->name('calls');
        Route::get('/calls/{id}/{action}', [App\Http\Controllers\Adv\CallsController::class, 'action'])->name('calls.action');
    });

    Route::name('operator.')->prefix('operator')->middleware('is.operator')->group(function(){
        Route::post('/call/approve/{id}', [App\Http\Controllers\Operator\IndexController::class, 'approve'])->name('call.approve');
        Route::get('/call/cancel/{id}', [App\Http\Controllers\Operator\IndexController::class, 'cancel'])->name('call.cancel');

        Route::get('/call/{id}', [App\Http\Controllers\Operator\IndexController::class, 'callShow'])->name('call.show');
        Route::get('/offer/{id}', [App\Http\Controllers\Operator\IndexController::class, 'offerShow'])->name('offer.show');

        Route::get('/leads', [App\Http\Controllers\Operator\LeadController::class, 'index'])->name('lead.index');
        Route::get('/masters/leads', [App\Http\Controllers\Operator\LeadController::class, 'masterLeads'])->name('leads.index');
        Route::get('/lead/create', [App\Http\Controllers\Operator\LeadController::class, 'create'])->name('lead.create');
        Route::post('/lead/store', [App\Http\Controllers\Operator\LeadController::class, 'store'])->name('lead.store');

        Route::get('/leads/{id}/{action}', [App\Http\Controllers\Operator\LeadController::class, 'action'])->name('leads.action');
    });
});
