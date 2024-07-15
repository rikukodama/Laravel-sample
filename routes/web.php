<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomersController;

Route::get('/', function () {
    $main_title='dd';
    return view('welcome');
});
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('login', [UserController::class, 'login']);
Route::get('password/reset', [UserController::class, 'showPasswordResetForm'])->name('password.reset');

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::post('/users/reset', [UserController::class, 'reset'])->name('users.reset');

Route::post('/password/reset', [UsersController::class, 'reset']);
Route::get('/password/edit', [UsersController::class, 'passEdit'])->name('users.passEdit');
Route::get('personals/edit', [HomeController::class, 'editPersonal'])->name('personals.passEdit');
Route::post('/password/edit', [UsersController::class, 'passEdit']);


Route::get('customers/select', [CustomersController::class, 'select'])->name('customers.select');
Route::get('customers/movetoindex', [CustomersController::class, 'movetoindexCustomers'])->name('customers.movetoindex');
Route::get('customers/add', [CustomersController::class, 'addCustomers'])->name('customers.add');
Route::get('quotes/movetoindex', [HomeController::class, 'movetoindexQuote'])->name('quotes.movetoindex');
Route::get('quotes/add', [HomeController::class, 'addQuote'])->name('quotes.add');
Route::get('bills/movetoindex', [HomeController::class, 'movetoindexBills'])->name('bills.movetoindex');
Route::get('bills/add', [HomeController::class, 'addBills'])->name('bills.add');
Route::get('totalbills/movetoindex', [HomeController::class, 'movetoindexTotalbills'])->name('totalbills.movetoindex');
Route::get('totalbills/add', [HomeController::class, 'addTotaltills'])->name('totalbills.add');
Route::get('deliveries/movetoindex', [HomeController::class, 'movetoindexDeliveries'])->name('deliveries.movetoindex');
Route::get('deliveries/add', [HomeController::class, 'addDeliveries'])->name('deliveries.add');
Route::get('charges/movetoindex', [HomeController::class, 'movetoindexCharges'])->name('charges.movetoindex');
Route::get('charges/add', [HomeController::class, 'addCharges'])->name('charges.add');
Route::get('items/movetoindex', [HomeController::class, 'movetoindexItems'])->name('items.movetoindex');
Route::get('items/add', [HomeController::class, 'addItems'])->name('items.add');


Route::get('mails/index', [HomeController::class, 'indexMails'])->name('mails.index');
Route::get('customercharges/index', [HomeController::class, 'indexCustomercharges'])->name('customer_charges.index');
Route::get('companies/index', [HomeController::class, 'indexCompanies'])->name('companies.index');
Route::get('coverpages/index', [HomeController::class, 'indexCoverpages'])->name('coverpages.index');
Route::get('companies/index', [HomeController::class, 'indexCompanies'])->name('companies.index');
Route::get('companies/index', [HomeController::class, 'indexCompanies'])->name('companies.index');
Route::get('companies/index', [HomeController::class, 'indexCompanies'])->name('companies.index');
Route::get('companies/index', [HomeController::class, 'indexCompanies'])->name('companies.index');


