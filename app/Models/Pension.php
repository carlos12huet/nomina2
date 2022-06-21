<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;
    protected $table = 'pensions';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'worker_id',
        'porcentaje',
        'status'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
