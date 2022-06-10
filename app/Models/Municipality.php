<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $table = 'municipalities';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
