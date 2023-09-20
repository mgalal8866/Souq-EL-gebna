<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\city;
use App\Models\User;
use App\Models\region;
use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\RegionResource;
use App\Http\Resources\UserResource;
use App\Repositoryinterface\UserRepositoryinterface;

class UserController extends Controller
{
    private $userRepositry;
    public function __construct(UserRepositoryinterface $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }
    public function register(RegisterUser $request)
    {
        $data = new UserResource($this->userRepositry->register($request->validated()));
        return Resp($data, 'Success', 200, true);
    }
    public function verificationcode(Request $request)
    {
        return  $this->userRepositry->verificationcode($request);
    }
    public function sendotp($phone)
    {
        return $this->userRepositry->sendotp($phone);
    }

    public function login(Request $request)
    {
        return   $this->userRepositry->login($request);
    }
    public function edit(Request $request)
    {
        return   $this->userRepositry->edit($request->all());
    }
    public function logout()
    {
        return $this->userRepositry->logout();
    }

    protected function respondWithToken($token, $user = null)
    {
        return response()->json([
            'data' => $user ?? '',
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function sendtoken($token)
    {
        return $this->userRepositry->sendtoken($token);
    }
    public function city()
    {
         $city = city::get();
         return Resp(CityResource::collection($city),'success');
    }
    public function region($id= null)
    {
        $region= region::where('city_id',$id)->get();
        return Resp(RegionResource::collection($region),'success');
    }

}
