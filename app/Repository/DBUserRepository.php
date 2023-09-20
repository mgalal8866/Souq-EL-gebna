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
        $user = User::where('phone', $request->get('phone'))->first();
        if ($user == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();

        $data =  new UserResource($user);

        $text = getsetting()->notif_welcome_text;

        $rep = replacetext($text, $user);
        // notificationFCM('اهلا بك', $rep, [$user->fsm]);
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
        // Log::warning($request);
        $user = User::create([
            'client_name' => $request['client_name'] ?? null,
            'phone' => $request['phone'] ?? null,
            'client_fhoneLeter' => $request['client_fhoneLeter'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'lat_mab' => $request['lat_mab'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'client_state' => $request['client_state'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'CategoryAPP' => $request['CategoryAPP'] ?? null,
            'client_code' => $request['client_code'] ?? null,
            'store_name' => $request['store_name'] ?? null
        ]);

        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();
        $text = getsetting()->notif_welcome_text;
        // Log::error($user);
        $rep = replacetext($text,  $user);
        notificationFCM('اهلا بك', $rep, [$user->fsm]);
        return $user;
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

        // Log::alert('sendtoken', ['user' => auth('api')->user(), 'token' => $token]);

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
