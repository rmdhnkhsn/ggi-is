<?php


namespace App;

use App\MyTrait\TanggalIndo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mysql_hris';
    protected $table = 'v_gcc_users';
    protected $primaryKey = 'nik';
    public $incrementing = false;
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

    public static function getListStatusKaryawan(){
        return [
            '0' => 'Karyawan Aktif',
            '1' => 'Karyawan Resign'
        ];
    }

    public static function listcomcen(){
        return [
            'TRUE',
            'FALSE'
        ];
    }

    public static function getListResignKaryawan(){
        return [
            '0' => 'Karyawan Resign',
            '1' => 'Karyawan Aktif'
        ];
    }

}
