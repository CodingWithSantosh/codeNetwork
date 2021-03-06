<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('resourse/index',function(){
    return view('frontend.resourse.index');
});

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('tutorial/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewPost']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// comments system
Route::post('comments',[App\Http\Controllers\commentController::class,'store']);
Route::post('delete-comment',[App\Http\Controllers\commentController::class,'delete']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard',[App\Http\Controllers\admin\DashboardController::class, 'index']);
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('add-category',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('add-category',[App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('edit-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'delete']);

    Route::get('posts',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('edit-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::put('update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update']);
    Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'delete']);
    
    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('edit-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);
    
    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class,'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class,'store']);
    
});



