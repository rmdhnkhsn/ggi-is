
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">Nomor Aju</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Nomor BC23</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">Tanggal</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Vessel</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ETD</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ETA JKT</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">ETA GTX</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jumlah Kemasan</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">Jenis Kemasan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Shipper</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Order</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO. BL / AWB</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Berat</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jumlah Devisa Import</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tanggal Crate</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Purchasing</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Forwader</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Keterangan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Status</td>

              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value->no_aju}}</td>
                <td >{{$value->no_bc23}}</td>
                <td >{{$value->tanggal}}</td>
                <td >{{$value->vessel}}</td>
                <td >{{$value->etd}}</td>
                <td >{{$value->eta_jkt}}</td>
                <td >{{$value->eta_gtx}}</td>
                <td >{{$value->jum_kemasan }}</td>
                <td >{{$value->jenis_kemasan}}</td>
                <td >{{$value->shipper}}</td>
                <td >{{$value->order_ticket}}</td>
                <td >{{$value->no_bl}}</td>
                <td >{{$value->berat}}</td>
                <td >{{$value->jum_devisa}}</td>
                <td >{{$value->tgl_pengajuan}}</td>
                <td >{{$value->nama}}</td>
                <td >{{$value->forwader}}</td>
                <td >{{$value->keterangan}}</td>
                <td >{{$value->status}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


