<?php

namespace App\Livewire\Dashboard\Brand;

use App\Models\brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBrand extends Component
{
    use WithFileUploads;
    public $imagenew, $name, $image, $edit = false;
    public function savebrand()
    {
        if ($this->edit == false) {
            brand::create([
                'name'     => $this->name,
                'img'      => $this->imagenew != null ? uploadimages('brand', $this->imagenew) : null,
            ]);
            $this->dispatch('swal', message: 'تم التعديل بنجاح');
            $this->redirect('/brands');
        } else {
        }
    }
    public function render()
    {
        return view('dashboard.brand.edit-brand');
    }
}
