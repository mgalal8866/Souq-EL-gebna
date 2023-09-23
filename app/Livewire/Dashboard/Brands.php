<?php

namespace App\Livewire\Dashboard;

use App\Models\brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class Brands extends Component
{
    use WithFileUploads;
    public $selectbrand, $brand, $imagenew, $image = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYwyqoKRCzFkWWtvxcQTUciSyYPtkKiFRznj-LygMwzw&s", $name;
    function mount()
    {
        $this->brand = brand::get();
    }

    function  updatedSelectbrand()
    {
        $brand = brand::find($this->selectbrand);
        $this->name = $brand->name;
        $this->imagenew = null;
        $this->image = getimage($brand->img,'brand');
    }
    function  savebrand()
    {
        $brand = brand::find($this->selectbrand);
        $brand->update([
            'name' => $this->name,
            'img' => $this->imagenew != null ? uploadimages('brand', $this->imagenew) : null,
        ]);
        $this->dispatch('swal', message:'تم التعديل بنجاح' );

    }
    public function render()
    {
        return view('dashboard.brands');
    }
}
