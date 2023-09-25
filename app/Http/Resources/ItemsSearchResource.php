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
            'is_offer'        => $this->is_offer ?? '',
            'exp_date'        => $this->exp_date ?? '',
            'pro_date'        => $this->pro_date ?? '',
            'description'     => $this->description ?? '',
            'stars'           => culcrating($this->comments->count(), $this->comments->sum('rating')) ?? '',
            'store'           => [
                    'store_id'   => $this->user->id ?? '',
                    'store_name' => $this->user->store_name ?? '',
                    'phone'      => $this->phone ?? '',
                    'phone1'     => $this->phone1 ?? '',
                    'logo'       => $this->user->urllogo ?? '',
                    'stars'           => culcrating($this->user->comments->count(),$this->user->comments->sum('rating')) ?? '',
                ]


        ];
    }
}
