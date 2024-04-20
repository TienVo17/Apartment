<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuDanController;
use App\Http\Controllers\ToaNhaController;
use App\Http\Controllers\CanHoController;

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

Route::get('/', function () {
    return view('auth.login');
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

Route::get('/admin/quan-ly-cu-dan', [CuDanController::class, 'index'])->name('quan_ly_cu_dan');
Route::get('/admin/quan-ly-toa-nha', [ToaNhaController::class, 'index'])->name('quan_ly_toa_nha');
Route::get('/admin/quan-ly-can-ho', [CanHoController::class, 'index'])->name('quan_ly_can_ho');