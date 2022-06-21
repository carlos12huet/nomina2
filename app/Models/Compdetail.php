<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compdetail extends Model
{
    use HasFactory;
    protected $table = 'compdetails';
    protected $dateFormat = 'Y-m-d';
    protected $fillable= [
        'complement_id',
        'worker_id',
        'autorizacion',
        'status',
        'monto'
    ];

    public function complement()
    {
        return $this->belongsTo(Complement::class);
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
