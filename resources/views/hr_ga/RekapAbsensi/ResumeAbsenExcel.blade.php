
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">tanggal</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">masuk</td>
                <td style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">pulang</td>
                <td style="font-weight:bold;text-align:center;width:250px;background-color:#C0C0C0;">kondisi</td>
              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td >{{$value['_Tanggal']}}</td>
                <td >{{$value['_Masuk']}}</td>
                <td >{{$value['_Pulang']}}</td>
                <td >{{$value['kondisi']}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


