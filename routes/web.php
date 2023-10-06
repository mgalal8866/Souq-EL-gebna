<?php

use App\Livewire\Dashboard\Brand\EditBrand;
use App\Livewire\Dashboard\Brand\NewBrand;
use App\Livewire\Dashboard\Brand\ViewBrand;
use App\Livewire\Dashboard\Brands;
use App\Livewire\Dashboard\Category\EditCategory;
use App\Livewire\Dashboard\Category\NewCategory;
use App\Livewire\Dashboard\Category\ViewCategory;
use App\Livewire\Dashboard\Slider\EditSlider;
use App\Livewire\Dashboard\Slider\NewSlider;
use App\Livewire\Dashboard\Slider\ViewSlider;
use App\Livewire\Dashboard\User\Users;
use App\Models\items;
use App\Models\slider;
use Illuminate\Support\Facades\Route;

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
   $i = items::get();
   foreach($i as $q){
    $q->update(['name'=>normalize_name($q->name)]);
   }
});

Route::get('/', function () {return view('welcome');})->name('dashboard');


Route::get('/users',Users::class)->name('users');

Route::get('/brands',ViewBrand::class)->name('brand');
Route::get('/brand/add',NewBrand::class)->name('addbrand');
Route::get('/brand/edit/{id?}',EditBrand::class)->name('editbrand');

Route::get('/category',ViewCategory::class)->name('category');
Route::get('/category/add',NewCategory::class)->name('addcategory');
Route::get('/category/edit/{id?}',EditCategory::class)->name('editcategory');

Route::get('/slider',ViewSlider::class)->name('slider');
Route::get('/slider/add',NewSlider::class)->name('addslider');
Route::get('/slider/edit/{id?}',EditSlider::class)->name('editslider');

