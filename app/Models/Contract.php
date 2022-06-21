<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $dateFormat = 'Y-m-d';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function incapacities()
    {
        return $this->hasMany(Incapacity::class);
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
    public function regime()
    {
        return $this->belongsTo(Regime::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public function workday()
    {
        return $this->belongsTo(Workday::class);
    }
    public function tcontract()
    {
        return $this->belongsTo(Tcontract::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function deductions()
    {
        return $this->belongsToMany(Deduction::class);
        //return $this->morphedByMany(Deduction::class,'contractable');
    }
    public function perceptions()
    {
        return $this->belongsToMany(Perception::class);
        //return $this->morphedByMany(Perception::class,'contractable');
    }
    public function paydetails()
    {
        return $this->hasMany(Paydetail::class);
    }
}
