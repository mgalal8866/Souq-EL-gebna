<?php

namespace App\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\category;
use Livewire\WithFileUploads;

class NewCategory extends Component
{

    use WithFileUploads;
    public $imagenew, $name, $image;
    public function savecategory()
    {
        category::create([
            'name'     => $this->name,
            'img'      => $this->imagenew != null ? uploadimages('category', $this->imagenew) : null,
        ]);
        $this->dispatch('swal', message: 'تم الاضافة بنجاح');
        $this->redirect('/category');
    }
    public function render()
    {
        return view('dashboard.category.new-category');
    }
}
