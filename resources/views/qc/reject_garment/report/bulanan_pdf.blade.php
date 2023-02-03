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
        <center><font style="font-weight:bold;font-size:20px;">DATA REJECT FABRIC & SEWING / HARI</font></center>
        <center><font style="font-weight:bold;font-size:15px;">FACTORY : {{$dataBranch->nama_branch}}</font></center>
        <center><font style="font-weight:bold;font-size:13px;">{{$kodeBulan}}</font></center>
        <br>
        <table style="width:1260px">
          <tr>
            <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TANGGAL</td>
            <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">LINE</td>
            <td rowspan="2" style="font-weight:bold;">BUYER</td>
            <td rowspan="2" style="font-weight:bold;">STYLE</td>
            <td rowspan="2" style="font-weight:bold;">WO</td>
            <td rowspan="2" style="font-weight:bold;">ACT #</td>
            <td rowspan="2" style="font-weight:bold;">ITEM</td>
            <td rowspan="2" style="font-weight:bold;">COLOUR</td>
            <td rowspan="2" style="font-weight:bold;">QTY ORDER</td>
            <td rowspan="2" style="font-weight:bold;">SIZE</td>
            <td colspan="5" style="font-weight:bold;">FABRIC</td>
            <td colspan="5" style="font-weight:bold;">SEWING</td>
            <td rowspan="2" style="font-weight:bold;">TOTAL</td>
            <td rowspan="2" style="font-weight:bold;">KETERANGAN</td>
          </tr>
          <tr>
            <td style="font-weight:bold;">CACAT KAIN</td>
            <td style="font-weight:bold;">BOLONG</td>
            <td style="font-weight:bold;">SHADDING</td>
            <td style="font-weight:bold;">KOTOR</td>
            <td style="font-weight:bold;">LAIN-LAIN</td>
            <td style="font-weight:bold;">CACAT</td>
            <td style="font-weight:bold;">LABEL</td>
            <td style="font-weight:bold;">KOTOR</td>
            <td style="font-weight:bold;">BOLONG</td>
            <td style="font-weight:bold;">UKURAN</td>
          </tr>
          @foreach($result as $key => $value)
          <tr>
            <td>{{$value['tanggal']}}</td>
            <td>{{$value['line']}}</td>
            <td>{{$value['buyer']}}</td>
            <td>{{$value['style']}}</td>
            <td>{{$value['no_wo']}}</td>
            <td>{{$value['article']}}</td>
            <td>{{$value['item']}}</td>
            <td>{{$value['color']}}</td>
            <td>{{$value['qty']}}</td>
            <td>{{$value['size']}}</td>
            <td>{{$value['f_cacat']}}</td>
            <td>{{$value['f_bolong']}}</td>
            <td>{{$value['f_shadding']}}</td>
            <td>{{$value['f_kotor']}}</td>
            <td>{{$value['f_lain']}}</td>
            <td>{{$value['s_cacat']}}</td>
            <td>{{$value['s_label']}}</td>
            <td>{{$value['s_kotor']}}</td>
            <td>{{$value['s_bolong']}}</td>
            <td>{{$value['s_ukuran']}}</td>
            <td>{{$value['total']}}</td>
            <td>{{$value['keterangan']}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="10" style="background-color:#C0C0C0;">TOTAL</td>
            <td style="background-color:#C0C0C0;">{{$total['f_cacat']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['f_bolong']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['f_shadding']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['f_kotor']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['f_lain']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['s_cacat']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['s_label']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['s_kotor']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['s_bolong']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['s_ukuran']}}</td>
            <td style="background-color:#C0C0C0;">{{$total['total']}}</td>
            <td style="background-color:#C0C0C0;"></td>
          </tr>
        </table>
    </body>
</html>