<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CitizenController,
    FamilyController,
    GalleryController,
    PostController,
    VillageInfoController,
    CategoryController
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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/village-info', [VillageInfoController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
