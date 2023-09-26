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
            'items'    => ItemsStoreResource::collection($this['items']),
            'category' => CategoryResource::collection(category::WhereHas('item', function ($q) {
                $q->where('user_id', $this['items'][0]->user->id);
            })->get()),
            'store'           => [
                'store_id'    => $this['items'][0]->user->id ?? '',
                'store_name'  => $this['items'][0]->user->store_name ?? '',
                'logo'        => $this['items'][0]->user->urllogo ?? '',
                'featured'    => $this['items'][0]->user->featured ?? '',
                'stars'       => culcrating($this['items'][0]->user->comments->count(), $this['items'][0]->user->comments->sum('rating')) ?? '',
            ]
        ];
    }
}
