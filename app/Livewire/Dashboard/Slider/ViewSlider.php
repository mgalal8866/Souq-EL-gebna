<?php

namespace App\Livewire\Dashboard\Slider;

use App\Models\slider;
use Livewire\Component;

class ViewSlider extends Component
{
    public $sliders;
    public function render()
    {
        $this->sliders= slider::with('user')->get();
        return view('dashboard.slider.view-slider');
    }
}
