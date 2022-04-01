<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxEditRequest extends FormRequest
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
        $tax = $this->route('tax');
        return [
            'clave' => ['required','unique:taxs,clave,'.$tax->id],
            'nombre' => ['required','unique:taxs,nombre,'.$tax->id],
        ];
    }
}
