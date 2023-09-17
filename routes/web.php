<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaidController;
use http\Client\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::post('follow/{user}',[FollowsController::class,'store']);





Route::get('p/create',[PostController::class ,'create'])->name('post.create');
Route::post('p/',[PostController::class ,'store'])->name('post.store');
Route::get('p/{var}',[PostController::class ,'show'])->name('post.show');
Route::get('/',[PostController::class ,'index']) ;

Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('profile/{var2}/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::PUT('profile/{var2}/update',[ProfileController::class,'update'])->name('profile.update');



