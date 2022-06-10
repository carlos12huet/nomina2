<?php

namespace App\Imports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PositionsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Position([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:positions'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:positions'
            ],
        ];
    }
}
