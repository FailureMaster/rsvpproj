<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [UserController::class, 'login'])->name('login');
Route::post('/admin', [UserController::class, 'auth'])->name('login.auth');

//admin dashboard
Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

//guest list view and create method
Route::get('/admin/guests', [GuestController::class, 'create'])->name('guest.create');
Route::post('/admin/guests', [GuestController::class, 'store'])->name('guest.store');
Route::post('/admin/guests/toggle-attendance', [GuestController::class, 'toggleAttendance'])->name('guest.toggleAttendance');

// plus one view
Route::get('/admin/plusone', [AdditionalController::class, 'index'])->name('plusone.index');


Route::get('/admin/attendance', [AttendanceController::class, 'index'])->name('guest.attendance');

Route::get('/admin/admins', [UserController::class, 'admins'])->name('admin.admins');

Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
