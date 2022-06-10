<?php

namespace App\Imports;

use App\Models\Period;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PeriodsImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Period([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
            'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['creado']),
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:periods'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:periods'
            ],
        ];
    }
}
