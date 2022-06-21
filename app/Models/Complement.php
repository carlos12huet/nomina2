<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
    protected $table = 'complements';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'tab_id',
        'descripcion',
        'status'
    ];

    public function compdetails()
    {
        return $this->hasMany(Compdetail::class);
    }

    public function tab()
    {
        return $this->belongsTo(Tab::class);
    }
}
