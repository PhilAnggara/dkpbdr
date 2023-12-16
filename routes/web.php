<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::middleware('checkRole:Super Admin,Admin')->group(function () {
        Route::get('input-data', [MainController::class, 'inputData'])->name('input-data');
        Route::resource('data-peminjam', DebiturController::class);
        Route::get('capaian-sindkasi', [MainController::class, 'capaian'])->name('capaian-sindkasi');
        Route::get('jatuh-tagih-jatuh-tempo', [MainController::class, 'jatuh'])->name('jatuh-tagih-jatuh-tempo');
        Route::get('lkk', [MainController::class, 'lkk'])->name('lkk');
        Route::get('lkd', [MainController::class, 'lkd'])->name('lkd');
        Route::get('memo-dinas', [MainController::class, 'memoDinas'])->name('memo-dinas');
        Route::post('upload-dokumen', [MainController::class, 'uploadDokumen'])->name('upload-dokumen');
        Route::delete('hapus-dokumen/{id}', [MainController::class, 'hapusDokumen'])->name('hapus-dokumen');
        Route::resource('kelola-pengguna', UserController::class)->middleware('checkRole:Super Admin');
    });

    Route::resource('informasi-pribadi', PersonalInformationController::class);
    Route::post('change-password', [PersonalInformationController::class, 'changePassword'])->name('change.password');
    
});

require __DIR__.'/auth.php';
