<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartMainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'cart_main' => [
                'cart_id'         => $this->id ?? '',
                'user_id'         => $this->user->id ?? '',
                'user_name'       => $this->user->user_name ?? '',
                'cart_store'      => CartsubResource::collection($this->cartsub)
            ]

        ];
    }
}
