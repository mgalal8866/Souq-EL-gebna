<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\ItemsController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Models\comments;
use App\Models\items;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);


################################### OTP ######################################
Route::get('/sendotp/{phone?}',   [UserController::class, 'sendotp']);
Route::post('/verificationcode',   [UserController::class, 'verificationcode']);
################################### OTP ######################################


################################### Forgot Password ##########################
################################### Forgot Password ##########################
Route::get('/check/phone/{phone?}',   [UserController::class, 'checkphone']);
Route::post('/check/answer',   [UserController::class, 'checkanswer']);
################################### Forgot Password ##########################
################################### Forgot Password ##########################


Route::post('/item/search',   [ItemsController::class, 'search']);
Route::get('/city',   [UserController::class, 'city']);
Route::get('/region/{id?}',   [UserController::class, 'region']);
Route::get('/activity',   [UserController::class, 'activity']);
Route::get('/question',   [UserController::class, 'question']);
Route::get('/sendtoken/{token?}',   [UserController::class, 'sendtoken']);
Route::get('/slider',   [SliderController::class, 'getslider']);
Route::get('/category',   [CategoryController::class, 'getcategory']);
Route::get('/brand',   [BrandController::class, 'getbrand']);
Route::get('setting', [SettingController::class, 'index']);


Route::middleware(['jwt.verify'])->group(function () {
    Route::post('/create/item',   [ItemsController::class, 'createitem']);
    Route::post('/comment/item',   [CommentController::class, 'CreateCommentItem']);
    Route::post('/comment/store',   [CommentController::class, 'CreateCommentStore']);
    Route::get('/user/items',   [ItemsController::class, 'getitembyuser']);
    Route::get('/items/store/{id?}',   [ItemsController::class, 'get_item_by_store']);
    Route::get('/change/active/item/{id?}',   [ItemsController::class, 'change_active_item']);
});
