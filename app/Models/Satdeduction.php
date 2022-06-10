<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satdeduction extends Model
{
    use HasFactory;
    protected $table = 'satdeductions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
}
