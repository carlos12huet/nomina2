<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipalityEditRequest extends FormRequest
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
        $municipality = $this->route('municipality');
        return [
            'clave' => ['required','unique:municipalities,clave,'.$municipality->id],
            'nombre' => ['required','unique:municipalities,nombre,'.$municipality->id],
        ];
    }
}
