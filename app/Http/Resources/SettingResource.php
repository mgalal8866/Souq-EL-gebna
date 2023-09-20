<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'maintenance'       =>$this->maintenance,
            'logo'              =>$this->logo,
            'name'              =>$this->name,
            'splash'            =>getimage($this->splash,'logo'),
            'phone'             =>$this->phone,
            'phone1'            =>$this->phone1,
            'policy'            =>$this->policy,
        ];
    }
}
