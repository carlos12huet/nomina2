<?php

namespace App\Imports;

use App\Models\Isr;
use App\Models\Isrdetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class IsrdetailsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    private $isrclave;
    
    public function __construct()
    {
        $this->isrclave = Isr::pluck('id','clave');
    }

    public function model(array $row)
    {
        return new Isrdetail([
            'lim_inf'   =>  $row['inferior'],
            'lim_sup'   =>  $row['superior'],
            'cuota'     =>  $row['cuota'],
            'excedente' =>  $row['excedente'],
            'isr_id'    =>  $this->isrclave[$row['id']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.id' => [
                'required'
            ]
        ];
    }
}
