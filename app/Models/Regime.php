<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    use HasFactory;
    
    protected $table = 'regimes';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
