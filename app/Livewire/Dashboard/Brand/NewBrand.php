<?php

namespace App\Livewire\Dashboard\Brand;

use App\Models\brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewBrand extends Component
{
    use WithFileUploads;
    public $imagenew, $name, $image;
    public function savebrand()
    {
        brand::create([
            'name'     => $this->name,
            'img'      => $this->imagenew != null ? uploadimages('brand', $this->imagenew) : null,
        ]);
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->redirect('/brands');
    }
    public function render()
    {
        return view('dashboard.brand.new-brand');
    }
}
