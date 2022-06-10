<?php

namespace App\Imports;

use App\Models\Tcontract;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TcontractsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tcontract([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:tcontracts'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:tcontracts'
            ],
        ];
    }
}
