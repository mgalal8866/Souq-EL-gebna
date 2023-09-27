<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'img'             => $this->urlimg ?? '',
            'store_id'        => $this->store_id ?? '',
            'city_id'         => $this->city_id ?? '',
        ];
    }
}
