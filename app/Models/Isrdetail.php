<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isrdetail extends Model
{
    use HasFactory;
    protected $table = 'isrdetails';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'lim_inf',
        'lim_sup',
        'cuota',
        'excedente',
        'isr_id',
    ];
    public function isr()
    {
        return $this->belongsTo(Isr::class);
    }
}
