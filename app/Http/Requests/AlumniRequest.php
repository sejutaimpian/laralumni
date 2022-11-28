<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AlumniRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nisn' => 'required|numeric',
            'nama' => 'required|string|min:3',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'ortu_wali' => 'required|string|min:3',
            'id_jurusan' => 'required|numeric',
            'tahun_masuk' => 'required|integer|digits:4',
            'status' => ['required', Rule::in(['LULUS', 'BELUM LULUS', 'PINDAH SEKOLAH', 'DIKELUARKAN'])],
            'tahun_keluar' => 'required|integer|digits:4',
            'foto' => 'image|file|max:2048|nullable'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            session()->flash('peringatan', 'Data gagal didaftarkan dikarenakan ada penginputan yang tidak sesuai. silakan coba lagi!');
        });
    }
}
