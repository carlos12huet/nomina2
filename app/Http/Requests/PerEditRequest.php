<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerEditRequest extends FormRequest
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
        $perception = $this->route('perception');
        return [
            'clave' => ['required','unique:perceptions,clave,'.$perception->id],
            'nombre' => 'required',
            'satperception_id' => 'nullable',
        ];
    }
}
