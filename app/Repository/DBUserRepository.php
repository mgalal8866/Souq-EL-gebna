<?php

namespace App\Repository;

use App\Http\Resources\QuestionResource;
use App\Models\User;
use App\Models\setting;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use App\Models\question;
use App\Models\region;
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
    public function checkphone($phone)
    {
        $user = User::where('phone', $phone)->first();
        if ($user != null) {

            $question = question::whereIn('id', [$user->question1_id, $user->question2_id])->get();
            return Resp(QuestionResource::collection($question), 'success', 200, true);
        } else {
            return Resp('', 'هاتف غير مسجل', 302, false);
        }
    }
    public function checkanswer($request)
    {
        $user = User::where(
            [
                'phone'   => $request->phone,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
            ]
        )->first();
        if ($user != null) {
            return $this->credentials($user);
        } else {
            return Resp('', 'اجابة الاسئلة غير صحيحه او هاتفك غير مسجل', 302, false);
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
        if ($token == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        $user =  auth('api')->user();
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
        $region = region::find($request['region'])->first();
        $user = User::create([
            'user_name'    => $request['user_name'] ?? null,
            'store_name'   => $request['store_name'] ?? null,
            'password'     => $request['password'] ?? null,
            'phone'        => $request['phone'] ?? null,
            'phone1'       => $request['phone1'] ?? null,
            'lat'          => $request['lat'] ?? null,
            'long'         => $request['long'] ?? null,
            'logo'         => uploadimages('store', $request['logo'] ?? null) ?? null,
            'img1'         => uploadimages('store', $request['img1'] ?? null) ?? null,
            'img2'         => uploadimages('store',$request['img2']  ?? null) ?? null,
            'region_id'    => $request['region'] ?? null,
            'city_id'      => $region->city_id ?? null,
            'activity_id'  => $request['activity_id'] ?? null,
            'address'      => $request['address'] ?? null,
            'question1_id' => $request['question1_id'] ?? null,
            'question2_id' => $request['question2_id'] ?? null,
            'answer1'      => $request['answer1'] ?? null,
            'answer2'      => $request['answer2'] ?? null

        ]);
        return $this->credentials($user);
    }
    public function getusers($pg = 30)
    {
        return  User::paginate($pg);
    }
    public function credentials($user)
    {
        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user = User::where('phone', $user->phone)->first();
        $user->token = $token;
        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);
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
