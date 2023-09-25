<?php

namespace App\Http\Resources;

use App\Http\Resources\ItemsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource2 extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'items'          => ItemsSearchResource::collection($this['item']),
            'brand'          => BrandResource::collection($this['brand']->unique()),
            'category'       => CategoryResource::collection($this['category']->unique()),
            'count'          => $this['count'],
        ];
    }
}
