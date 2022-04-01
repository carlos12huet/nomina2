<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $fillable = [
        'rfc',
        'curp',
        'nss',
        'nombre',
        'correo',
        'status',
    ];
    protected function nombre():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function rfc():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function nss():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function curp():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function correo():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtolower($value)
        );
    }
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
