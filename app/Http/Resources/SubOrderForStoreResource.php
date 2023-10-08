<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\OrderDetailsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubOrderForStoreResource extends JsonResource
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
            'sub_order_statu'  => $this->sub_statu_delivery ?? '',
            'created_at'       => Carbon::parse($this->created_at)->format('H:i a / Y-d-m') ?? '',
            'user'             => [
                'user_name' => $this->main->user->user_name,
                'phone'     => $this->main->user->phone,
                'address'   => $this->main->user->address,
                'region'    => $this->main->user->region->name,
                'lat'       => $this->main->user->lat,
                'long'      => $this->main->user->long,
            ],
        ];
    }
}
