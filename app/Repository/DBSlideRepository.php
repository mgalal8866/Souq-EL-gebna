<?php

namespace App\Repository;

use App\Http\Resources\SliderResource;
use App\Models\slider;
use App\Repositoryinterface\Sliderepositoryinterface;


class DBSlideRepository implements Sliderepositoryinterface
{
    public function getslider()
    {
        $slider = slider::get();
        return Resp(SliderResource::collection($slider),'success');
    }

  }
