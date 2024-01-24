<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\V1\PostController as PostV1;

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
 


Route::prefix('api')->name('api.')->group(function(){

    Route::prefix('/v1')->name('v1.')->group(function () {

            Route::prefix('/posts')->name('post.')->group(function () {
            Route::get('/', [PostV1::class,'index'])->name('index');
            // Route::get('{post}/show', 'API/V1/PostController@show')->name('show');
        });
    });
});