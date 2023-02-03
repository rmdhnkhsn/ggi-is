<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class pj_kk extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'pj_kk';
    protected $primaryKey = 'no_kontrak';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kategori_subkon',
        'no_kontrak',
        'sub_no_kontrak',
        'no_skep',
        'no_bpj',
        'supplier',
        'supplier_code',
        'supplier_branch',
        'no_bound',
        'tarik_cb',
        'bc_262',
        'jenis_pekerjaan',
        'nilai_jaminan',
        'npwp',
        'npwp_supplier',
        'no_tpb',
        'tgl_persetujuan',
        'tgl_bpj',
        'tgl_kontrak',
        'jatuh_tempo',
        'tgl_cb',
        'premi',
        'jde',
        'amount',
        'pengusaha_tpb',
        'ket',
        'file_jaminan',
        'file_barang',
        'branch',
        'nama',
        'nik',
        'status_kontrak',
        'kurs',
        'izintpb',
        'id_branch',
        'kode_branch',
        'branchdetail',

    ];
    public function Supplier()
    {
        return $this->BelongsTo('App\ListBuyer','supplier_code','F0101_AN8');
    }
    public function SupplierAddress()
    {
        return $this->belongsTo('App\AddressBook','supplier_code','F0101_AN8');
    }

    public function Material()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\material','id_no_kontrak');
    }
    public function Barang_Jadi()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\BarangJadi','id_no_kontrak');
    }

    public function partial()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\Bc261','id_no_kontrak');
    }

    public function pemasukan()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\Bc262','id_no_kontrak');
    }

    public function dok_261()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\dokumen261','id_no_kontrak');
    }

    public function dok_262()
    {
        return $this->hasMany('App\Models\Mat_Doc\Subkon\dokumen262','id_no_kontrak');
    }
}
