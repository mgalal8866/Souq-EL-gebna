<?php

use App\Livewire\Dashboard\Brand\EditBrand;
use App\Livewire\Dashboard\Brand\ViewBrand;
use App\Livewire\Dashboard\Brands;
use App\Livewire\Dashboard\Category\EditCategory;
use App\Livewire\Dashboard\Category\ViewCategory;
use App\Livewire\Dashboard\Slider\EditSlider;
use App\Livewire\Dashboard\Slider\ViewSlider;
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

Route::get('/', function () {return view('welcome');})->name('dashboard');


// Route::get('/brands',Brands::class)->name('brands');
Route::get('/brands',ViewBrand::class)->name('brand');
Route::get('/update/brands',EditBrand::class)->name('updatebrand');
Route::get('/category',ViewCategory::class)->name('category');
Route::get('/update/category',EditCategory::class)->name('updatecategory');

Route::get('/slider',ViewSlider::class)->name('slider');
Route::get('/update/slider',EditSlider::class)->name('updateslider');
