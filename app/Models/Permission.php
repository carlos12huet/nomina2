<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'permiso',
        'descripcion'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
