<?php

namespace App\Models\AccFin\budgeting;

use Illuminate\Database\Eloquent\Model;

class AccountDebit extends Model
{
    protected $connection = 'mysql_block_budget';
    protected $table = 'account_debit';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'account',
        'deskripsi',
    ];
    }