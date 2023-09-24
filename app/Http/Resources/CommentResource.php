<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'user_name'       => $this->user->user_name ?? '',
            'comment'         => $this->comment ?? '',
            'rating'          => $this->rating ?? '',
            'created_at'      => $this->created_at ?? '',
        ];
    }
}
