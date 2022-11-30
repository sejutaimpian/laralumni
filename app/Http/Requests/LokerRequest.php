<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LokerRequest extends FormRequest
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
            'logo_perusahaan' => 'image|file|max:2048|nullable',
            'pekerjaan' => 'required|string|min:3',
            'nama_perusahaan' => 'required|string|min:3',
            'penempatan' => 'required|string|min:3',
            'gaji' => 'required|string|min:3',
            'pendidikan' => 'required|string|min:3',
            'usia' => 'required|string|min:3',
            'kualifikasi' => 'required|string|min:3',
            'sumber' => 'required|url',
            'deadline' => 'required|date',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            session()->flash('peringatan', 'Data gagal didaftarkan dikarenakan ada penginputan yang tidak sesuai. silakan coba lagi!');
        });
    }
}
