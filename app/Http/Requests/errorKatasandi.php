<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class errorKatasandi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
         $user = Auth::user();
        return [
    'password' => 'hash:' . $user->password,
    'new_password' => 'required|different:password|min:6',
    'password_confirmation'=>'same:new_password',   
        ];
    }

    public function messages()
    {
        return [
        'password.hash' => 'Kata sandi salah',
        'new_password.required' => 'Kata sandi baru harus diisi',
        'password_confirmation.required' => 'Konfirmasi kata sandi kosong',  
        'new_password.different' => 'Kata sandi baru sama dengan kata sandi lama',
         'new_password.min' => 'Kata sandi baru minimal 6 Karakter',
        'password_confirmation.same' => 'Konfirmasi kata sandi tidak cocok',
        ];
    }
}
