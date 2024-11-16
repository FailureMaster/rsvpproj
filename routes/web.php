<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [UserController::class, 'login'])->name('admin.login.form');
Route::post('/admin', [UserController::class, 'auth'])->name('login.auth');

Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/guests', [GuestController::class, 'create'])->name('guest.create');
Route::post('/admin/guests', [UserController::class, 'guests'])->name('admin.guests');

Route::get('/admin/plusone', [UserController::class, 'plusone'])->name('admin.plusone');

Route::get('/admin/attendance', [UserController::class, 'attendance'])->name('admin.attendance');

Route::get('/admin/admins', [UserController::class, 'admins'])->name('admin.admins');

Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
