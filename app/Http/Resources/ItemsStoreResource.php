<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsStoreResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name ?? '',
            'img'             => $this->img == null ?  $this->brand->urlimg : $this->urlimg ?? '',
            'category_id'     => $this->category_id ?? '',
            'category_name'   => $this->category->name ?? '',
            'brand_id'        => $this->brand_id ?? '',
            'brand_name'      => $this->brand->name ?? '',
            'min_qty'         => $this->min_qty ?? '',
            'max_qty'         => $this->max_qty ?? '',
            'price_salse'     => $this->price_salse ?? '',
            'stock_qty'       => $this->stock_qty ?? '',
            'price_offer'     => $this->price_offer ?? '',
            'is_offer'        => $this->price_offer > 0 ? '1' : '0' ?? '',
            'in_cart'         => $this->cart !=  null ?true :false,
            'qty_cart'        => $this->cart->cart_item_qty ?? '',
            'exp_date'        => Carbon::parse($this->exp_date)->format('Y-m-d') ?? '',
            'pro_date'        => Carbon::parse($this->pro_date)->format('Y-m-d') ?? '',
            'description'     => $this->description ?? '',
            'rating_view'     => $this->rating_view ?? '',
            'stars'           => culcrating($this->comments->count(), $this->comments->sum('rating')) ?? '',

        ];
    }
}
