<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\OrderDetailsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'header' => [
                'id'              => $this->id ?? '',
                'user_id'         => $this->user_id ?? '',
                'sub_total'       => $this->subtotal ?? '',
                'discount'        => $this->discount ?? '',
                'total'           => $this->total ?? '',
                'created_at'      => $this->created_at ?? '',
                'statu_delivery'  => $this->statu_delivery ?? '',
                'order_type'      => $this->order_type ?? '',
                'note'            => $this->note ?? '',
            ],
            'details' => OrderDetailsResource::collection($this->orderdetails),
        ];
    }
}
