<?php

namespace App\Repository;

use App\Models\User;
use App\Models\region;
use App\Models\setting;
use App\Models\question;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\LoginUserResource;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{

    protected Model $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
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
        $user = $this->model->where('phone', $phone)->first();
        if ($user != null) {

            $question = question::whereIn('id', [$user->question1_id, $user->question2_id])->get();
            return Resp(QuestionResource::collection($question), 'success', 200, true);
        } else {
            return Resp('', 'هاتف غير مسجل', 302, false);
        }
    }
    public function checkanswer($request)
    {
        $user = $this->model->where(
            [
                'phone'   => $request->phone,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
            ]
        )->first();
        if ($user != null) {
            return $this->credentials($user);
        } else {
            return Resp('', 'اجابة الاسئلة غير صحيحة', 302, false);
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
    public function getuserdata()
    {
        $user =  auth('api')->user();
        $data =  new LoginUserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function login($request)
    {
        $token =  Auth::guard('api')->attempt(['phone' => $request->get('phone'), 'password' => $request->get('password')]);
        if ($token == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        // if (auth('api')->user()->active == 0) {
        //     return Resp(null, 'تم ايقاف حسابك ', 404, false);
        // }

        $user =  auth('api')->user();
        $user->token = $token;
        $data =  new LoginUserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function edit($request)
    {
        DB::beginTransaction();
        try {
            $user =  $this->model->find(Auth::guard('api')->user()->id);
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
        $setting = setting::find(1);
        $region = region::find($request['region']);
        $user = $this->model->create([
            'user_name'    => $request['user_name'] ?? null,
            'store_name'   => $request['store_name'] ?? null,
            'password'     => $request['password'] ?? null,
            'phone'        => $request['phone'] ?? null,
            'phone1'       => $request['phone1'] ?? null,
            'lat'          => $request['lat'] ?? null,
            'long'         => $request['long'] ?? null,
            'logo'         => uploadimages('store', $request['logo'] ?? null) ?? null,
            'img1'         => uploadimages('store', $request['img1'] ?? null) ?? null,
            'img2'         => uploadimages('store', $request['img2']  ?? null) ?? null,
            'region_id'    => $request['region'] ?? null,
            'city_id'      => $region->city_id ?? null,
            'sales_active' => $setting->active_salse == 1 ? 1 : 0,
            'activity_id'  => $request['activity_id'] ?? null,
            'address'      => $request['address'] ?? null,
            'question1_id' => $request['question1_id'] ?? null,
            'question2_id' => $request['question2_id'] ?? null,
            'answer1'      => $request['answer1'] ?? null,
            'answer2'      => $request['answer2'] ?? null

        ]);
        return $this->credentials($user);
    }
    public function editprofile($request)
    {
        $user = $this->model->find(auth('api')->user()->id);
        $region = region::find($request['region']);
        $user->user_name   = $request['user_name'] ?? $user->user_name;
        $user->store_name  = $request['store_name'] ?? $user->store_name;
        $user->phone1      = $request['phone1'] ?? $user->phone1;
        $user->lat         = $request['lat'] ?? $user->lat;
        $user->long        = $request['long'] ?? $user->long;
        $user->logo        = isset($request['logo']) == true ? uploadimages('store', $request['logo']) : $user->logo;
        $user->img1        = isset($request['img1']) == true ? uploadimages('store', $request['img1']) : $user->img1;
        $user->img2        = isset($request['img2']) == true ? uploadimages('store', $request['img2']) : $user->img2;
        $user->region_id   = $request['region'] ?? $user->region_id;
        $user->city_id     =  $region->city_id  ?? $user->city_id;
        $user->question1_id = $request['question1_id'] ?? $user->question1_id;
        $user->answer1      = $request['answer1'] ?? $user->answer1;
        $user->question2_id = $request['question2_id'] ?? $user->question2_id;
        $user->answer2      = $request['answer2'] ?? $user->answer2;
        $user->activity_id  = $request['activity_id'] ?? $user->activity_id;
        $user->address      = $request['address'] ?? $user->address;
        $user->save();
        $data =  new LoginUserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function getusers($pg = 30)
    {
        return  $this->model->paginate($pg);
    }
    public function credentials($user)
    {
        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user = $this->model->where('phone', $user->phone)->first();
        $user->token = $token;
        $data =  new LoginUserResource($user);
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
            $user = $this->model->find(auth('api')->user()->id);
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
