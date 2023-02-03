
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DATE</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BANK</td>
                <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">BANK.ACCOUNT.NUMBER</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BANK.ACCOUNT.NAME</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">AMOUNT</td>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value->tgl_done}}</td>
                <td >{{$value->bank}}</td>
                <td >{{$value->rekening}}</td>
                <td >`{{$value->nama}}</td>
                <td >{{$value->amount_realisasi}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


