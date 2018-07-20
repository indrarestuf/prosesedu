<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class errorLaporan extends FormRequest
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
        'isi' => 'required|max:255',
        'mapel' => 'required|max:50',
        'nilai_afektif' => 'required|max:3',
        'nilai_kognitif' => 'required|numeric|min:0|max:100',      
        ];
    }

    public function messages()
    {
        return [
        'isi.required'    => 'Catatan harus diisi',
        'mapel.required'    => 'Mata Pelajaran harus diisi',
        'mapel.max'    => 'Mata Pelajaran maksimal 50 karakter',
        'nilai_afektif.required'    => 'Nilai Afektif harus diisi',
        'nilai_kognitif.required'    => 'Nilai Kognitif harus diisi',
        'isi.max'    => 'Catatan harus kurang dari 255 karakter',
        'nilai_kognitif.max'    => 'Nilai Kognitif maksimal 3 digit',
        'nilai_afektif.max'    => 'Nilai Kognitif maksimal 100',
        'nilai_afektif.min'    => 'Nilai Kognitif minimal 0',
        'nilai_kognitif.numeric'    => 'Nilai Kognitif berisi angka',
        ];
    }
}
