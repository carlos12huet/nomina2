<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerCreateRequest extends FormRequest
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
        return [
            'rfc' => 'required|unique:workers|max:13|min:13',
            'nss' => 'required|unique:workers|max:11|min:11',
            'curp' => 'required|unique:workers|max:18|min:18',
            'nombre' => 'required|unique:workers',
            'correo' => 'nullable|unique:workers',
            'status' => 'boolean',
        ];
    }
}
