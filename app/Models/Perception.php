<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perception extends Model
{
    use HasFactory;
    protected $table = 'perceptions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
        'satperception_id',
        'tipo'
    ];

    public function satperception()
    {
        return $this->belongsTo(Satperception::class);
    }
    public function sihaes()
    {
        return $this->belongsToMany(Sihae::class);
    }
    public function contracts()
    {
        return $this->belongsToMany(Contract::class);
    }
    public function paydetails()
    {
        return $this->belongsToMany(Paydetail::class);
    }
}
