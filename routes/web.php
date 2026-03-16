<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = Post::query()
        ->orderByDesc('created_at')
        ->limit(3)
        ->get();

    $servicesHome = Service::query()
        ->where('status', 'published')
        ->orderBy('sort_order')
        ->limit(3)
        ->get();

    return view('home', [
        'latestPosts' => $latestPosts,
        'servicesHome' => $servicesHome,
    ]);
})->name('home');

Route::view('/gioi-thieu', 'about')->name('about');
Route::view('/ve-chung-toi', 'about');
Route::get('/dich-vu', [ServiceController::class, 'index'])->name('services');
Route::get('/dich-vu/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/du-an', [ProjectController::class, 'index'])->name('projects');
Route::get('/tin-tuc', [PostController::class, 'index'])->name('news');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::view('/lien-he', 'contact')->name('contact');
Route::view('/chinh-sach-bao-mat', 'privacy')->name('privacy');

Route::get('/giam-sat-va-tu-van-xay-dung', function () {
    return app(ServiceController::class)->showLegacy('giam-sat-va-tu-van-xay-dung');
});
Route::get('/thi-nghiem-kiem-dinh-vat-lieu-xay-dung', function () {
    return app(ServiceController::class)->showLegacy('thi-nghiem-va-kiem-dinh-vat-lieu-xay-dung');
});
Route::get('/khao-sat-dia-chat-dia-hinh', function () {
    return app(ServiceController::class)->showLegacy('khao-sat-dia-chat-dia-hinh');
});

Route::get('/danh-muc-thiet-bi', function () {
    return view('news-category', [
        'title' => 'Danh muc thiet bi',
    ]);
});

Route::get('/danh-muc-phep-thu', function () {
    return view('news-category', [
        'title' => 'Danh muc phep thu',
    ]);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
