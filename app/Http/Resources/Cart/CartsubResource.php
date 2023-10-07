<?php

namespace App\Http\Resources\Cart;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartsubResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sub_order_id'     => $this->id ?? '',
            'store_id'         => $this->store_id ?? '',
            'store_name'       => $this->store->store_name ?? '',
            'sub_subtotal'     => number_format($this->cartitem->sum('cart_item_subtotal'),2) ?? '',
            'sub_discount'     => number_format($this->cartitem->sum('cart_item_discount'), 2) ?? '',
            'sub_total'        => number_format($this->cartitem->sum('cart_item_total'),2) ?? '',
            'created_at'       => Carbon::parse($this->created_at)->translatedFormat('H:i / Y-m-d') ?? '',
            'cart_item'    => CartItemResource::collection($this->cartitem)
        ];
    }
}
