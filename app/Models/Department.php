<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
        'project_id',
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
    /** 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
