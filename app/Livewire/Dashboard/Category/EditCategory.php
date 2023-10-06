<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use WithFileUploads;
    public $id, $imagenew, $name, $image, $category;
    public function mount($id = null)
    {
        $this->id = $id;
        $this->category = category::find($id);
        $this->name     = $this->category->name;
        $this->image    = $this->category->urlimg;
    }
    public function savecategory()
    {
        $category = category::find($this->id);
        $category->name = $this->name;
        if ($this->imagenew) {
            $category->img      = $this->imagenew != null ? uploadimages('category', $this->imagenew) : $category->img;
        }
        $category->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->redirect('/category');
    }
    public function render()
    {
        return view('dashboard.category.edit-category');
    }
}
