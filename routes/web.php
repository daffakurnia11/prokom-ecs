<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
  Route::get('/', function () {
    return view('members.dashboard.index', ['title' => 'Dashboard']);
  });
  Route::get('/profil', function () {
    return view('members.dashboard.profile', ['title' => 'Profil']);
  });
});

Route::prefix('admin')->controller(AdminController::class)->middleware('auth', 'checkRole:Admin')->group(function () {
  Route::get('/', 'index');
  Route::get('/pendaftar', 'pendaftar');
  Route::get('/pendaftar/{user}', 'show');
  Route::get('/pendaftar/verifikasi/{user}', 'verifying');
});
// Route::pmiddleware('auth', 'checkRole:Admin')->group(function () {
// })
