<?php

namespace App\Imports;

use App\Models\Setting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SettingsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Setting([
            'valor' => $row['valor'],
            'nombre' => $row['nombre'],
            'status' =>$row['estado'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.valor' => [
                'required',
            ],
            '*.nombre' => 
            [
                'required',
            ],
            '*.estado' => 
            [
                'required',
            ],
        ];
    }
}
