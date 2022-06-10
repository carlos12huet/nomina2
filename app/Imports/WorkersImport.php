<?php

namespace App\Imports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WorkersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct()
    {
       
    }

    public function model(array $row)
    {
        return new Worker([
            'rfc' => $row['rfc'],
            'nombre' => $row['nombre'],
            'curp' => $row['curp'],
            'correo' => $row['correo'],
            'nss' => $row['nss'],
            'status' => $row['estado'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.rfc' => [
                'required',
                'unique:workers'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:workers'
            ],
            '*.curp' => 
            [
                'required',
                'unique:workers'
            ],
            '*.nss' => 
            [
                'required',
                'unique:workers'
            ],
            '*.correo' => 
            [
                'nullable',
                'unique:workers'
            ],
        ];
    }
}
