<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TabRequest extends FormRequest
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
            'status' => 'boolean',
            'sindicalizado' => 'boolean',
        ];
        if(($this->status == 1 and $this->sindicalizado == 0) or ($this->status == 1 and $this->sindicalizado == 1))
        {
            $rules = [
                'status' => 'boolean|unique:tabs',
            ];
        }
        return $rules;
    }
}
