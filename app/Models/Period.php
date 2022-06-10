<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = 'periods';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
        'created_at',
        'updated_at',
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
