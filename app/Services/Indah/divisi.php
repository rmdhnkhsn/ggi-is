<?php

namespace App\Services\Indah;
use Auth;
use App\IndahDivisi;

class divisi{
  public function data_temuan($datax)
  {
    $user_login = Auth::user("nik")->nik;
    //dd($user_login);
    $data = [];
   //dd($data_tiket);
    foreach ($datax as $key => $value) {
      // dd($value->nik_kabag);
        if(($value->nik_kabag == $user_login) OR ($value->nik_manager == $user_login)){
        $data[] = [
            'id' => $value->id,
            'nik_kabag' => $value->nik_kabag,
            'nama_kabag' => $value->nama_kabag,
            'bagian' => $value->bagian, 
            'foto' => $value->foto,
            'deskripsi' => $value->deskripsi,
            'status_indah' => $value->status_indah,
            'tgl_tegur' => $value->tgl_tegur,
            'tgl_janji' => $value->tgl_janji,
            'foto_sesudah' => $value->foto_sesudah, 
            'pesan_kabag' => $value->pesan_kabag,
            'nama_satgas' => $value->nama_satgas,
            
            ];
        }
    }
    return $data;
  }

  public function no()
  {
    $tgl=date('ymd');
    $tiket = IndahDivisi::where('id','LIKE',$tgl."%")
    ->max('id');;
    $table_no=substr($tiket,7,3);
    $tgl = date("ymd");  
    $no= $tgl.$table_no;
    $auto=substr($no,7);
    $auto=intval($auto)+1;
    $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;

    return $auto_number;
  }
  public function store($kabag,$manager,$request,$fileName)
  // public function store($auto_number,$kabag,$manager,$request,$fileName)       
  {
    $data=[
          // 'id'            => $auto_number,
          'id'            => $request->id,
          'nik_kabag'     => $kabag->nik,
          'nama_kabag'    => $kabag->nama,
          'email_kabag'   => $kabag->email,
          'nik_manager'   => $manager->nik,
          'nama_manager'  => $manager->nama,
          'email_manager' => $manager->email,
          'bagian'        => $kabag->departemensubsub,
          'deskripsi'     => $request->deskripsi,
          'branch'        => $kabag->branch,
          'branchdetail'  => $kabag->branchdetail,
          'status_indah'  => $request->status_indah,
          'nik_satgas'    => $request->nik_satgas,
          'nama_satgas'   => $request->nama_satgas,
          'tgl_tegur'     => $request->tgl_tegur,
          'foto'          => $fileName
      ];
  return $data;
  }
}
    
    