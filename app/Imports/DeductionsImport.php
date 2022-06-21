<?php

namespace App\Imports;
use App\Models\Deduction;
use App\Models\Satdeduction;
use App\Models\Sihae;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DeductionsImport implements ToCollection, WithHeadingRow, WithValidation
{
    private $sat;
    private $sihae;
    
    public function __construct()
    {
        $this->sat = Satdeduction::pluck('id','clave');
        $this->sihae = Sihae::select('id','clave')->get();
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $deduction = Deduction::create([
                    'clave' => $row['clave'],
                    'nombre' => $row['nombre'],
                    'satdeduction_id' => $this->sat[$row['sat']] ?? null,
                ]);
            $sihaea = $this->sihae->where('clave',$row['sihae'])->first();
            if($row['sihae'] == null)
            {
                continue;
            }elseif($row['sihae'] != null)
            {
                $deduction->sihaes()->attach([
                    'sihae_id' => $sihaea->id
                ]);
            }
            
        }
    }

    public function rules(): array
    {
        return [
            '*.clave' => [
                'required',
                'unique:deductions',
                'nullable'
            ],
            '*.sat' => [
                'nullable'
            ],
            '*.sihae' => [
                'nullable'
            ],
            '*.tipo' => ['required',
            'numeric',
            'in:1,2,3,4,5,6'
            ],
        ];
    }
}
