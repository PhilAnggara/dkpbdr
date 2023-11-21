<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\ProfileController;

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
    Route::get('input-data', [MainController::class, 'inputData'])->name('input-data');
    Route::resource('data-peminjam', DebiturController::class);
    Route::get('capaian-sindkasi', [MainController::class, 'capaian'])->name('capaian-sindkasi');
    Route::get('jatuh-tagih-jatuh-tempo', [MainController::class, 'jatuh'])->name('jatuh-tagih-jatuh-tempo');
    Route::get('lkk', [MainController::class, 'lkk'])->name('lkk');
    Route::get('lkd', [MainController::class, 'lkd'])->name('lkd');
    Route::get('memo-dinas', [MainController::class, 'memoDinas'])->name('memo-dinas');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
