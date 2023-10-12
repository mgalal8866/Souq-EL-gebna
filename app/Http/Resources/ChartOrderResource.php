<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChartOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'today' =>[
                    'count' =>10,
                    'total' =>1000,
                ],
                'yesterday' =>[
                    'count' =>15,
                    'total' =>2000,
                ],
                'this_week' =>[
                    'count' =>100,
                    'total' =>3000,
                ],
                'this_month' =>[
                    'count' =>200,
                    'total' =>4000,
                ],
        ];
    }
}
