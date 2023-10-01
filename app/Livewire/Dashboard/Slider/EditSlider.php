<?php

namespace App\Livewire\Dashboard\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditSlider extends Component
{
    use WithFileUploads;
    public $imagenew,$name,$image;
    public function render()
    {
        return view('dashboard.slider.edit-slider');
    }
}
