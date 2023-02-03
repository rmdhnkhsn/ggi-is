
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">G/L DATE</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">EXPLANATION</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">CURRENCY</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BU</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ACCOUNT DEBIT</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ACCOUNT CREDIT</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">AMOUNT</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">REMARKS 1</td>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">CHECKING BY</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">RECEIPT BY</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SUBMITTER</td>

              @foreach ($data as $key => $value)
                <tr>
                  <td >{{$value->tgl_create}}</td>
                  <td >{{$value->pencairan}}</td>
                  <td >IDR</td>
                  <td >{{$value->kode_jde}}</td>
                  <td >`{{$value->kode_jde}}.{{$value->kode_pencairan}} </td>
                  <td >{{$value->akun_kredit}}</td>
                  <td >{{$value->amount_realisasi}}</td>
                  <td >{{$value->deskripsi }}</td>
                  <td >{{$value->manager}}</td>
                  <td >{{$value->nama}}</td>
                  <td >{{$value->nama_support}}</td>
                </tr>
              @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


