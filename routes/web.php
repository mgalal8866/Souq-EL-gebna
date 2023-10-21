<?php

use App\Models\admin;
use App\Models\items;
use App\Models\slider;
use App\Models\setting;
use App\Models\notification;
use App\Models\Cart\CartMain;
use App\Livewire\Dashboard\Brands;
use App\Http\Controllers\AuthAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\User\Users;
use App\Livewire\Dashboard\Admin\Login;
use App\Livewire\Dashboard\User\EditUser;
use App\Livewire\Dashboard\Brand\NewBrand;
use App\Livewire\Dashboard\Items\EditItem;
use App\Livewire\Dashboard\Brand\EditBrand;
use App\Livewire\Dashboard\Brand\ViewBrand;
use App\Livewire\Dashboard\Items\ViewItems;
use App\Livewire\Dashboard\Order\ViewSales;
use App\Livewire\Dashboard\Setting\Settings;
use App\Livewire\Dashboard\Slider\NewSlider;
use App\Livewire\Dashboard\Slider\EditSlider;
use App\Livewire\Dashboard\Slider\ViewSlider;
use App\Livewire\Dashboard\Category\NewCategory;
use App\Livewire\Dashboard\Activity\EditActivity;
use App\Livewire\Dashboard\Activity\ViewActivity;
use App\Livewire\Dashboard\Category\EditCategory;
use App\Livewire\Dashboard\Category\ViewCategory;
use App\Livewire\Dashboard\Notifiction\Notifiction;

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

Route::get('/it', function () {
    $cartmain =  CartMain::where('user_id', 1)->first();
    $cartmain->delete();
    //    $i = items::get();
    //    foreach($i as $q){
    //     $q->update(['name'=>normalize_name($q->name)]);
    //    }
});

Route::get('/newadmin', function () {

    admin::create([
        'username' => 'admin',
        'password' => Hash::make('admin')
    ]);
})->name('newadmin');

Route::middleware('guest:admin')->group( function () {
        Route::get('/login', [AuthAdmin::class, 'index'])->name('login');
        Route::post('/postlogin', [AuthAdmin::class, 'postlogin'])->name('postlogin');
    }
);

Route::middleware('auth:admin')->group(function () {
    Route::get('/logout', [AuthAdmin::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/activitys', ViewActivity::class)->name('activitys');
    Route::get('/activity/edit/{id?}', EditActivity::class)->name('editactivity');

    Route::get('/items', ViewItems::class)->name('items');
    Route::get('/item/edit/{id?}', EditItem::class)->name('edititem');

    Route::get('/orders', ViewSales::class)->name('orders');

    Route::get('/users', Users::class)->name('users');
    Route::get('/user/edit/{id?}', EditUser::class)->name('editusers');

    Route::get('/brands', ViewBrand::class)->name('brand');
    Route::get('/brand/add', NewBrand::class)->name('addbrand');
    Route::get('/brand/edit/{id?}', EditBrand::class)->name('editbrand');

    Route::get('/category', ViewCategory::class)->name('category');
    Route::get('/category/add', NewCategory::class)->name('addcategory');
    Route::get('/category/edit/{id?}', EditCategory::class)->name('editcategory');

    Route::get('/slider', ViewSlider::class)->name('slider');
    Route::get('/slider/add', NewSlider::class)->name('addslider');
    Route::get('/slider/edit/{id?}', EditSlider::class)->name('editslider');

    Route::get('/notifications', Notifiction::class)->name('notifications');
});
