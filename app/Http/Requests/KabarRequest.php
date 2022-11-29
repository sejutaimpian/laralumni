<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KabarRequest extends FormRequest
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
            'idakun' => 'required|numeric',
            'judul' => 'required|min:3',
            'isi' => 'required',
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
