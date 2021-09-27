<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/dashboard');;
});

Route::any('/register', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function() { return view('dashboard.dashboard'); })->name('dashboard');

    Route::get('citizen/export', [CitizenController::class, 'export'])->name('citizen.export');
    Route::post('citizen/import', [CitizenController::class, 'import'])->name('citizen.import');

    Route::resource('/citizen', CitizenController::class);

    Route::resource('/post', PostController::class);
    Route::post('post/upload', [PostController::class, 'upload'])->name("upload.store");

    Route::resource('/category/{category:id}/gallery', GalleryController::class)->only('store', 'destroy');

    Route::get('/setting', [VillageInfoController::class, 'show']);
    Route::patch('/setting/{id}', [VillageInfoController::class, 'update'])->name('setting.update');

    Route::resource('/category', CategoryController::class)->only('index', 'show', 'store', 'destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [UserController::class, 'show'])->name('users.show');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user:id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{user:id}', [UserController::class, 'updatePassword'])->name('users.update');

    Route::middleware(['admin'])->group(function () {
        Route::get('/setting', [VillageInfoController::class, 'setting']);
        Route::get('/slider', [VillageInfoController::class, 'slider']);

        Route::patch('/setting/{id}', [VillageInfoController::class, 'update'])->name('setting.update');

        Route::resource('/citizen', CitizenController::class);


        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/profile', [UserController::class, 'show'])->name('users.show');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{user:id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::resource('slider', SliderController::class)->only('store', 'destroy');

        Route::resource('page', PageController::class)->only('store', 'destroy', 'index', 'update');
    });
});

