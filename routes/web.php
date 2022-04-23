<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registration']);

Route::middleware('auth')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/profil', 'profile');
    Route::post('/profil/{user}', 'updateProfile');
    Route::get('/berkas', 'modules');
    Route::get('/jadwal', 'schedules');
    Route::post('/onPresence/{schedule}', 'onPresence');
    Route::get('/kelompok', 'groups');
  });
});

Route::prefix('admin')->middleware('auth', 'checkRole:Admin')->group(function () {
  Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index');
    // Pendaftar
    Route::get('/pendaftar', 'pendaftar');
    Route::get('/pendaftar/{user}', 'show');
    Route::get('/pendaftar/verifikasi/{user}', 'verifying');
    Route::get('/kehadiran', 'attendance');
  });
  // Pengumuman
  Route::resource('pengumuman', AnnouncementController::class)->parameter('pengumuman', 'announcement');
  // Jadwal
  Route::resource('jadwal', ScheduleController::class)->parameter('jadwal', 'schedule');
  Route::get('/jadwal/{schedule}/regenerate', [ScheduleController::class, 'regenerate']);
});
