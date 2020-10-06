<?php

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

use App\Http\Controllers\DashboardController;
use App\lib\Dashboard\Services\DashboardServicesController;
use App\Lib\Messages\MessagesController;
use App\Lib\Orders\OrderController;
use App\Lib\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();


Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/services', [DashboardServicesController::class, 'index'])->name('dashboard-services');
Route::get('/dashboard/services/edit/{slug}', [DashboardServicesController::class, 'edit'])->name('dashboard-services-edit');
Route::delete('/dashboard/services/delete/{slug}', [DashboardServicesController::class, 'delete'])->name('dashboard-services-delete');
Route::get('/dashboard/services/new', [DashboardServicesController::class, 'create'])->name('dashboard-services-new');
Route::post('/dashboard/services/store', [DashboardServicesController::class, 'store'])->name('dashboard-services-store');
Route::get('/dashboard/settings', 'DashboardController@settings')->name('dashboard-settings');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('dashboard-profile');
Route::patch('/dashboard/profile/{id}', [ProfileController::class, 'update'])->name('dashboard-profile-update');

Route::get('/dashboard/orders', [OrderController::class, 'index'])->name('dashboard-orders');
Route::post('/dashboard/orders', [OrderController::class, 'store'])->name('dashboard-orders-store');
Route::get('/dashboard/orders/new', [OrderController::class, 'create'])->name('dashboard-orders-new');
Route::patch('/dashboard/orders/{id}', [OrderController::class, 'update'])->name('dashboard-orders-update');

Route::get('/dashboard/messages', [MessagesController::class, 'index'])->name('dashboard-messages');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages-new');

Route::resource('services', 'ServiceController');
Route::resource('service-providers', 'ProviderController');
