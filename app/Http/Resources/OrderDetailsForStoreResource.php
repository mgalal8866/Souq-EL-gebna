<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\SubOrderForStoreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsForStoreResource  extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sub_order'         => [
                'sub_order_id'     => $this['details'][0]->suborder->id ?? '',
                'store_id'         => $this['details'][0]->suborder->store_id ?? '',
                'store_name'       => $this['details'][0]->suborder->store->store_name ?? '',
                'client_name'      => $this['details'][0]->suborder->main->user->user_name ?? '',
                'sub_subtotal'     => $this['details'][0]->suborder->sub_subtotal ?? '',
                'sub_discount'     => $this['details'][0]->suborder->sub_discount ?? '',
                'sub_total'        => $this['details'][0]->suborder->sub_total ?? '',
                'sub_order_statu'  => $this['details'][0]->suborder->sub_statu_delivery ?? '',
                'note'       => $this['details'][0]->suborder->note ?? '',
                'created_at'       => Carbon::parse($this['details'][0]->suborder->created_at)->format('H:i a / Y-d-m') ?? '',
                'order_details'      => OrderDetailsResource::collection($this['details']),
            ],
        ];
    }
}
