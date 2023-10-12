<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\category;
use Livewire\Component;

class ViewCategory extends Component
{
    public $categorys;

    public function delete($categoryid)
    {
        $delcategoryid = category::find($categoryid);
        if ($delcategoryid->item->count() > 0) {
            $this->dispatch('swal', message: '  لايمكن حذف القسم يوجد اصناف مرتبطه بة');
        } else {
            $delcategoryid->delete();
            $this->dispatch('swal', message: 'تم الحذف بنجاح');
        }
    }
    public function edit($categoryid)
    {
        $delcategoryid = category::find($categoryid);

        // if ($delcategoryid->item->count() > 0) {
        //     $this->dispatch('swal', message: '  لايمكن حذف القسم يوجد اصناف مرتبطه بة');
        // } else {
        //     $delcategoryid->delete();
        //     $this->dispatch('swal', message: 'تم الحذف بنجاح');
        // }
    }
    public function render()
    {
        $this->categorys = category::withCount('item')->get();
        return view('dashboard.category.view-category');
    }
}
