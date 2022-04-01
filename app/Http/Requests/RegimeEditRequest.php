<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegimeEditRequest extends FormRequest
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
        $regime = $this->route('regime');
        return [
            'clave' => ['required','unique:regimes,clave,'.$regime->id],
            'nombre' => ['required','unique:regimes,nombre,'.$regime->id],
        ];
    }
}
