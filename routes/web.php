<?php

use App\Livewire\Dashboard\Brands;
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


Route::get('/brands',Brands::class)->name('brands');
Route::get('/slider',ViewSlider::class)->name('slider');
Route::get('/update/slider',EditSlider::class)->name('updateslider');
