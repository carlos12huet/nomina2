<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infonacot extends Model
{
    use HasFactory;
    protected $table = 'infonacot';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'status'
    ];
}
