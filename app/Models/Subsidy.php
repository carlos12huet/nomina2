<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidy extends Model
{
    use HasFactory;
    protected $table = 'subsidies';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'tipo',
        'status'
    ];
    public function subdetails()
    {
        return $this->hasMany(Subdetail::class);
    }
}
