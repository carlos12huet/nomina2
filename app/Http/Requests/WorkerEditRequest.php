<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerEditRequest extends FormRequest
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
        $worker = $this->route('worker');
        return [
            'paterno' => 'required',
            'materno' => 'required',
            'nombre_completo' => 'required',
            'rfc' => ['required','max:13','min:13','unique:workers,rfc,'.$worker->id],
            'nss' => ['required','max:11','min:11','unique:workers,nss,'.$worker->id],
            'curp' => ['required','max:18','min:18','unique:workers,curp,'.$worker->id],
            'nombre' => ['required','unique:workers,nombre,'.$worker->id],
            'correo' => ['nullable','unique:workers,correo,'.$worker->id],
            'status' => ['boolean'],
        ];
    }
}