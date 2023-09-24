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
            'id'         => $this->id,
            'item_id'    => $this->item_id,
            'item_name'  => $this->item->name,
            'qty'        => $this->qty,
            'price'      => $this->price,
            'sub_total'  => $this->subtotal,
            'discount'   => $this->discount,
            'total'      => $this->total
        ];
    }
}
