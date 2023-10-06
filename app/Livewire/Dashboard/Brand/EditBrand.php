<?php

namespace App\Livewire\Dashboard\Brand;

use App\Models\brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBrand extends Component
{
    use WithFileUploads;
    public $id, $imagenew, $name, $image, $brand;

    use WithFileUploads;
    public function mount($id = null)
    {
        $this->id = $id;
        $this->brand = brand::find($id);
        $this->name     = $this->brand->name;
        $this->image    = $this->brand->urlimg;
    }
    public function savebrand()
    {
        $brand = brand::find($this->id);
        $brand->name = $this->name;
        if ($this->imagenew) {
            $brand->img      = $this->imagenew != null ? uploadimages('brand', $this->imagenew) : $brand->img;
        }
        $brand->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->redirect('/brands');
    }
    public function render()
    {
        return view('dashboard.brand.edit-brand');
    }
}
