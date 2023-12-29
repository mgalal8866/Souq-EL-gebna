<?php

namespace App\Livewire\Dashboard\Items;

use App\Models\brand;
use App\Models\items;
use Livewire\Component;
use App\Models\category;
use Livewire\WithFileUploads;

class EditItem extends Component
{
    use WithFileUploads;
    public $get_brand_img,$item, $newimg, $name, $oldimg, $img, $category_id, $categorys, $brand_id, $brands, $stock_qty, $min_qty, $max_qty,
        $price_salse, $price_offer, $exp_date, $pro_date, $description, $active, $active_admin, $rating_view;
    public function mount($id)
    {
        $item = items::find($id);
        $this->item = $item;
        $this->get_brand_img = $item->get_brand_img == 0 ? false : true;
        $this->name = $item->name;
        $this->oldimg = $item->urlimg;
        $this->img = $item->img;
        $this->category_id = $item->category_id;
        $this->brand_id = $item->brand_id;
        $this->stock_qty = $item->stock_qty;
        $this->min_qty = $item->min_qty;
        $this->max_qty = $item->max_qty;
        $this->price_salse = $item->price_salse;
        $this->price_offer = $item->price_offer;
        $this->exp_date = $item->exp_date;
        $this->pro_date = $item->pro_date;
        $this->description = $item->description;
        $this->active = $item->active == 0 ? false : true;
        $this->active_admin = $item->active_admin == 0 ? false : true;
        $this->rating_view = $item->rating_view == 0 ? false : true;

        $this->categorys = category::get();
        $this->brands = brand::get();
    }
    public function saveitem()
    { if ($this->newimg) {

        $this->item->img       = $this->newimg != null ? uploadimages('store', $this->newimg) : $this->img;
    }
        $this->item->name = $this->name;
        $this->item->get_brand_img = $this->get_brand_img;
        $this->item->name = $this->name;
        $this->item->category_id = $this->category_id;
        $this->item->brand_id = $this->brand_id;
        $this->item->stock_qty = $this->stock_qty;
        $this->item->min_qty = $this->min_qty;
        $this->item->max_qty = $this->max_qty;
        $this->item->price_salse = $this->price_salse;
        $this->item->price_offer = $this->price_offer;
        $this->item->exp_date = $this->exp_date;
        $this->item->pro_date = $this->pro_date;
        $this->item->description = $this->description;
        $this->item->active = $this->active;
        $this->item->active_admin = $this->active_admin;
        $this->item->rating_view = $this->rating_view;
        $this->item->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');

    }
    public function render()
    {
        return view('dashboard.items.edit-item');
    }
}
