<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabdetail extends Model
{
    use HasFactory;
    protected $table = 'tabdetails';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'tab_id',
        'position_id',
        'sueldo_diario',
        'sueldo_mensual',
    ];
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function tab()
    {
        return $this->belongsTo(Tab::class);
    }
}
