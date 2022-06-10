<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'rol',
        'descripcion'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
