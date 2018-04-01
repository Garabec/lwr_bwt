<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request  $request)
    {
         $array_validate=[
                  'name' => 'required|max:255',
                  'email' => 'required|email|max:255|unique:users',
                  'role'=>'required',
                  'password'=>'required|min:6|confirmed'
            ];
        
      
        
        return $array_validate;
    }
}
