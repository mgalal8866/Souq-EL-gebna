<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\OrderDetailsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubOrderResource extends JsonResource
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
                'sub_subtotal'     => $this->sub_subtotal ?? '',
                'sub_discount'     => $this->sub_discount ?? '',
                'sub_total'        => $this->sub_total ?? '',
                'created_at'       => $this->created_at ?? '',
                'order_details' => OrderDetailsResource::collection($this->orderdetails)
        ];
    }
}
