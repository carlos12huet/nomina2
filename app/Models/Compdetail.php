<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compdetail extends Model
{
    use HasFactory;
    protected $table = 'compdetails';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'status'
    ];
}
