<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\setting;
use Illuminate\Support\Str;
use App\Models\notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

function Resp($data = null, $msg = null, $status = 200, $statusval = true)
{
    if ($status == 422) {
        return response()->json(['errors' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } elseif ($status != 200) {
        return response()->json(['msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } else {
        return response()->json(['data' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval], $status);
    }
}
function sendsms($phone)
{

    if (env('SMS_OTP', false) === false) {
        return 1;
    } else {

        // $code = rand(123456, 999999);
        // $msg = 'كود التحقق ' . $code;
        $response = Http::contentType('application/json')->accept('application/json')->post('https://smssmartegypt.com/sms/api/otp-send', [
            'username'  => '$setting->sms_username',
            'password'  => '$setting->sms_password',
            'sender'    => '$setting->sms_senderid',
            'mobile'    => '2' . $phone,
            'lang'      => 'ar'
        ]);
        $res = $response->json();
        if ($res['type'] ?? 'error' == 'error') {
            return 0;
        } else {
            return 1;
        };
    }
}

function otp_check($phone, $code)
{

    if (env('SMS_OTP', false) === false) {
        return 1;
    } else {
        $response = Http::accept('application/json')->post('https://smssmartegypt.com/sms/api/otp-check', [
            'username'  => '$setting->sms_username',
            'password'  => '$setting->sms_password',
            'mobile'    => '2' . $phone,
            'otp'       => $code,
            'verify' => true
        ]);
        $res = $response->json();
        Log::error($res);
        if ($res['type'] == 'error') {
            return 0;
        } else {
            return 1;
        }
    }
}
function deleteimage($folder, $image)
{
    $file = public_path() . '/asset/images/' . $folder . '/' . $image;
    $img = File::delete($file);
}
function uploadbase64images($folder, $image)
{
    $path = public_path() . '/asset/images2/' . $folder;
    if (!File::exists($path)) {
        mkdir($path, 0777, true);
    }
    $image = $image;  // your base64 encoded
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = Str::random(10) . '.' . 'png';
    File::put($path . '/' . $imageName, base64_decode($image));
    return  $imageName;
}
function uploadimages($folder, $image)
{
    if($image == null){
        return null;
    }
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}
function uploadimagesdir( $image,$nameimg)
{
    $path = public_path() . '/asset/images/';
    if (!File::exists($path)) {
        mkdir($path, 0777, true);
    }
    // $image = $image;  // your base64 encoded
    // $image = str_replace('data:image/png;base64,', '', $image);
    // $image = str_replace(' ', '+', $image);
    // File::put($path . $nameimg ,base64_decode($image));
    // $imageName = time() . '_' . $request->image->getClientOriginalName();

    // Store the uploaded image using the 'public' disk
    $image->storeAs('public/asset/images', $nameimg);
dd($image);
    return  $nameimg;
}
function notificationFCM($title = null, $body = null, $users = null, $icon = null, $image = null, $link = null, $click = null, $sav = true)
{



    $SERVER_API_KEY = getsetting()->fire_servies;
    $data = [
        "registration_ids" => $users,
        "notification" => [
            "title" => $title,
            "body" => $body,
            // "icon" => 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg',
            "image" => $image,
            "fcm_options.link" => $link,
            "click_action" => $click,
        ],
        "actions" => [
            "title" => "Like",
            "action" => "like",
            "icon" => "icons/heart.png"
        ],
    ];
    $dataString = json_encode($data);
    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    $uu = null;
    if (count($users) == 1) {
        $uu = User::where('fsm', $users[0])->first();
    }
    if ($sav == true) {
        notification::create(['title' => $title, 'user_id' => $uu->id ?? $uu, 'body' => $body, 'image' => $image, 'results' =>   curl_exec($ch)]);
    }
    return  curl_exec($ch);
}
function replacetext($originalString, $user = null, $product = null, $cart = null, $statu = null)
{
    $replacements = [
        '{statu}'  => $statu ?? '',
        '{name}'  => $user->client_name ?? '',
        '{email}' => $user->email ?? '',
        '{oldprice}' => $product->productd_Sele1 ?? '',
        '{newprice}' => $product->productd_Sele2 ?? '',
        '{exp_date}' => $product->EndOferDate ?? '',
        '{product_name}' => $product->productheader->product_name ?? '',
    ];

    foreach ($replacements as $placeholder => $value) {
        $originalString = str_replace($placeholder, $value, $originalString);
    }

    return $originalString;
}
function getimage($imagename, $folder = null)
{


    $folder == 'images'?  $mainpath = 'asset/': $mainpath = 'asset/images/';

    if($folder == null ){ $setting = setting::find(1); return   $setting->urllogo;}

    $folder = $folder == '/' ? '' :  $folder .  '/'   ;

    $path       = public_path($mainpath . $folder   . $imagename);

    if (File::exists($path)) {
        return ($imagename !== null) ? asset($mainpath . $folder . $imagename) :   $setting = setting::find(1)->urllogo;
    } else {
        $setting = setting::find(1);
        return    $setting->urllogo;
    }
}
function splititem($item)
{
    $on = '';
    foreach (explode('->', $item) as $index => $fields) {
        $on =  $on .  $fields;
        if (count(explode('->', $item)) - 1 >  $index) {
            $on =  $on . "->";
        }
    };
    return $on;
}
function culcrating($count,$stars)
{

    if($count == 0){
        return "0";
    }else{
        return number_format($stars/$count,2);
    }

}
function normalize_name($name)
{
    $patterns     = array("/إ|أ|آ/", "/ة/", "/َ|ً|ُ|ِ|ٍ|ٌ|ّ/");
    $replacements = array("ا",  "ه", "");
    return preg_replace($patterns, $replacements, $name);
}
function generate_pattern($search_string) {
    $patterns     = array( "/(ا|إ|أ|آ)/", "/(ه|ة)/" );
    $replacements = array( "[ا|إ|أ|آ]", "[ه|ة]" );
    return preg_replace($patterns, $replacements, $search_string);
}
