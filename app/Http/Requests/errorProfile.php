<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class errorProfile extends FormRequest
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
        'note' => 'max:150',
        'ortu' => 'max:50',
        'sekolah' => 'max:100',
        'kelas' => 'numeric|min:4|max:12',      
        ];
    }

    public function messages()
    {
        return [
        'note.max'    => 'catatan maksimal 150 karakter',
        'ortu.max'    => 'Nama Orang tua maksimal 50 karakter',
        'sekolah.max'    => 'Nama sekolah maksimal 100 karakter',
        'kelas.numeric'    => 'Kelas hanya berisi angka',
        'kelas.max'    => 'Kelas tidak valid',
        'kelas.min'    => 'Kelas tidak valid',
        ];
    }
}
