<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestsController;
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
})->name('welcome');

Route::get('guest', [GuestsController::class, 'index'])->name('guest');
Route::get('guest/{id}', [GuestsController::class, 'show'])->name('guest.show');
Route::get('guestbook', [GuestsController::class, 'create'])->name('guestbook');
Route::post('guestbook/store', [GuestsController::class, 'store'])->name('guestbook.store');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('login');

Route::group(['middleware' => 'checkAdminAccess'], function () {
    // Admin
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('admin/guest-list', [AdminController::class, 'daftarTamu'])->name('guest-list');
    Route::delete('admin/guest-list/{id}', [AdminController::class, 'delete'])->name('delete');

    Route::get('admin/account', [AdminController::class, 'editAccount'])->name('admin.edit');
    Route::put('admin/account', [AdminController::class, 'updateAccount'])->name('admin.update');
});

