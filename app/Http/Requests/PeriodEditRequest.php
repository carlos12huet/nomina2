<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodEditRequest extends FormRequest
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
        $period = $this->route('period');
        return [
            'clave' => ['required','unique:periods,clave,'.$period->id],
            'nombre' => ['required','unique:periods,nombre,'.$period->id],
        ];
    }
}
