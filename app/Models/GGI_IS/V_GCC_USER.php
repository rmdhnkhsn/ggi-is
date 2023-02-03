<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class V_GCC_USER extends Model
{
    use Uuids;
    protected $connection = 'mysql_hris';
    protected $table = 'v_gcc_users';
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'departemen',
        'departemensub',
        'departemensubsub',
        'jabatan',
        'branch',
        'branchdetail',
        'email',
        'password',
        'isresign',
        'isaktif',
        'role',
        'comcen'

    ];
    
    protected $hidden = [
        'password',
    ];

    public function data_gapok()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\KodeKerjaKaryawan','nik');
    }

    public function test_probation()
    {
        return $this->hasMany('App\Models\HR_GA\JobOrientationTest\JobsTest','nik');
    }

    public function monitoring_covid()
    {
        return $this->hasMany('App\Models\MoreProgram\WeeklyQuestion', 'nik');
    }

    public function smqc()
    {
        return $this->hasMany('App\Models\QC\SMQC\UserManagement', 'nik');
    }
}