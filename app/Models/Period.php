<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = 'periods';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
