<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isr extends Model
{
    use HasFactory;
    protected $table = 'isr';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'status'
    ];
    public function isrdetails()
    {
        return $this->hasMany(Isrdetail::class);
    }
}
