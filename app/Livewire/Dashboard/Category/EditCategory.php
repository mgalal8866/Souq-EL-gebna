<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use WithFileUploads;
    public $imagenew, $name, $image, $edit = false;
    public function savecategory()
    {
        if ($this->edit == false) {
            category::create([
                'name'     => $this->name,
                'img'      => $this->imagenew != null ? uploadimages('category', $this->imagenew) : null,
            ]);
            $this->dispatch('swal', message: 'تم التعديل بنجاح');
            $this->redirect('/category');
        }else{

        }
    }
    public function render()
    {
        return view('dashboard.category.edit-category');
    }
}
