<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriDusunStoreRequest extends FormRequest
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
            'dusun_id' => ['required', 'exists:dusuns,id'],
            'nama_foto' => ['required', 'max:255', 'string'],
            'foto' => ['image', 'max:1024', 'required'],
        ];
    }
}
