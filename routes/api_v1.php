<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\ItemsController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\NotifictionController;
use App\Http\Controllers\Api\V1\OrderController;
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
Route::get('/delete/slider/{id?}',   [SliderController::class, 'deleteslider']);
Route::get('/category',   [CategoryController::class, 'getcategory']);
Route::get('/brand',   [BrandController::class, 'getbrand']);
Route::get('setting', [SettingController::class, 'index']);


Route::middleware(['jwt.verify'])->group(function () {
    ################################### Start Comments ##########################
    Route::get('/order/chart/{id?}',   [OrderController::class, 'get_chart_order']);
    Route::post('/comment/item',   [CommentController::class, 'CreateCommentItem']);
    Route::post('/comment/store',  [CommentController::class, 'CreateCommentStore']);
    Route::get('/comment/store/{id?}', [CommentController::class, 'get_store_by_id']);
    Route::get('/comment/item/{id?}',  [CommentController::class, 'get_item_by_id']);
    Route::get('/delete/comment/{id?}',  [CommentController::class, 'delete_comment_by_id']);
    ################################### End Comments ##########################

    ################################### Start Cart  ########################
    Route::get('/cart/user',   [CartController::class, 'getusercart']);
    Route::get('/cart/add',   [CartController::class, 'add_to_cart']);
    Route::get('/cart/delete',   [CartController::class, 'del_from_cart']);
    ################################### End Cart  ##########################
    ################################### Start notifiction  ########################
    Route::post('/user/fsm',   [NotifictionController::class, 'fsm']);
    Route::get('/get/user/data',   [UserController::class, 'getuserdata']);
    Route::get('/get/notifictions',   [NotifictionController::class, 'getnotifiction']);
    ################################### End notifiction  ##########################

    ################################### Start Cart  ########################
    Route::post('/order/please',   [OrderController::class, 'please_order']);
    Route::get('/order/user',      [OrderController::class, 'get_order_user']);
    Route::get('/sub/orders/{id?}', [OrderController::class, 'get_suborder_by_main_id']);
    Route::get('/order/statu', [OrderController::class, 'get_order_by_statu']);
    Route::get('/order/change/statu', [OrderController::class, 'change_statu']);
    Route::get('/order/details', [OrderController::class, 'get_order_details']);
    ################################### End Cart  ##########################

    ################################### Start ITEMS ##########################
    Route::post('/create/item',   [ItemsController::class, 'createitem']);
    Route::post('/edit/item',   [ItemsController::class, 'edititem']);
    Route::post('/user/edit/profile',   [UserController::class, 'editprofile']);
    Route::get('/user/items',   [ItemsController::class, 'getitembyuser']);
    Route::get('/items/store/{id?}',   [ItemsController::class, 'get_item_by_store']);
    Route::get('/items/category/{id?}',   [ItemsController::class, 'get_item_by_category']);
    Route::get('/change/active/item/{id?}',   [ItemsController::class, 'change_active_item']);
    ################################### End ITEMS ##########################
});
