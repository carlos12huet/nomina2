<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tcontract extends Model
{
    use HasFactory;
    protected $table = 'tcontracts';
    protected $fillable = [
        'clave',
        'nombre',
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
