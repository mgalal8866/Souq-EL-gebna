<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\brand;
use App\Models\notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\NotifictionResource;
use App\Models\User;
use Illuminate\Http\Request;

class NotifictionController extends Controller
{

    function getnotifiction() {
            $notifi = notification::where('user_id', auth('api')->user()->id)->orwhere('user_id', null)->latest()->get();
        return Resp(NotifictionResource::collection($notifi, 'success'), 'success');
    }
    function fsm(Request $request) {

         $user =  User::find(auth('api')->user()->id);
         $user->update(['fsm'=>$request->token_fsm]);
        return Resp('','success');
    }
}
