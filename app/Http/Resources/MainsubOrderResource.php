<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Resources\SubOrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainsubOrderResource extends JsonResource
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
                'user_name'       => $this->user->user_name ?? '',
                'sub_total'       => $this->main_subtotal ?? '',
                'discount'        => $this->main_discount ?? '',
                'total'           => $this->main_total ?? '',
                // 'sub_statu_delivery'           => $this->suborder->sub_statu_delivery ?? '',

                'sub_orders'      => SubOrderResource::collection($this->suborder)
            ]
        ];
    }
}
