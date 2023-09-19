<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\setting;

class SettingController  extends Controller
{
     public function index(){
       $setting =  setting::get();
     }

}
