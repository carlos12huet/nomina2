<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table = 'payrolls';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'descripcion',
        'tipo',
    ];

    public function paydetails()
    {
        return $this->hasMany(Paydetail::class);
    }
}
