<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SubOrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainOrderUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'main_id'         => $this->id ?? '',
            'user_name'       => $this->user->user_name ?? '',
            'sub_total'       => $this->main_subtotal ?? '',
            'discount'        => $this->main_discount ?? '',
            'total'           => $this->main_total ?? ''
        ];
    }
}
