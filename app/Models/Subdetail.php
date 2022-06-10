<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdetail extends Model
{
    use HasFactory;
    protected $table = 'subdetails';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'desde',
        'hasta',
        'cantidad',
        'subsidy_id',
    ];
    public function subsidy()
    {
        return $this->belongsTo(Subsidy::class);
    }
}
