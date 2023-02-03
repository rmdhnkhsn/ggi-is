<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  font-size:12px;
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
.cons {
    width: auto;
    height:150px;
    border: 1px solid black;
} 
.col-lg-6 {width:100%; float:left;}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
        <center><font style="font-weight:bold;font-size:24px;">WEEKLY ACTIVITY ( ONTIME RESPONSE )</font></center>
        <!-- Summary All Branch  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">SUMMARY ALL FACTORY</label>
        </div>
        <div class="container">
            <table style="width:720px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td rowspan="2">PT. GISTEX GARMEN INDONESIA</td>
                    <td colspan="3">ONTIME</td>
                    <td colspan="3">NOT ONTIME</td>
                </tr>
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                  <td>Response</td>
                  <td>From</td>
                  <td>%</td>
                  <td>Response</td>
                  <td>From</td>
                  <td>%</td>
                </tr>
                @foreach($ontime_all as $key => $value)
                <tr>
                    <td>{{$value['nama_branch']}}</td>
                    <td><center>{{$value['yang_isi']}} </center></td>
                    <td><center>{{$value['semua_warga']}}</center></td>
                    <td><center>{{$value['ontime']}} %</center></td>
                    <td><center>{{$value['tidak_isi']}}</center></td>
                    <td><center>{{$value['semua_warga']}}</center></td>
                    <td><center>{{$value['tidak_ontime']}} %</center></td>
                </tr>
                @endforeach
                <tr style="font-weight:bold;background:#D0D0D0;">
                    <td><center>GRAND TOTAL</center></td>
                    <td><center>{{$grand_total['yang_isi']}}</center></td>
                    <td><center>{{$grand_total['semua_warga']}}</center></td>
                    <td><center>{{$grand_total['ontime']}} %</center></td>
                    <td><center>{{$grand_total['tidak_isi']}}</center></td>
                    <td><center>{{$grand_total['semua_warga']}}</center></td>
                    <td><center>{{$grand_total['tidak_ontime']}} %</center></td>
                </tr>
            </table>
        </div>
        <br><br>
        <!-- Difilter berdasarkan branch dan departemen  -->
        <?php 
        $grup = collect($ontime_per_dept)->groupBy('branch');
        ?>
        @foreach($grup as $key => $value)
            <?php 
                $branchdetail = collect($value)->groupBy('branchdetail');
            ?>
            @foreach($branchdetail as $key2 => $value2)
                <?php 
                $branch = collect($value2)->first();
                ?>
                <div class="container">
                    <label for="" style="font-weight:bold;font-size:16px;">{{$branch['nama_branch']}}</label>
                </div>
                <table style="width:720px">
                    <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                        <td rowspan="2">DEPARTEMEN</td>
                        <td colspan="3">ONTIME RESPONE</td>
                    </tr>
                    <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                        <td>Response</td>
                        <td>From</td>
                        <td>%</td>
                    </tr>
                    @foreach($value2 as $key3 => $value3)
                    <tr>
                        <td>{{$value3['departemen']}}</td>
                        <td><center>{{$value3['yang_isi']}}</center></td>
                        <td><center>{{$value3['semua_warga']}}</center></td>
                        <td><center>{{$value3['ontime']}} %</center></td>
                    </tr>
                    @endforeach
                </table> 
                <br> 
            @endforeach
        @endforeach
    </body>
</html>