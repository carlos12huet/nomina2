<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sihae extends Model
{
    use HasFactory;
    protected $table = 'sihaes';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function deductions()
    {
        return $this->belongsToMany(Deduction::class);
        //return $this->morphedByMany(Deduction::class,'sihaeable');
    }
    public function perceptions()
    {
        return $this->belongsToMany(Perception::class);
        //return $this->morphedByMany(Perception::class,'sihaeable');
    }
}
