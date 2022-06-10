<?php

namespace App\Imports;

use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MunicipalitiesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Municipality([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],       
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:municipalities'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:municipalities'
            ],
        ];
    }
}
