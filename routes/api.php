<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route ::apiResource('user',UserController::class);
Route::post('login',[UserController::class,'login'])->name('userlogin');
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('register',[UserController::class,'register']);
// Route::post('register',[UserController::class,'register'])->middleware('auth');


Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('user',[UserController::class,'userDetails']);
    Route::get('logout',[UserController::class,'logout']);
    Route::post('post/create',[PostsController::class,'store'])->name('create_post');
    Route::get('post',[PostsController::class,'index'])->name('all_post is publish');
    Route::get('post/noPublish',[PostsController::class,'show'])->name('all_post_not_published');
    Route::put('post/Publish/{post}',[PostsController::class,'update'])->name('publish_post');

    // route('products.index', ['manufacturer' => 'Samsung']);
});


Route::get('sendMail',[PostsController::class,'sendmail']);


