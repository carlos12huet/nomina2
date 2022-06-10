<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paydetail extends Model
{
    use HasFactory;
    protected $table = 'paydetails';
    protected $dateFormat = 'Y-m-d';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function perceptions()
    {
        return $this->belongsToMany(Perception::class)->withPivot('monto','perception_id');
        //return $this->morphedByMany(Perception::class,'paydetailable');
    }

    public function deductions()
    {
        return $this->belongsToMany(Deduction::class)->withPivot('monto','deduction_id');;
        //return $this->morphedByMany(Deduction::class,'paydetailable');
    }
}
