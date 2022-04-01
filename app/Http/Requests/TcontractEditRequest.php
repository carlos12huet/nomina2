<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TcontractEditRequest extends FormRequest
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
        $tcontract = $this->route('tcontract');
        return [
            'clave' => ['required','unique:tcontracts,clave,'.$tcontract->id],
            'nombre' => ['required','unique:tcontracts,nombre,'.$tcontract->id],
        ];
    }
}
