<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
    protected $table = 'complements';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'status'
    ];
}
