<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infonavit extends Model
{
    use HasFactory;
    protected $table = 'infonavit';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'status'
    ];
}
