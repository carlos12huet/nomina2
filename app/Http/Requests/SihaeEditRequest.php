<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SihaeEditRequest extends FormRequest
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
        $sihae = $this->route('sihae');
        return [
            'clave' => ['required','unique:sihaes,clave,'.$sihae->id],
            'nombre' => ['required','unique:sihaes,nombre,'.$sihae->id],
        ];
    }
}
