<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidieRequest extends FormRequest
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
        $rules = [
            'clave' => ['required','unique:subsidies'],
            'descripcion' => ['required','unique:subsidies'],
            'status' => 'boolean',
            'tipo' => 'boolean'
        ];
        if($this->status == 1)
        {
            $rules = [
                'status' => 'boolean|unique:subsidies',
            ];
        }
        return $rules;
    }
}
