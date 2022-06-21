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
            'paterno' => $row['paterno'],
            'materno' => $row['materno'],
            'nombre_completo' => $row['nombre_completo'],
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
            '*.paterno' => [
                'required',
                'unique:workers'
            ],
            '*.materno' => [
                'required',
                'unique:workers'
            ],
            '*.nombre_completo' => [
                'required',
                'unique:workers'
            ],
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
