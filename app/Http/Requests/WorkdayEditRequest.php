<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkdayEditRequest extends FormRequest
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
        $workday = $this->route('workday');
        return [
            'clave' => ['required','unique:workdays,clave,'.$workday->id],
            'nombre' => ['required','unique:workdays,nombre,'.$workday->id],
        ];
    }
}
