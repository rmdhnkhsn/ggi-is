<?php

namespace App\Models\AccFin\budgeting;

use Illuminate\Database\Eloquent\Model;

class PlanBudget extends Model
{
    protected $connection = 'mysql_block_budget';
    protected $table = 'plan_budget';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'tanggal',
        'no_account',
        'desc_account',
        'plan_budget',
        'branch',
        'id_buyer',
        'buyer',
        'explanation',
        'type',
        'kurs',
        'created_by',
        'updated_by',

    ];
    }