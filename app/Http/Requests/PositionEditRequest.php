<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionEditRequest extends FormRequest
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
        $position = $this->route('position');
        return [
            'clave' => ['required','unique:positions,clave,'.$position->id],
            'nombre' => ['required','unique:positions,nombre,'.$position->id],
        ];
    }
}
