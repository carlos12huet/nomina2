<?php

namespace App\Imports;

use App\Models\Subdetail;
use App\Models\Subsidy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubdetailsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $subsidies;
    
    public function __construct()
    {
        $this->subsidies = Subsidy::pluck('id','clave');
    }

    public function model(array $row)
    {
        return new Subdetail([
        'desde' => $row['desde'],
        'hasta' => $row['hasta'],
        'cantidad' => $row['cantidad'],
        'subsidy_id' => $this->subsidies[$row['clave']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required'
            ]
        ];
    }
}
