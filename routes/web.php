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


Route::get('data-materi', [App\Http\Controllers\DataMateriController::class, 'index']);
// Route::get('detail-webiner/{id}', [App\Http\Controllers\DataMateriController::class, 'detail']);
Route::post('insert-materi', [App\Http\Controllers\DataMateriController::class, 'insert']);
Route::post('update-materi', [App\Http\Controllers\DataMateriController::class, 'update']);


// Petugas dan admin
// Route::get('dashboard-petugas', [App\Http\Controllers\Petugas\DashboardController::class, 'index']);
// Route::get('data-petugas', [App\Http\Controllers\Petugas\DataPetugasController::class, 'index']);
// Route::post('insert-petugas', [App\Http\Controllers\Petugas\DataPetugasController::class, 'insert']);
// Route::post('update-petugas', [App\Http\Controllers\Petugas\DataPetugasController::class, 'update']);
// Route::get('delete-petugas/{id}', [App\Http\Controllers\Petugas\DataPetugasController::class, 'delete']);

// Route::get('data-admin', [App\Http\Controllers\Petugas\DataAdminController::class, 'index']);
// Route::post('insert-admin', [App\Http\Controllers\Petugas\DataAdminController::class, 'insert']);
// Route::post('update-admin', [App\Http\Controllers\Petugas\DataAdminController::class, 'update']);
// Route::get('delete-admin/{id}', [App\Http\Controllers\Petugas\DataAdminController::class, 'delete']);

// Route::get('data-anggota', [App\Http\Controllers\Petugas\DataAnggotaController::class, 'index']);

// Route::get('data-buku', [App\Http\Controllers\Petugas\DataBukuController::class, 'index']);
// Route::post('insert-buku', [App\Http\Controllers\Petugas\DataBukuController::class, 'insert']);
// Route::post('update-buku', [App\Http\Controllers\Petugas\DataBukuController::class, 'update']);
// Route::get('delete-buku/{id}', [App\Http\Controllers\Petugas\DataBukuController::class, 'delete']);

// Route::get('data-peminjaman', [App\Http\Controllers\Petugas\DataPeminjamanController::class, 'index']);
// Route::post('apporve-peminjaman', [App\Http\Controllers\Petugas\DataPeminjamanController::class, 'approve_peminjaman']);
// Route::get('detail-peminjaman/{id}', [App\Http\Controllers\Petugas\DataPeminjamanController::class, 'detail']);

// Route::get('data-pengembalian', [App\Http\Controllers\Petugas\DataPengembalianController::class, 'index']);
// Route::post('pengembalian-buku', [App\Http\Controllers\Petugas\DataPengembalianController::class, 'pengembalian']);


// Route::get('data-laporan', [App\Http\Controllers\Petugas\DataLaporanController::class, 'index']);
// Route::post('filter-laporan', [App\Http\Controllers\Petugas\DataLaporanController::class, 'filter_laporan']);


// Anggota
// Route::get('dashboard-anggota', [App\Http\Controllers\Anggota\DashboardController::class, 'index']);
// Route::get('data-buku-anggota', [App\Http\Controllers\Anggota\DataBukuController::class, 'index']);
// Route::get('detail-buku-anggota/{id}', [App\Http\Controllers\Anggota\DataBukuController::class, 'detail']);


// Route::get('data-peminjaman-angggota', [App\Http\Controllers\Anggota\DataPeminjamanController::class, 'index']);
// Route::post('insert-peminjaman', [App\Http\Controllers\Anggota\DataPeminjamanController::class, 'insert']);
// Route::post('update-peminjaman-anggota', [App\Http\Controllers\Anggota\DataPeminjamanController::class, 'update']);
// Route::get('delete-peminjaman-anggota/{id}', [App\Http\Controllers\Anggota\DataPeminjamanController::class, 'delete']);


// Route::get('data-pengembalian-anggota', [App\Http\Controllers\Anggota\DataPengembalianController::class, 'index']);
// Route::get('detail-pengembalian-anggota/{id}', [App\Http\Controllers\Anggota\DataPengembalianController::class, 'detail']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
