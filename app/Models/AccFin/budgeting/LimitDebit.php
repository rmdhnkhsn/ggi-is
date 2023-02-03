<?php

namespace App\Models\AccFin\budgeting;

use Illuminate\Database\Eloquent\Model;

class LimitDebit extends Model
{
    protected $connection = 'mysql_block_budget';
    protected $table = 'limit_budget';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'account',
        'deskripsi',
        'tahun',
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
        'branchh',
        'created_by',
        'updated_by',
    ];
    }