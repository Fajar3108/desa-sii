<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CitizenController,
    FamilyController,
    PostController,
    GalleryController,
    VillageInfoController,
    CategoryController,
};

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function() { return view('dashboard.dashboard'); })->name('dashboard');

    Route::resource('/citizen', CitizenController::class);

    Route::resource('/family', FamilyController::class);

    Route::resource('/post', PostController::class);
    Route::post('post/upload', [PostController::class, 'upload'])->name("upload.store");

    Route::resource('/gallery', GalleryController::class);

    Route::get('/setting', [VillageInfoController::class, 'show']);
    Route::patch('/setting/{id}', [VillageInfoController::class, 'update'])->name('setting.update');

    Route::resource('/category', CategoryController::class);
});
