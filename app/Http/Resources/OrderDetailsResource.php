<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'details_id'      => $this->id,
            'item_id'         => $this->item_id,
            'item_name'       => $this->item->name,
            'price_befour'    => $this->item->price_salse,
            'is_offer'        => $this->item->price_offer > 0 ? '1' : '0' ?? '',
            'details_price'   => $this->details_price,
            'details_qty'     => $this->details_qty,
            'details_subtotal'  => $this->details_subtotal,
            'details_discount'  => $this->details_discount,
            'details_total'     => $this->details_total,
        ];
    }
}
