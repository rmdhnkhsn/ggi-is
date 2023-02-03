
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">KATEGORI SUBKON</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BISNIS UNIT</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO KONTRAK KERJA</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NAMA SUPLIER</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NPWP PENGUSAHA</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NPWP SUPLIER</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">AWAL KONTRAK</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TGL JATUH TEMPO</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">JENIS PEKERJAAN</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NILAI JAMINAN (Rp)</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">KURS USD</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NO SKEP</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TANGGAL SKEP</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">NO BPJ</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TANGGAL EBPJ</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO COSTOMS BOND</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TGL COSTOMS BOND</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BRANCH MAKLOON</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PREMI</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STATUS</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">TARIK CB ASLI</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">KET</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NIK PIC</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NAMA PIC</td>
              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value['kategori_subkon']}}</td>
                <td >{{$value['branch']}}</td>
                <td >{{$value['sub_no_kontrak']}}</td>
                <td >{{$value['supplier']}}</td>
                <td >{{$value['npwp']}}</td>
                <td >{{$value['npwp_supplier_jde']}}</td>
                <td >{{$value['tgl_kontrak']}}</td>
                <td >{{$value['jatuh_tempo']}}</td>
                <td >{{$value['jenis_pekerjaan']}}</td>
                <td >{{$value['nilai_jaminan']}}</td>
                <td >{{$value['kurs']}}</td>
                <td >{{$value['no_skep']}}</td>
                <td >{{$value['tgl_persetujuan']}}</td>
                <td >{{$value['no_bpj']}}</td>
                <td >{{$value['tgl_bpj']}}</td>
                <td >{{$value['no_bound']}}</td>
                <td >{{$value['tgl_cb']}}</td>
                <td >{{$value['branchdetail']}}</td>
                <td >{{$value['premi']}}</td>
                <?php
                // dd($value->pemasukan->count());
                  if($value['status_kontrak']=='Close'){
                    $status_kontrak='Close';
                  }
                  else{
                    if(($value['balance261']=='0')&&($value['balance']=='0')&&($value['status']=='1')&&($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null)){
                      $status_kontrak='Rekomendasi Close';
                    }
                    elseif(($value['status']==1) && ($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null)){
                      $status_kontrak='Berjalan';
                    }
                    elseif($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null){
                      $status_kontrak='legalitas';
                    }
                    else{
                      $status_kontrak='Pengajuan';
                    }
                  }
                ?>
                <td >{{$status_kontrak}}</td>
                <td >{{$value['tarik_cb']}}</td>
                <td >{{$value['ket']}}</td>
                <td >{{$value['nik']}}</td>
                <td >{{$value['nama']}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


