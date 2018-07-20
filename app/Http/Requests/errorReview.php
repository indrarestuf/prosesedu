<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class errorReview extends FormRequest
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
        return [
        'review' => 'max:150|required',     
        ];
    }

    public function messages()
    {
        return [
        'review.max'    => 'kalimat maksimal 150 karakter',
        'review.required'    => 'Review harus diisi',
        ];
    }
}
