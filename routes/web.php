<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/action-login', [AuthController::class, 'action_login']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register-institusi', [AuthController::class, 'register_institusi']);
Route::get('/lengkapi-institusi', [AuthController::class, 'lengkapi_institusi']);

Route::post('/insert-register', [AuthController::class, 'insert_register']);
Route::post('/insert-register-institusi', [AuthController::class, 'insert_register_institusi']);
Route::post('/update-lengkapi-institusi', [AuthController::class, 'update_lengkapi_insititusi']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/update-profile', [AuthController::class, 'update_profile']);

Route::get('dashboard-institusi', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('data-webiner', [App\Http\Controllers\DataWebinerController::class, 'index']);
Route::get('detail-webiner/{id}', [App\Http\Controllers\DataWebinerController::class, 'detail']);
Route::post('insert-webiner', [App\Http\Controllers\DataWebinerController::class, 'insert']);
Route::post('update-webiner', [App\Http\Controllers\DataWebinerController::class, 'update']);
Route::get('ikuti-webiner/{id}', [App\Http\Controllers\DataWebinerController::class, 'ikuti_webiner']);


Route::get('data-materi', [App\Http\Controllers\DataMateriController::class, 'index']);
Route::get('add-materi/{id}', [App\Http\Controllers\DataMateriController::class, 'add_materi']);
Route::post('insert-materi', [App\Http\Controllers\DataMateriController::class, 'insert']);
Route::post('update-materi', [App\Http\Controllers\DataMateriController::class, 'update']);
Route::get('delete-materi/{id}', [App\Http\Controllers\DataMateriController::class, 'delete']);



// Role Pengguna
Route::get('dashboard-pengguna', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('data-pendaftaran', [App\Http\Controllers\DataPendaftaranController::class, 'index']);
Route::post('insert-absensi', [App\Http\Controllers\DataPendaftaranController::class, 'insert_absensi']);

Route::get('riwayat-pendaftaran', [App\Http\Controllers\DataRiwayatController::class, 'index']);
Route::get('detail-riwayat/{id}', [App\Http\Controllers\DataRiwayatController::class, 'detail']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
