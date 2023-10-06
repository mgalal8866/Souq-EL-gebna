<?php

namespace App\Livewire\Dashboard\Slider;

use App\Models\city;
use App\Models\slider;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSlider extends Component
{
    use WithFileUploads;
    public $id, $slider, $imagenew, $name, $image, $city, $store, $selectstore = null, $selectcity = null;
    public function mount($id = null)
    {
        $this->id       = $id;
        $this->slider   = slider::find($id);
        $this->name     = $this->slider->name;
        $this->image    = $this->slider->urlimg;
        $this->selectstore = $this->slider->store_id;
        $this->selectcity  = $this->slider->city_id;
    }

    public function saveslider()
    {
        
        $slider = slider::find($this->id);
        $slider->name     = $this->name;
        if ($this->imagenew) {
            $slider->img      = $this->imagenew != null ? uploadimages('slider', $this->imagenew) : null;
        }
        $slider->store_id = $this->selectstore != '' ? $this->selectstore : null;
        $slider->city_id  = $this->selectcity != '' ? $this->selectcity : null;
        $slider->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->redirect('/slider');
    }

    public function render()
    {
        $this->city = city::get();
        $this->store = User::get();
        return view('dashboard.slider.edit-slider');
    }
}
