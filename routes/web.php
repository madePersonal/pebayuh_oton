<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Auth
Route::get('/login', [AuthController::class, 'view_login'])->name('login.show');
Route::post('/login', [AuthController::class, 'handle_login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/test', [AdminController::class, 'test'])->name('test');
Route::get('/admin/pancawara', [AdminController::class, 'pancawara'])->middleware('auth', 'roleAdmin');
Route::get('/admin/data_pancawara', [AdminController::class, 'get_data_upakara_pancawara'])->middleware('auth', 'roleAdmin');
Route::get('/admin/data_pancawara/{id}', [AdminController::class, 'get_data_upakara_pancawara_by_id'])->middleware('auth', 'roleAdmin');