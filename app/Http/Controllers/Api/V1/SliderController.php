<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Repositoryinterface\Sliderepositoryinterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderRepositry;
    public function __construct(Sliderepositoryinterface $sliderRepositry)
    {
        $this->sliderRepositry = $sliderRepositry;
    }
    function getslider(Request $request)
    {
        return $this->sliderRepositry->getslider($request->all());
    }
    function deleteslider($id)
    {
        return $this->sliderRepositry->deleteslider($id);
    }
}
