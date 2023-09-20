<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone'      => 'required|unique:users',
            'user_name'  => '',
            'password'   => 'required',
            'store_name' => '',
            'phone1'     => '',
            'lat'        => '',
            'long'       => '',
            'img1'       => '',
            'logo'       => '',
            'img2'       => '',
            'region'     => '',
            'address'    => '',
            'balance'    => '',
            'question1_id' => 'required',
            'question2_id' => 'required',
            'answer1'      => 'required',
            'answer2'      => 'required'
        ];

        // switch ($this->method()) {
        //     case 'GET':
        //     case 'DELETE':{
        //             return [];
        //         }
        //     case 'POST':{
        //             return [
        //                 'name'=> 'unique:users'
        //             ];
        //         }
        //     case 'PUT':{
        //             return [
        //                 'title' => 'string|unique:posts|required',
        //                 'body'  => 'required',
        //                 'image' => 'string|nullable',

        //             ];
        //         }
        // }
    }
    public function messages()
    {
        return [
            'user_name.required'      => 'الاسم مطلوب',
            'phone.unique'  => 'رقم الهاتف مسجل مسبقا',

        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(Resp($validator->errors(), 'Error', 200, false));
        // throw new HttpResponseException(Resp($validator->errors(),'', 422));

    }
}
