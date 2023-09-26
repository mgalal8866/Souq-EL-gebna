<?php

namespace App\Http\Resources;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Resources\ItemsStoreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsStoreMainResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'items'    => ItemsStoreResource::collection($this['item']),
            // 'category' => category::WhereHas('item', function ($q) {
            //     $q->where('user_id', $this['item']->user->id);
            // })->get()
        ];
    }
}
