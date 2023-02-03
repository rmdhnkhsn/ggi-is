
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
      
        <table>
          <!-- head -->
          <tr>
            <td colspan="3">Nomor Kontrak Kerja</td>
            <td colspan="3">{{$data_kontrak->sub_no_kontrak}}</td>
            <td colspan="2"></td>
            <td colspan="3">Tanggal Surat Persetujuan - SKEP Date</td>
            <td colspan="3">{{$data_kontrak->tgl_persetujuan}}</td>
          </tr>
          <tr>
            <td colspan="3">Branch</td>
            <td colspan="3">{{$data_kontrak->branch}}</td>
            <td colspan="2"></td>
            <td colspan="3">Nilai Jaminan</td>
            <td colspan="3">Rp{{number_format($data_kontrak->nilai_jaminan, 2, "," , ".")}}</td>
          </tr>
          <tr>
            <td colspan="3">Tanggal Kontrak Kerja</td>
            <td colspan="3">{{$data_kontrak->tgl_kontrak}}</td>
            <td colspan="2"></td>
            <td colspan="3">Nomor Bukti Penerimaan Jaminan - BPJ</td>
            <td colspan="3">{{$data_kontrak->no_bpj}}</td>
          </tr>
          <tr>
            <td colspan="3">Jenis Pekerjaan</td>
            <td colspan="3">{{$data_kontrak->jenis_pekerjaan}}</td>
            <td colspan="2"></td>
            <td colspan="3">Tanggal Penerimaan Jaminan</td>
            <td colspan="3">{{$data_kontrak->tgl_bpj}}</td>
          </tr>
          <tr>
            <td colspan="3">Surat Persetujuan - SKEP</td>
            <td colspan="3">{{$data_kontrak->no_skep}}</td>
            <td colspan="2"></td>
            <td colspan="3">Tanggal Jatuh Tempo SUB Kontrak</td>
            <td colspan="3">{{$data_kontrak->jatuh_tempo}}</td>
          </tr>
          <tr></tr>
          <!-- body -->
          <tr>
            <th colspan="6"></th>
            @foreach($partial_group as $key1=>$value1)
            <th class="text-center">{{$value1['no_aju']}}</th>
            @endforeach
            <th colspan="2"></th>
          </tr>
          <tr>
            <th>No</th>
            <th>Item Code</th>
            <th>HS Code</th>
            <th>Description</th>
            <th>Qty Kontrak</th>
            <th>Satuan</th>
            @foreach($partial_group as $key2=>$value2)
            <th>{{$value2['tanggal']}}</th>
            @endforeach
            <th>BC261</th>
            <th>BC262</th>
            <th>Tersisa</th>
          </tr>
            @foreach($data_material as $key3=>$value3)
          <tr>
            <td>{{$key3+1}}</td>
            <td>{{$value3['item_number']}}</td>
            <td>{{$value3['hs_code']}}</td>
            <td>{{$value3['deskripsi']}}</td>
            <td>{{$value3['kebutuhan']}}</td>
            <td>{{$value3['satuan']}}</td>
            @foreach($partial_group as $key4=>$value4)
                <?php 
                    $data=collect($data_partial);
                    $cek_data = $data->where('id_material',$value3['id'])->where('no_aju',$value4['no_aju'])->count();
                    if ($cek_data != 0) {
                        $jumlah=$data->where('id_material',$value3['id'])->where('no_aju',$value4['no_aju'])->first();
                        $qty=$jumlah['qty'];
                    }
                    else{
                      $qty='-';
                    }
                ?>
            <td>{{$qty}}</td>
            @endforeach
            <td>{{$value3['jumlah_keluar']}}</td>
            <td>{{$value3['jumlah_pemasukan']}}</td>
            <td>{{$value3['tersisa']}}</td>
          </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


