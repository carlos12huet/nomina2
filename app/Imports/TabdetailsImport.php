<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\Tab;
use App\Models\Tabdetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TabdetailsImport implements ToModel, WithHeadingRow, WithValidation
{
    private $puesto;
    private $tab;
    
    public function __construct()
    {
        $this->puesto = Position::pluck('id','clave');
        $this->tab = Tab::pluck('id','clave');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tabdetail([
            'tab_id' => $this->tab[$row['tabulador']],
            'position_id' => $this->puesto[$row['puesto']],
            'zona_economica' => $row['zona_economica'],
            'compensacion' => $row['compensacion'],
            'sueldo_diario' => $row['diario'] ?? $row['sueldo_diario'],
            'sueldo_mensual' => $row['mensual'] ?? $row['sueldo_mensual'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.tabulador' => [
                'required'
            ],
            '*.puesto' => [
                'required'
            ],
            '*.zona_economica' => [
                'nullable'
            ],
            '*.compensacion' => [
                'nullable'
            ],
        ];
    }
}
