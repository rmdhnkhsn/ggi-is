<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class PlannerBranch extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'planner_branch';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'nama',
        'branch_id',
        'created_at',
        'updated_at'
    ];

    public function originator()
    {
        return $this->belongsTo('App\User', 'nik', 'nik');
    }
}
