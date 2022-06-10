<?php

namespace App\Imports;

use App\Models\Satperception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SatperceptionsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Satperception([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:satperceptions'
            ]
        ];
    }
}
