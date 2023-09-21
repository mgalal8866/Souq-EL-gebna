<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\brand;

class BrandController extends Controller
{

    function getbrand() {

        return  BrandResource::collection( brand::get(),'success');
    }
}
