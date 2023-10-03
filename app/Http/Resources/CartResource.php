<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

                'item_id'         => $this->item->id,
                'name'            => $this->item->name ?? '',
                'img'             => $this->img == null ?  $this->item->brand->urlimg : $this->item->urlimg ?? '',
                'category_id'     => $this->item->category_id ?? '',
                'category_name'   => $this->item->category->name ?? '',
                'brand_id'        => $this->item->brand_id ?? '',
                'brand_name'      => $this->item->brand->name ?? '',
                'min_qty'         => $this->item->min_qty ?? '',
                'max_qty'         => $this->item->max_qty ?? '',
                'price_salse'     => $this->item->price_salse ?? '',
                'stock_qty'       => $this->item->stock_qty ?? '',
                'price_offer'     => $this->item->price_offer ?? '',
                'is_offer'        => $this->item->price_offer > 0 ? '1' : '0' ?? '',
                'exp_date'        => $this->item->exp_date ?? '',
                'pro_date'        => $this->item->pro_date ?? '',
                'description'     => $this->item->description ?? '',
                'store_name'      => $this->item->user->store_name ?? '',
                'active'          => $this->item->active ?? '',
            
        ];
    }
}
