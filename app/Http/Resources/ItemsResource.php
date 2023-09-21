<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name ?? '',
            'category_id'     => $this->category_id ?? '',
            'category_name'   => $this->category->name ?? '',
            'brand_id'        => $this->brand_id ?? '',
            'brand_name'      => $this->brand->name ?? '',
            'min_qty'         => $this->min_qty ?? '',
            'max_qty'         => $this->max_qty ?? '',
            'price_salse'     => $this->price_salse ?? '',
            'price_offer'     => $this->price_offer ?? '',
            'exp_date'        => $this->exp_date ?? '',
            'pro_date'        => $this->pro_date ?? '',

        ];
    }
}