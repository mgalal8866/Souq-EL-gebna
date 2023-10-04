<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'details_id'          => $this->id,
            'item_id'             => $this->item_id,
            'item_name'           => $this->item->name,
            'cart_item_price'     => $this->cart_item_price,
            'cart_item_qty'       => $this->cart_item_qty,
            'cart_item_subtotal'  => $this->cart_item_subtotal,
            'cart_item_discount'  => $this->cart_item_discount,
            'cart_item_total'     => $this->cart_item_total,
        ];
    }
}
