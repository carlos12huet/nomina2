<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satperception extends Model
{
    use HasFactory;
    protected $table = 'satperceptions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function perceptions()
    {
        return $this->hasMany(Perception::class);
    }
}
