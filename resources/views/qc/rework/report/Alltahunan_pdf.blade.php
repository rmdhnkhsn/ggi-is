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
        <center><font style="font-weight:bold;font-size:20px;">ANNUAL REPORT QC REWORK</font></center>
        <center><font style="font-weight:bold;font-size:15px;">ALL FACTORY</font></center>
        <center><font style="font-weight:bold;font-size:13px;">{{$tahun}}</font></center>
        <br>
        <table style="width:1260px">
            <tr>
                <td rowspan="2" style="font-weight:bold;">NO</td>
                <td rowspan="2" style="font-weight:bold;padding-left:20px;padding-right:20px">FACTORY</td>
                <td colspan="2" style="font-weight:bold;padding-left:18px;padding-right:18px">JANUARY</td>
                <td colspan="2" style="font-weight:bold;padding-left:20px;padding-right:20px">FEBRUARY</td>
                <td colspan="2" style="font-weight:bold;padding-left:25px;padding-right:25px">MARCH</td>
                <td colspan="2" style="font-weight:bold;padding-left:25px;padding-right:25px">APRIL</td>
                <td colspan="2" style="font-weight:bold;padding-left:25px;padding-right:25px">MAY</td>
                <td colspan="2" style="font-weight:bold;padding-left:25px;padding-right:25px">JUNE</td>
                <td colspan="2" style="font-weight:bold;padding-left:25px;padding-right:25px">JULY</td>
                <td colspan="2" style="font-weight:bold;padding-left:20px;padding-right:20px">AUGUST</td>
                <td colspan="2" style="font-weight:bold;padding-left:15px;padding-right:15px">SEPTEMBER</td>
                <td colspan="2" style="font-weight:bold;padding-left:20px;padding-right:20px">OCTOBER</td>
                <td colspan="2" style="font-weight:bold;padding-left:15px;padding-right:15px">NOVEMBER</td>
                <td colspan="2" style="font-weight:bold;padding-left:15px;padding-right:15px">DESEMBER</td>
            </tr>
            <tr>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
            <td style="font-weight:bold;">QTY</td>
            <td style="font-weight:bold;">% AVG</td>
        </tr>
        <?php $no=1;?>
        @foreach($dataReport as $dr)
        <tr>
            <td scope="row">{{ $no }}</td>
            <td scope="row">{{ $dr['branch'] }}</td>
            <td scope="row">{{ $dr['janReject'] }}</td>
            <td scope="row">{{ $dr['janP_Reject'] }} %</td>
            <td scope="row">{{ $dr['febReject'] }}</td>
            <td scope="row">{{ $dr['febP_Reject'] }} %</td>
            <td scope="row">{{ $dr['marReject'] }}</td>
            <td scope="row">{{ $dr['marP_Reject'] }} %</td>
            <td scope="row">{{ $dr['aprReject'] }}</td>
            <td scope="row">{{ $dr['aprP_Reject'] }} %</td>
            <td scope="row">{{ $dr['mayReject'] }}</td>
            <td scope="row">{{ $dr['mayP_Reject'] }} %</td>
            <td scope="row">{{ $dr['junReject'] }}</td>
            <td scope="row">{{ $dr['junP_Reject'] }} %</td>
            <td scope="row">{{ $dr['julReject'] }}</td>
            <td scope="row">{{ $dr['julP_Reject'] }} %</td>
            <td scope="row">{{ $dr['agsReject'] }}</td>
            <td scope="row">{{ $dr['agsP_Reject'] }} %</td>
            <td scope="row">{{ $dr['sepReject'] }}</td>
            <td scope="row">{{ $dr['sepP_Reject'] }} %</td>
            <td scope="row">{{ $dr['octReject'] }}</td>
            <td scope="row">{{ $dr['octP_Reject'] }} %</td>
            <td scope="row">{{ $dr['novReject'] }}</td>
            <td scope="row">{{ $dr['novP_Reject'] }} %</td>
            <td scope="row">{{ $dr['desReject'] }}</td>
            <td scope="row">{{ $dr['desP_Reject'] }} %</td>
        </tr>
        <?php $no++ ;?>
        @endforeach
        <tr>
            <td colspan="2" style="background-color:#DCDCDC;">TOTAL</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['janReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['janP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['febReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['febP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['marReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['marP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['aprReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['aprP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['mayReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['mayP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['junReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['junP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['julReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['julP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['agsReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['agsP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['sepReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['sepP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['octReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['octP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['novReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['novP_Reject']}} %</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['desReject']}}</td>
            <td style="background-color:#DCDCDC;">{{$dataTotal['desP_Reject']}} %</td>
        </tr>
        </table>
    </body>
</html>