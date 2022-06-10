<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayrollEditRequest extends FormRequest
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
        $payroll = $this->route('payroll');
        return [
            'clave' => ['required','unique:payrolls,clave,'.$payroll->id],
            'descripcion' => ['required','unique:payrolls,descripcion,'.$payroll->id],
            'tipo' => 'required|numeric|in:1,2,3,4,5',
        ];
    }
}
