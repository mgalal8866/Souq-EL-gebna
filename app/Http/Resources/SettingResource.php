<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'maintenance'       => $this->maintenance ?? '',
            'logo'              => $this->urllogo ?? '',
            'name'              => $this->name ?? '',
            'splash'            => $this->urlsplash ?? '',
            'phone'             => $this->phone ?? '',
            'phone1'            => $this->phone1 ?? '',
            'policy'            => $this->policy ?? '',
        ];
    }
}
