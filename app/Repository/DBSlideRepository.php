<?php

namespace App\Repository;

use App\Http\Resources\SliderResource;
use App\Models\slider;
use App\Repositoryinterface\Sliderepositoryinterface;


class DBSlideRepository implements Sliderepositoryinterface
{
    public function getslider($request)
    {

        $slider = slider::where(function($q)use( $request){
            if($request['city_id'] != null){
                $q->where('city_id', $request['city_id'])->orWhereNull('city_id');
            }
        })->get();
        return Resp(SliderResource::collection($slider),'success');
    }
    public function deleteslider($id)
    {

        $slider = slider::find($id);
        $slider->delete();
        return Resp('','success');
    }

  }
