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
.page_break { page-break-before:always; }
</style>
</head>
    <body> 
        <center><font style="font-weight:bold;font-size:20px;">DAILY REPORT QC REWORK</font></center>
        <center><font style="font-weight:bold;font-size:15px;">ALL FACTORY</font></center>
        <center><font style="font-weight:bold;font-size:13px;">{{$tanggal_depan}}</font></center>
        <br>
        <table style="width:730px">
            <tr>
                <td style="font-weight:bold;">NO</td>
                <td style="font-weight:bold;">FACTORY</td>
                <td style="font-weight:bold;">LINE</td>
                <td style="font-weight:bold;">CHECKED</td>
                <td style="font-weight:bold;">QTY REJECT</td>
                <td style="font-weight:bold;">% REJECT</td>
            </tr>
            <?php $no=1;?>
            @foreach($dataFinal as $key => $value)
            <tr>
              <td rowspan="{{count($value) + 1}}" scope="row">{{ $no }}</td>
              <td rowspan="{{count($value) + 1}}">{{$key}}</td>
              <td colspan="4"></td>
            </tr>  
              @foreach($value as $v)
            <tr>
              <td>{{$v['line']}}</td>
              <td>{{$v['total_check']}}</td>
              <td>{{$v['total_reject']}}</td>
              <td>{{$v['p_total_reject']}} %</td>
            </tr>
              @endforeach
              @if ( $no % 25 == 0 )
                  <div class="page_break"> </div>
              @endif
              <?php $no++ ;?>
            @endforeach
            <tr>
                <td colspan="3" style="background-color:#DCDCDC;">TOTAL</td>
                <td style="background-color:#DCDCDC;">{{$totalAllTerpenuhi}}</td>
                <td style="background-color:#DCDCDC;">{{$totalAllReject}}</td>
                <td style="background-color:#DCDCDC;">{{$totalAll_P_Reject}} %</td>
            </tr>
        </table>
        <br>
        @if($foto != null)
        @foreach($foto as $fc)
        <div class="page_break"></div>
        <div class="tables">
        <div class="tables-row">
            <div class="tables-cell">
                <h3>{{$fc['line']}}</h3>
                <center><img class="span12" style="height:400px;width:600px" src="{{ public_path('/rework/qc/images/'.$fc['file']) }}"> </center>
            </div>
        </div>
        </div>
        @endforeach
        @endif
    </body>
</html>