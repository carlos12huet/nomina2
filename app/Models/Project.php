<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class);
    }
}
