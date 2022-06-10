<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProjectsImport implements ToModel,WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:projects'
            ],
            '*.nombre' => 
            [
                'required',
                'unique:projects'
            ],
        ];
    }
}
