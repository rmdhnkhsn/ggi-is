
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
    <table style="width:1300px">
          <tr>
            <th colspan="14" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">LEMBAR REALISASI</th>
          </tr>
          <tr>
            <th colspan="14" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PELAKSANAAN PENGELUARAN BARANG DARI TPB KE TLDDP DENGAN JAMINAN DAN PEMASUKAN KEMBALI</th>
          </tr>
          <tr>
            <th colspan="14"></th>
          </tr>

          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">NPWP</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">:{{$data_kontrak->npwp}} </th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">PENGUSAHA TPB</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">:{{$data_kontrak->pengusaha_tpb}} </th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">NOMOR SURAT IJIN TPB</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">: {{$data_kontrak->izintpb}}</th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">NOMOR DAN TANGGAL SURAT PERSETUJUAN</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">: {{$data_kontrak->no_skep}} TANGGAL {{$data_kontrak->tgl_persetujuan}}</th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">NO KONTRAK KERJA</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">:{{$data_kontrak->sub_no_kontrak}} </th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">TANGGAL JATUH TEMPO</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">: {{$data_kontrak->jatuh_tempo}}</th>
          </tr>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:200px;">NOMOR BUKTI PENERIMAAN JAMINAN</th>
              <th colspan="10" style="font-weight:bold;text-align:left;width:200px;">: {{$data_kontrak->no_bpj}}</th>
          </tr>
          <tr >
            <th colspan="14"></th>
          </tr>
            <tr>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:30px;background-color:#C0C0C0;">NO</td>
                <td colspan="2" style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BC 2.6.1</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SKU</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:300px;background-color:#C0C0C0;">JENIS BARANG</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:80px;background-color:#C0C0C0;">JUMLAH</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:80px;background-color:#C0C0C0;">SATUAN</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:80px;background-color:#C0C0C0;">Nilai Jaminan</td>


                <td rowspan="2" style="font-weight:bold;text-align:center;width:30px;background-color:#C0C0C0;">NO</td>
                <td colspan="2" style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BC 2.6.2</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SKU</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:300px;background-color:#C0C0C0;">JENIS BARANG</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:80px;background-color:#C0C0C0;">JUMLAH</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:80px;background-color:#C0C0C0;">SATUAN</td>
              </tr>
              <tr>
                <td style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">Nomor Daftar</td>
                <td style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">Tanggal Daftar</td>
                <td style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">Nomor Daftar</td>
                <td style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">Tanggal Daftar</td>
              </tr>
    
              <?php
              $no_dok=0;
              $total_jaminan=0;
              ?>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value['no']}}</td>
                <td >{{$value['no_dok']}}</td>
                <td >{{$value['tgl_dok']}}</td>
                <td >{{$value['sku']}}</td>
                <td >{{$value['uraian_barang']}}</td>
                <td >{{$value['jumlah_barang']}}</td>
                <td >{{$value['satuan']}}</td>
                @if($no_dok!=$value['no_dok'])
                <td >{{$value['nilai_jaminan261']}}</td>
                  <?php
                  $total_jaminan=$total_jaminan+$value['nilai_jaminan261'];
                  ?>
                @else
                <td></td>
                @endif
                <td >{{$value['no1']}}</td>
                <td >{{$value['no_dok1']}}</td>
                <td >{{$value['tgl_dok1']}}</td>
                <td >{{$value['sku1']}}</td>
                <td >{{$value['uraian_barang1']}}</td>
                <td >{{$value['jumlah_barang1']}}</td>
                <td >{{$value['satuan1']}}</td>
              </tr>
              <?php
                $no_dok=$value['no_dok'];
              ?>
            @endforeach
            <tr>
                <td colspan="5" style="font-weight:bold;text-align:center;background-color:#DCDCDC;">TOTAL JAMINAN</td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="font-weight:bold;text-align:center;background-color:#DCDCDC;">{{ $total_jaminan}}</td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
              <tr>
                <td colspan="5" style="font-weight:bold;text-align:center;background-color:#DCDCDC;">TOTAL FABRIC</td>
                <td style="font-weight:bold;text-align:center;background-color:#DCDCDC;">{{$total_consumtif['total_fabric']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#DCDCDC;">KGM</td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
              <tr>
                <td colspan="5" style="font-weight:bold;text-align:center;background-color:#DCDCDC;">TOTAL HANCA</td>
                <td style="font-weight:bold;text-align:center;background-color:#DCDCDC;">{{$total_consumtif['total_hanca']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#DCDCDC;">KGM</td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
              <tr>
                <td colspan="4" style="font-weight:bold;text-align:center;background-color:#C0C0C0;">TOTAL CONSUMPTION FABRIC / KGM</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">{{$total_consumtif['total_consumtif']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">{{$total_consumtif['jumlah']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">PCE</td>
                <td colspan="4" style="font-weight:bold;text-align:center;background-color:#C0C0C0;">TOTAL</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">{{$total_consumtif['jenis_barang']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">{{$total_consumtif['total_garment']}}</td>
                <td style="font-weight:bold;text-align:center;background-color:#C0C0C0;">PCE</td>
              </tr>
        </table>
      <br>
    </body>
</html>
      

                     


