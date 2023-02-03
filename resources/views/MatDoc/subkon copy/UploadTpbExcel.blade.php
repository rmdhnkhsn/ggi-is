
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">Jenis Dokumen ( 1 =261, 2 = 262)</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">No Dokumen</td>
                <td style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">Tgl Dokumen</td>
                <td style="font-weight:bold;text-align:center;width:250px;background-color:#C0C0C0;">Uraian Barang</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jumlah Barang</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Satuan Barang</td>
              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value['jenis_dok']}}</td>
                <td >{{$value['no_dok']}}</td>
                <td >{{$value['tgl_dok']}}</td>
                <td >{{$value['uraian_barang']}}</td>
                <td >{{$value['jumlah_barang']}}</td>
                <td >{{$value['satuan']}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


