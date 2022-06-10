<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DepartmentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        return new Department([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:departments'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:departments'
            ],
        ];
    }
}
