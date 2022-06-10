<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class isrCreateRequest extends FormRequest
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
            'clave' => 'required|unique:isr',
            'descripcion' => 'required|unique:isr',
            'status' => 'boolean',
        ];
        if($this->status == 1)
        {
            $rules = [
                'status' => 'boolean|unique:isr',
            ];
        }
        return $rules;
    }
}
