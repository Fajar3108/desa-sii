<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CitizenController,
    FamilyController,
    GalleryController,
    PostController,
    VillageInfoController,
    CategoryController,
    UserController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/citizens', [CitizenController::class, 'index']);
Route::get('/citizens/{citizen}', [CitizenController::class, 'show']);

Route::get('/families', [FamilyController::class, 'index']);

Route::get('/galleries', [GalleryController::class, 'index']);

Route::get('/article', [PostController::class, 'index']);
Route::get('/article/{post}', [PostController::class, 'show']);

Route::get('/village-info', [VillageInfoController::class, 'index']);

Route::get('/album/{category}', [CategoryController::class, 'show']);
Route::get('/album', [CategoryController::class, 'index']);

Route::delete('citizens', [CitizenController::class, 'massDestroy']);

Route::middleware(['auth'])->group(function () {
    Route::delete('article', [PostController::class, 'massDestroy']);
    Route::delete('album', [CategoryController::class, 'massDestroy']);
    Route::delete('galleries', [GalleryController::class, 'massDestroy']);

    Route::middleware(['admin'])->group(function () {
        // Route::delete('citizens', [CitizenController::class, 'massDestroy']);
        Route::delete('users', [UserController::class, 'massDestroy']);
    });
});
