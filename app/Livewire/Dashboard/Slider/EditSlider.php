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
    public $imagenew,$name,$image, $city,$store, $selectstore =null,$selectcity = null;
    public function saveslider(){

        slider::create([
            'name'     => $this->name,
            'img'      => $this->imagenew != null ? uploadimages('slider', $this->imagenew) : null,
            'store_id' => $this->selectstore,
            'city_id'  => $this->selectcity,
        ]);
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
