<?php

namespace App\Http\Requests;

use App\Models\Worker;
use Illuminate\Foundation\Http\FormRequest;

class ContCreateRequest extends FormRequest
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
        $contract = $this->route()->parameter('contract');
        $rules = [
            'worker_id' => 'required',
            'regime_id' => 'required',
            'tax_id' => 'required',
            'workday_id' => 'required',
            'tcontract_id' => 'required',
            'project_id' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'municipality_id' => 'required',
            'period_id' => 'required',
            'observaciones' => 'nullable',
            'sindicalizado' => 'boolean',
            'status' => 'boolean',
        ];
        return $rules;
        
    }
}
