<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KenanganRequest extends FormRequest
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
            'nama_kenangan' => 'required|string|min:3',
            'pengelola' => 'required|string|min:3',
            'link' => 'required|url',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            session()->flash('peringatan', 'Data gagal didaftarkan dikarenakan ada penginputan yang tidak sesuai. silakan coba lagi!');
        });
    }
}
