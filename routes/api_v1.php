<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\SliderController;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('/sendotp/{phone?}',   [UserController::class, 'sendotp']);
Route::post('/verificationcode',   [UserController::class, 'verificationcode']);
################################### Forgot Password ######################################
################################### Forgot Password ######################################
Route::get('/check/phone/{phone?}',   [UserController::class, 'checkphone']);
Route::post('/check/answer',   [UserController::class, 'checkanswer']);
################################### Forgot Password ######################################
################################### Forgot Password ######################################


Route::get('/city',   [UserController::class, 'city']);
Route::get('/region/{id?}',   [UserController::class, 'region']);
Route::get('/activity',   [UserController::class, 'activity']);
Route::get('/question',   [UserController::class, 'question']);
Route::get('/sendtoken/{token?}',   [UserController::class, 'sendtoken']);
Route::get('/slider',   [SliderController::class, 'getslider']);
Route::get('/category',   [CategoryController::class, 'getcategory']);

Route::get('setting', [SettingController::class, 'index']);
