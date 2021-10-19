<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;



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



Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('blogconfirm/{id}',[App\Http\Controllers\AdminController::class,'confirm'])->name('blog.confirm');
    Route::get('/admin', [App\Http\Controllers\AdminController::class,'index']);
    Route::get('adminshow', [App\Http\Controllers\AdminController::class,'showblogs'])->name('admin.show');
});

Route::POST('/img',[App\Http\Controllers\ImgController::class,'index'])->name('img');



Route::resource('/blog', App\Http\Controllers\BlogController::class);

Route::get('/create',[App\Http\Controllers\BlogController::class,'store'])->middleware('auth')->name('create');


Route::post('commentaire',[App\Http\Controllers\CommentController::class,'commentaire'])->name('commentaire');
