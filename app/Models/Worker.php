<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'paterno',
        'materno',
        'nombre',
        'rfc',
        'curp',
        'nss',
        'nombres',
        'correo',
        'status',
    ];
    protected function nombre():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function paterno():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function materno():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtoupper($value)
        );
    }
    protected function nombres():Attribute
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
        return $this->hasMany(Contract::class);
    }
    public function compdetails()
    {
        return $this->hasMany(Compdetail::class);
    }
    public function infonacots()
    {
        return $this->hasMany(Infonacot::class);
    }
    public function pensions()
    {
        return $this->hasMany(Pension::class);
    }
}
