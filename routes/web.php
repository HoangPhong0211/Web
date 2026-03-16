<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. TRANG CHỦ: Đẩy thẳng sang login (Đặt NGOÀI mọi middleware)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. KHU VỰC ADMIN: Chỉ dành cho người đã login và là Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Trang Dashboard chính
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Các trang Quản lý (CRUD)
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
});

// 3. PROFILE NGƯỜI DÙNG: Mặc định của Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Các route xác thực (Login, Register...)
require __DIR__.'/auth.php';