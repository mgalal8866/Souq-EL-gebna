<?php

namespace App\Repository;

use App\Models\User;
use App\Models\setting;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{
    public function sendotp($phone)
    {
        $response = sendsms($phone);
        if ($response  == 1) {
            return Resp('', 'تم ارسال كود التحقق', 200, true);
        } else {
            return Resp('', 'خطاء فى ارسال كود التحقق', 302, false);
        }
    }
    public function verificationcode($request)
    {
        $response = otp_check($request->get('phone'), $request->code);

        if ($response === 1) {
            return $this->login($request);
        } else {
            return Resp('', 'كود التحقق خطاء', 302, false);
        }
    }
    public function login($request)
    {

        $token =  Auth::guard('api')->attempt(['phone' => $request->get('phone'), 'password' => $request->get('password')]);
        // $user = User::where(['phone'=> $request->get('phone'), 'password'=> $request->get('password')])->first();
        if ($token == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        // if (!$token = auth('api')->login($user)) {
        //     return Resp(null, 'Unauthorized', 404, false);
        // }
        $user=  auth('api')->user();
        $user->token = $token;
        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function edit($request)
    {
        DB::beginTransaction();
        try {
            $user =  User::find(Auth::guard('api')->user()->id);
            $user->client_name       = $request['client_name'] ?? $user->client_name;
            $user->client_fhoneLeter = $request['client_fhoneLeter'] ?? $user->client_fhoneLeter;
            $user->region_id         = $request['region_id'] ?? $user->region_id;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->lat_mab           = $request['lat_mab'] ?? $user->lat_mab;
            $user->long_mab          = $request['long_mab'] ?? $user->long_mab;
            $user->client_state      = $request['client_state'] ?? $user->client_state;
            $user->CategoryAPP       = $request['CategoryAPP'] ?? $user->CategoryAPP;
            $user->client_code       = $request['client_code'] ?? $user->client_code;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->question1_id      = $request['question1_id'] ?? $user->store_name;
            $user->question2_id      = $request['question2_id'] ?? $user->store_name;
            $user->answer1           = $request['answer1'] ?? $user->answer1;
            $user->answer2           = $request['answer2'] ?? $user->answer2;
            $user->save();
            $data =  new UserResource($user);
            return Resp($data, 'Success', 200, true);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            DB::rollback();
            return false;
            // something went wrong
        }
    }
    public function register($request)
    {

        $user = User::create([
            'user_name'    => $request['user_name'] ?? null,
            'store_name'   => $request['store_name'] ?? null,
            'password'     => $request['password'] ?? null,
            'phone'        => $request['phone'] ?? null,
            'phone1'       => $request['phone1'] ?? null,
            'lat'          => $request['lat'] ?? null,
            'long'         => $request['long'] ?? null,
            'logo'         => $request['logo'] ?? null,
            'img1'         => $request['img1'] ?? null,
            'img2'         => $request['img2'] ?? null,
            'region'       => $request['region'] ?? null,
            'address'      => $request['address'] ?? null,
            'question1_id' => $request['question1_id'] ?? null,
            'question2_id' => $request['question2_id'] ?? null,
            'answer1'      => $request['answer1'] ?? null,
            'answer2'      => $request['answer2'] ?? null

        ]);
        // $this->login($user);
        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        // $user->token = $token;
        $user = User::where('phone', $user->phone)->first();
        $user->token = $token;
        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);
        // return $user;
    }
    public function getusers($pg = 30)
    {
        return  User::paginate($pg);
    }

    public function settings()
    {
        $dd = setting::find(1);
        return  $dd->toArray();
    }
    public function sendtoken($token)
    {
        if (auth('api')->user() != null) {
            $user = User::find(auth('api')->user()->id);
            $user->update(['fsm' => $token]);
        }
        return response()->json(['Token successfully stored.']);
    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
