
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  font-size:9px;
  padding:3px;
  }
  table {
    border-collapse: collapse;
  }
			#box1{
				width:180px;
				height:180px;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tabel{
				width:100%;
				height: auto;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tab{
        width:100%;
				height: auto;
        border: 1px solid grey;
				background:white;
			}
      #tbl{
        width:100%;
				height: 200px;
        border: 1px solid grey;
				background:white;
			}
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
.dit {
  width: 180px;
  padding: 3px;
  border: 1px solid black;
  margin: 0;
}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
      <table border="1">
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:14px;border:1px black solid;text-align:center;" >DATA FINISHING / DAY</td>
        </tr> 
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">PABRIK : {{ $dataBranch->nama_branch }}</td>
        </tr>
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }}</td>
        </tr> 
      </table>
      <br>
       <table class="table">
           <thead>
               <tr>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TANGGAL</td>
                  <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">STYLE</td>
                  <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BUYER</td>
                  <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">PROSES</td>
                  <td style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">PLACING</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TOTAL</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">START</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">FINISH</td>
                  <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NAMA</td>
                  <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NIK</td>
                  <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">REMARK</td>
                  
                </tr>
           </thead>
            <tbody>
               @foreach ($data_awal as $key => $value)
                <tr>
                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                    <td style="text-align:center;">{{  \Carbon\Carbon::parse($value['tanggal'] )->locale('id')->format('d-m-Y')  }}</td>
                    <td style="text-align:center;">{{ $value['style'] }}</td>
                    <td style="text-align:center;">{{ $value['buyer'] }}</td>
                    <td style="text-align:center;">{{ $value['status_proses'] }},{{ $value['status'] }}</td>
                    <td style="text-align:center;">{{ $value['placing'] }}</td>
                    <td style="text-align:center;">{{ $value['wo'] }}</td>
                    <td style="text-align:center;">{{ $value['qty_target'] }}</td>
                    <td style="text-align:center;">{{ $value['jam_mulai'] }}</td>
                    <td style="text-align:center;">{{ $value['jam_selesai'] }}</td>
                    <td style="text-align:center;">{{ $value['nama'] }}</td>
                    <td style="text-align:center;">{{ $value['nik'] }}</td>
                    <td style="text-align:center;">{{ $value['remark'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      <br>
    </body>
</html>
      

                     


