<?php

namespace App\Imports;

use App\Models\Workday;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WorkdaysImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Workday([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:workdays'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:workdays'
            ],
        ];
    }
}
