<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\RekammedisController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// ROUTE DATA REKAM MEDIS
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});



Route::prefix('admin')->middleware('auth', 'cekUserLogin:1')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');


    Route::get('/rekammedis/index', [RekammedisController::class, 'index']);
    Route::get('/rekammedis/create', [RekammedisController::class, 'create']);
    Route::post('/rekammedis/store', [RekammedisController::class, 'store']);
    Route::get('/rekammedis/{id}/edit', [RekammedisController::class, 'edit']);
    Route::put('/rekammedis/{id}', [RekammedisController::class, 'update']);
    Route::delete('/rekammedis/{id}', [RekammedisController::class, 'delete']);
    
    
   
    // ROUTE DATA REKAM MEDIS
    Route::get('/dokter/index', [DokterController::class, 'index']);
    Route::get('/dokter/create', [DokterController::class, 'create']);
    Route::post('/dokter/store', [DokterController::class, 'store']);

    Route::get('/dokter/{id}/edit', [DokterController::class, 'edit']);
    Route::put('/dokter/{id}', [DokterController::class, 'update']);

    Route::delete('/dokter/{id}', [DokterController::class, 'delete']);

    // ROUTE DATA OBAT
    Route::get('/obat/index', [ObatController::class, 'index']);

    Route::get('/obat/create', [ObatController::class, 'create']);
    Route::post('/obat/store', [ObatController::class, 'store']);

    Route::get('/obat/{id}/edit', [ObatController::class, 'edit']);
    Route::put('/obat/{id}', [ObatController::class, 'update']);

    Route::delete('/obat/{id}', [ObatController::class, 'delete']);

    // ROUTE DATA PASIEN
    Route::get('/pasien/index', [PasienController::class, 'index']);

    Route::get('/pasien/create', [PasienController::class, 'create']);
    Route::post('/pasien/store', [PasienController::class, 'store']);

    Route::get('/pasien/{id}/edit', [PasienController::class, 'edit']);
    Route::put('/pasien/{id}', [PasienController::class, 'update']);

    Route::delete('/pasien/{id}', [PasienController::class, 'delete']);

    // ROUTE DATA POLIKLINIK
    Route::get('/poliklinik/index', [PoliklinikController::class, 'index']);

    Route::get('/poliklinik/create', [PoliklinikController::class, 'create']);
    Route::post('/poliklinik/store', [PoliklinikController::class, 'store']);

    Route::get('/poliklinik/{id}/edit', [PoliklinikController::class, 'edit']);
    Route::put('/poliklinik/{id}', [PoliklinikController::class, 'update']);

    Route::delete('/poliklinik/{id}', [PoliklinikController::class, 'delete']);


});


Route::prefix('user')->middleware('auth', 'cekUserLogin:2')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');


    Route::get('/rekammedis/index', [RekammedisController::class, 'index']);
    Route::get('/rekammedis/create', [RekammedisController::class, 'create']);
    Route::post('/rekammedis/store', [RekammedisController::class, 'store']);
    Route::get('/rekammedis/{id}/edit', [RekammedisController::class, 'edit']);
    Route::put('/rekammedis/{id}', [RekammedisController::class, 'update']);
    Route::delete('/rekammedis/{id}', [RekammedisController::class, 'delete']);
});

