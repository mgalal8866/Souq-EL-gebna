<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsSearchResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name ?? '',
            'img'             => $this->get_brand_img == 1 ?  $this->brand->urlimg : ( $this->img == null ? $this->brand->urlimg : $this->urlimg ?? ''),
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
            'exp_date'        => $this->exp_date ?? '',
            'pro_date'        => $this->pro_date ?? '',
            'description'     => $this->description ?? '',
            'rating_view'     => $this->rating_view ?? '',
            'in_cart'         => $this->cart !=  null ?true :false,
            'qty_cart'        => $this->cart->cart_item_qty ?? '',
            'rating_view'     => $this->rating_view ?? '',
            'stars'           => culcrating($this->comments->count(), $this->comments->sum('rating')) ?? '',
            'store'           => [
                'store_id'    => $this->user->id ?? '',
                'store_name'  => $this->user->store_name ?? '',
                'logo'        => $this->user->urllogo ?? '',
                'rating_view' => $this->user->rating_view ?? '',
                'featured'    => $this->user->featured ?? '',
                'stars'       => culcrating($this->user->comments->count(), $this->user->comments->sum('rating')) ?? '',
            ]
        ];
    }
}
