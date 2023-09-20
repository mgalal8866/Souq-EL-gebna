<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Repositoryinterface\Sliderepositoryinterface;

class SliderController extends Controller
{
    private $sliderRepositry;
    public function __construct(Sliderepositoryinterface $sliderRepositry)
    {
        $this->sliderRepositry = $sliderRepositry;
    }
    function getslider() {
        return $this->sliderRepositry->getslider();
    }
}
