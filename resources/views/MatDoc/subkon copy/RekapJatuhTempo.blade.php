
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NO SKEP</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO CB</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">NO BPJ</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TANGGAL EBPJ</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">JATUH TEMPO</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">SUPLIER</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">AMOUNT / Rp</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO KONTRAK KERJA</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">tarik CB ASLI</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PREMI</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">KET</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BC262</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">JDE</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NIK PIC</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NAMA PIC</td>

              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value->no_skep}}</td>
                <td >{{$value->no_bound}}</td>
                <td >{{$value->no_bpj}}</td>
                <td >{{$value->tgl_bpj}}</td>
                <td >{{$value->jatuh_tempo}}</td>
                <td >{{$value->supplier}}</td>
                <td >{{$value->amount}}</td>
                <td >{{$value->sub_no_kontrak }}</td>
                <td >{{$value->tarik_cb}}</td>
                <td >{{$value->premi}}</td>
                <td >{{$value->ket}}</td>
                <td >{{$value->bc_262}}</td>
                <td >{{$value->jde}}</td>
                <!-- <td >{{$value['no_dok']}}</td>
                <td >{{$value['tgl_dok']}}</td>
                <td >{{$value['uraian_barang']}}</td>
                <td >{{$value['jumlah_barang']}}</td>
                <td >{{$value['satuan']}}</td> -->
                <td >{{$value['nik']}}</td>
                <td >{{$value['nama']}}</td>

              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


