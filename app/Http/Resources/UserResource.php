<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'user_name'  => $this->user_name ?? '',
            'store_name' => $this->store_name ?? '',
            'phone'      => $this->phone ?? '',
            'phone1'     => $this->phone1 ?? '',
            'logo'       => $this->urllogo ?? '',
            'img1'       => $this->urlimg1 ?? '',
            'img2'       => $this->urlimg2?? '',
            'lat'        => $this->lat ?? '',
            'long'       => $this->long ?? '',
            'balance'    => $this->balance ?? '',
            'city_id'    => $this->city_id ?? '',
            'region_id'  => $this->region_id ?? '',
            'region_name'   => $this->region->name ?? '',
            'city_name'     => $this->city->name ?? '',
            'address'       => $this->address ?? '',
            'date_payment'  => $this->date_payment ?? '',
            'featured'      => $this->featured ?? '',
            'sales_active'  => $this->sales_active ?? '',
            'type_activity' => $this->type_activity ?? '',
            'rating_view'   => $this->rating_view ?? '',
            'active'        => $this->active ?? '',
            'access_token'  => $this->token ?? '',

        ];
    }
}
