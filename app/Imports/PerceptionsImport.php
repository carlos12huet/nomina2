<?php

namespace App\Imports;
use App\Models\Perception;
use App\Models\Satperception;
use App\Models\Sihae;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PerceptionsImport implements ToCollection,WithHeadingRow, WithValidation
{
    private $sat;
    private $sihae;
    
    public function __construct()
    {
        $this->sat = Satperception::pluck('id','clave');
        $this->sihae = Sihae::select('id','clave')->get();
    }

    public function collection(Collection $rows)
    {
        
        
        foreach($rows as $row)
        {
            $perception = Perception::create([
                'clave' => $row['clave'],
                'nombre' => $row['nombre'],
                'satperception_id' => $this->sat[$row['sat']] ?? null,
            ]);
            $sihaea = $this->sihae->where('clave',$row['sihae'])->first();
            if($row['sihae'] == null)
            {
                continue;
            }elseif($row['sihae'] != null)
            {
                $perception->sihaes()->attach([
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
                'unique:perceptions',
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
