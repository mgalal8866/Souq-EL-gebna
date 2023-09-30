<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginUserResource extends JsonResource
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
            'activity_id'   => $this->activity_id ?? '',
            'rating_view'   => $this->rating_view ?? '',
            'access_token'  => $this->token ?? '',
            'question1_id'  => $this->question1_id ?? '',
            'question1'     => $this->question1->question ?? '',
            'answer1'       => $this->answer1 ?? '',
            'question2_id'  => $this->question2_id ?? '',
            'question2'     => $this->question2->question ?? '',
            'answer2'       => $this->answer2 ?? '',
            'sharelink'     => 'http://souqelgebna.com?store='.$this->id,

        ];
    }
}
