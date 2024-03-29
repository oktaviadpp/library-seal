<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
            'id_kategori'=>'required',
            'id_rak'=>'required',
            'title'=>'required|string',
            'pengarang'=>'required|string',
            'penerbit'=>'required|string',
            'tahun_terbit'=>'required|numeric',
            'desc',
            'image'=>'file|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
    public function messages()
    {
        return[
            'id_kategori'=>'Judul Harus diisi',
            'id_rak'=>'Judul Harus diisi',
            'title.required'=>'Judul Harus diisi',
            'pengarang.required'=>'Pengarang Harus diisi',
            'penerbit.required'=>'Penerbit Harus diisi',
            'tahun_terbit.required'=>'Tahun Terbit Harus diisi',
        ];
    }
}
