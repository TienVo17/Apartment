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
Route::get('/admin/quan-ly-can-ho', [CanHoController::class, 'index'])->name('quan_ly_can_ho');
Route::get('/admin/them-cu-dan', [CuDanController::class, 'create'])->name('them_cu_dan');
Route::post('/admin/them-moi-cu-dan', [CuDanController::class, 'store'])->name('them_moi_cu_dan');
Route::get('/admin/thong-tin-cu-dan/{id}', [CuDanController::class, 'show'])->name('xem_thong_tin_cu_dan');
Route::get('/admin/xoa-cu-dan/{id}', [CuDanController::class, 'destroy'])->name('xoa_cu_dan');
Route::get('/admin/sua-cu-dan/{id}', [CuDanController::class, 'edit'])->name('sua_cu_dan');
Route::put('/admin/cap-nhat-cu-dan/{id}', [CuDanController::class, 'update'])->name('cap_nhat_cu_dan');
Route::post('upload-avatar/{id}', [CuDanController::class, 'uploadAvatar'])->name('upload_avatar');

Route::resource('/admin/quan-ly-toa-nha', ToaNhaController::class)->names([
    'index' => 'quan_ly_toa_nha.index',
    'create' => 'quan_ly_toa_nha.create',
    'store' => 'quan_ly_toa_nha.store',
    'show' => 'quan_ly_toa_nha.show',
    'edit' => 'quan_ly_toa_nha.edit',
    'update' => 'quan_ly_toa_nha.update',
    'destroy' => 'quan_ly_toa_nha.destroy',
]);

Route::get('/apartments', [CanHoController::class, 'index'])->name('apartments.index');

// Hiển thị form thêm mới căn hộ
Route::get('/apartments/create', [CanHoController::class, 'create'])->name('apartments.create');

// Lưu căn hộ mới được thêm
Route::post('/apartments', [CanHoController::class, 'store'])->name('apartments.store');

// Xóa một căn hộ
Route::delete('/apartments/{id}', [CanHoController::class, 'destroy'])->name('apartments.destroy');

// Hiển thị form chỉnh sửa thông tin của một căn hộ
Route::get('/apartments/{id}/edit', [CanHoController::class, 'edit'])->name('apartments.edit');
Route::put('/apartments/{id}', [CanHoController::class, 'update'])->name('apartments.update');

// tìm kiếm
Route::get('/apartments/search', [CanHoController::class, 'search'])->name('apartments.search');