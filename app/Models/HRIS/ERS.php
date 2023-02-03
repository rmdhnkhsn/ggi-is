<?php

namespace App\Models\HRIS;

use Illuminate\Database\Eloquent\Model;

class ERS extends Model
{
    protected $connection = 'mysql_hris';
    protected $table = 'ers';
    protected $primaryKey = 'ers_id';
    public const KODE_MODUL = 'M_PTEK';


    protected $fillable = [
        'modul',
        'nikoriginator',
        'tglinput',
        'tglrequest',
        'tglaktual',
        'string1', // departemen
        'string2', // level jabatan
        'string3', // jumlah tk
        'string4', // bagian
        'string5', // status karyawan
        'num1', // usia
        'num2',
        'num3',
        'num4',
        'num5',
        'note1', // nama_permintaan
        'note2', // alasan
        'note3', // Nama yang digantikan
        'note4', // urain singkat
        'note5', // pendidikan
        'note6', // Fakultas / jurusan 
        'note7', // Pengalaman
        'note8', // keterampilan
        'note9', // kepribadian
        'date1', // dipekerjakan tanggal
        'date2',
        'date3',
        'date4',
        'date5',
        'isapproval', // 1
        'nik1', // approver 1
        'nik2', // approver 2
        'nik3', // approver 3
        'nik4',
        'nik5',
        'approve1',
        'approve2',
        'approve3',
        'approve4',
        'approve5',
        'current_approve',
        'total_approve',
        'isdisapprove'
    ];

    public function ers_vacancy()
    {
        return $this->hasOne('App\Models\HR_GA\JobVacancy\ERSVacancy', 'ers_id');
    }

    public function ers_applicant()
    {
        return $this->hasMany('App\Models\HR_GA\JobVacancy\ERSApplicant', 'ers_id');
    }
}
