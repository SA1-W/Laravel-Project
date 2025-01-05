<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/category/{slug}', [MainController::class, 'categoryPosts'])->name('categoryPosts');
Route::get('/post/{slug}', [MainController::class, 'postDetail'])->name('postDetail');
Route::get('/tag/{slug}', [MainController::class, 'tagPosts'])->name('tagPosts');

Route::post('/contact', [MainController::class, 'sendMail'])->name('sendMail');

Route::get('/search', [MainController::class, 'search'])->name('search');

Route::get('/lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class);
    Route::resource('ads', AdController::class);
    Route::resource('mail', MailController::class);
    Route::resource('adminProfile', AdminProfileController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
