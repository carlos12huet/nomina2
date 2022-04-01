<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre'
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
    public function departments()
    {
        return $this->belongsToMany('App\Models\Department');
    }
    public function tabdetails()
    {
        return $this->hasMany('App\Models\Tabdetail');
    }
}
