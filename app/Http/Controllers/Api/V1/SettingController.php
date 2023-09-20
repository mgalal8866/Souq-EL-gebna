<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;

class SettingController  extends Controller
{
     public function index(){
       $setting =  setting::find(1);
       return Resp(new SettingResource($setting),'success',200,true);
     }

}
