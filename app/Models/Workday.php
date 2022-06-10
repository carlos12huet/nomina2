<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;
    protected $table = 'workdays';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'clave',
        'nombre',
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
    
}
