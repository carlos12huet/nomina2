<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidieEditRequest extends FormRequest
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
        $subsidy = $this->route('subsidy');
        $rules = [
            'clave' => ['required','unique:subsidies,clave,'.$subsidy->id],
            'descripcion' => ['required','unique:subsidies,descripcion,'.$subsidy->id],
            'status' => 'boolean',
        ];
        if($this->status == 1)
        {
            $rules = [
                'status' => 'boolean|unique:subsidies,status,'.$subsidy->id,
            ];
        }
        return $rules;
    }
}
