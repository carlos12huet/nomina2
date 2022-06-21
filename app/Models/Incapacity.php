<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacity extends Model
{
    use HasFactory;
    protected $table = 'incapacities';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'contract_id',
        'fecha_inicio',
        'fecha_final'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
