<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  text-align:center;
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
.page_break { page-break-before: always; }
</style>
</head>
    <body> 
        <center><font style="font-weight:bold;font-size:20px;">MONTHLY SAMPLE CHECKING</font></center>
        <center><font style="font-weight:bold;font-size:15px;">FACTORY : {{$dataBranch->nama_branch}}</font></center>
        <center><font style="font-weight:bold;font-size:13px;">{{$kodeBulan}}</font></center>
        <br>
        <table style="width:1260px">
          <tr>
            <td rowspan="2" style="font-weight:bold;">NO</td>
            <td rowspan="2" style="font-weight:bold;">DATE</td>
            <td colspan="3" style="font-weight:bold;">RESULT</td>
            <td rowspan="2" style="font-weight:bold;">REMARK</td>
          </tr>
          <tr>
            <td style="font-weight:bold;">PASS</td>
            <td style="font-weight:bold;">FAIL</td>
            <td style="font-weight:bold;">% FAIL</td>
          </tr>
          <?php $no=1;?>
          @foreach($hitungan as $key => $value)
          <tr>
            <td scope="row">{{ $no }}</td>
            <td scope="row">{{ $value['date'] }}</td>
            <td scope="row">{{ $value['pass'] }}</td>
            <td scope="row">{{ $value['fail'] }}</td>
            <td scope="row">{{ $value['p_fail']}} %</td>
            <td scope="row">{{ $value['remark']}}</td>
          </tr>
          <?php $no++ ;?>
          @endforeach
          <tr>
            <td colspan="2" style="background-color:#C0C0C0;">TOTAL</td>
            <td style="background-color:#C0C0C0;">{{ $dataTotal['pass'] }}</td>
            <td style="background-color:#C0C0C0;">{{ $dataTotal['fail'] }}</td>
            <td style="background-color:#C0C0C0;">{{ $dataTotal['p_fail'] }} %</td>
            <td style="background-color:#C0C0C0;">{{ $dataTotal['remark'] }}</td>
          </tr>
        </table>
    </body>
</html>