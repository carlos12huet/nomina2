<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    protected $table = 'deductions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
        'satdeduction_id',
    ];

    public function satdeduction()
    {
        return $this->belongsTo(Satdeduction::class);
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
