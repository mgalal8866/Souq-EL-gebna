<?php

namespace App\Livewire\Dashboard\Brand;

use App\Models\brand;
use Livewire\Component;

class ViewBrand extends Component
{
    public $brands;
    public function delete($brandid)
    {
        $delbrandid = brand::find($brandid);
        if($delbrandid->item->count() > 0){
            $this->dispatch('swal', message: '  لايمكن حذف البراند يوجد اصناف مرتبطه بة');
        }else{
            $delbrandid->delete();
            $this->dispatch('swal', message: 'تم الحذف بنجاح');
        }

    }
    public function render()
    {
        $this->brands = brand::get();
        return view('dashboard.brand.view-brand');
    }
}
