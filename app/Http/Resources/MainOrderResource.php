<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SubOrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'main_order' => [
                'main_id'         => $this->id ?? '',
                'user_id'         => $this->user->user_name ?? '',
                'sub_total'       => $this->main_subtotal ?? '',
                'discount'        => $this->main_discount ?? '',
                'total'           => $this->main_total ?? '',
                'sub_orders'      => SubOrderResource::collection($this->suborder)
            ]
        ];
    }
}
