<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class isrEditRequest extends FormRequest
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
        $isr = $this->route('isr');
        $rules = [
            'clave' => ['required','unique:isr,clave,'.$isr->id],
            'descripcion' => ['required','unique:isr,descripcion,'.$isr->id],
            'status' => 'boolean',
            'tipo' => 'boolean'
        ];
        if($this->status == 1)
        {
            $rules = [
                'status' => ['boolean','unique:isr,status,'.$isr->id],
            ];
        }
        return $rules;
    }
}
