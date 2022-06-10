<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'clave',
        'nombre',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
    /** 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: function($value)
            {
                return strtoupper($value);
            }
        );
    }
}
