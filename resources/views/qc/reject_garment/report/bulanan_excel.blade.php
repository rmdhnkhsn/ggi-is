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
          <td colspan="22" style="font-weight:bold;font-size:14px;border:1px black solid;text-align:center;" >DATA REJECT FABRIC - SEWING / HARI</td>
        </tr>  
      </table>
      <table>
        <tr>
          <td colspan="2" style="font-weight:bold;">PABRIK : {{$dataBranch->nama_branch}}</td>
          <td colspan="2" style="font-weight:bold;">BULAN : {{$kodeBulan}}</td>
        </tr>
      </table>
      <table border="1">
        <tr>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#87CEEB;">TANGGAL</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;center;width:90px;background-color:#87CEEB;">LINE</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;center;width:200px;background-color:#87CEEB;">BUYER</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">STYLE</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">WO</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:110px;background-color:#87CEEB;">ACT #</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:120px;background-color:#87CEEB;">ITEM</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">COLOUR</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">QTY ORDER</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:60px;background-color:#87CEEB;">SIZE</td>
          <td colspan="5" style="font-weight:bold;text-align:center;background-color:#87CEEB;">FABRIC</td>
          <td colspan="5" style="font-weight:bold;text-align:center;background-color:#87CEEB;">SEWING</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;background-color:#87CEEB;">TOTAL</td>
          <td rowspan="2" style="font-weight:bold;text-align:center;width:200px;background-color:#87CEEB;">KETERANGAN</td>
        </tr>
        <tr>
          <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">CACAT KAIN</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">BOLONG</td>
          <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">SHADDING</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">KOTOR</td>
          <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">LAIN-LAIN</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">CACAT</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">LABEL</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">KOTOR</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">BOLONG</td>
          <td style="font-weight:bold;text-align:center;background-color:#87CEEB;">UKURAN</td>
        </tr>
        @foreach($result as $key => $value)
        <tr>
          <td style="text-align:center;">{{$value['tanggal']}}</td>
          <td style="text-align:center;">{{$value['line']}}</td>
          <td style="text-align:center;">{{$value['buyer']}}</td>
          <td style="text-align:center;">{{$value['style']}}</td>
          <td style="text-align:center;">{{$value['no_wo']}}</td>
          <td style="text-align:center;">{{$value['article']}}</td>
          <td style="text-align:center;">{{$value['item']}}</td>
          <td style="text-align:center;">{{$value['color']}}</td>
          <td style="text-align:center;">{{$value['qty']}}</td>
          <td style="text-align:center;">{{$value['size']}}</td>
          <td style="text-align:center;">{{$value['f_cacat']}}</td>
          <td style="text-align:center;">{{$value['f_bolong']}}</td>
          <td style="text-align:center;">{{$value['f_shadding']}}</td>
          <td style="text-align:center;">{{$value['f_kotor']}}</td>
          <td style="text-align:center;">{{$value['f_lain']}}</td>
          <td style="text-align:center;">{{$value['s_cacat']}}</td>
          <td style="text-align:center;">{{$value['s_label']}}</td>
          <td style="text-align:center;">{{$value['s_kotor']}}</td>
          <td style="text-align:center;">{{$value['s_bolong']}}</td>
          <td style="text-align:center;">{{$value['s_ukuran']}}</td>
          <td style="text-align:center;">{{$value['total']}}</td>
          <td style="text-align:center;">{{$value['keterangan']}}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="10" style="text-align:center;">TOTAL</td>
          <td style="text-align:center;">{{$total['f_cacat']}}</td>
          <td style="text-align:center;">{{$total['f_bolong']}}</td>
          <td style="text-align:center;">{{$total['f_shadding']}}</td>
          <td style="text-align:center;">{{$total['f_kotor']}}</td>
          <td style="text-align:center;">{{$total['f_lain']}}</td>
          <td style="text-align:center;">{{$total['s_cacat']}}</td>
          <td style="text-align:center;">{{$total['s_label']}}</td>
          <td style="text-align:center;">{{$total['s_kotor']}}</td>
          <td style="text-align:center;">{{$total['s_bolong']}}</td>
          <td style="text-align:center;">{{$total['s_ukuran']}}</td>
          <td style="text-align:center;">{{$total['total']}}</td>
          <td style="text-align:center;"></td>
        </tr>
      </table>
    </body>
</html>