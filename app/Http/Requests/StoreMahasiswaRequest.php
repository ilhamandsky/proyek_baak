<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'program_studi' => 'required|string',
            'fakultas' => 'required|string',
            'tahun_masuk' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ];

    }
}
