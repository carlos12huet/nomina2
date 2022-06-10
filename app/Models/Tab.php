<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    use HasFactory;
    protected $table = 'tabs';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'clave',
        'status',
        'sindicalizado',
    ];

    public function tabdetails()
    {
        return $this->hasMany(Tabdetail::class);
    }
}
