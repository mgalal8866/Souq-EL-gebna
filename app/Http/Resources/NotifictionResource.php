<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotifictionResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'title'            => $this->title ?? '',
            'body'             => $this->body ?? '',
            'store_id'         => $this->store_id ?? '',
            // 'redirect_url'     => $this->body ?? '',



        ];
    }
}
