<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
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
        <center><font style="font-weight:bold;font-size:20px;">FORM SERAH TERIMA BARANG REJECT</font></center>
        <br>
        <table border="1px" style="width:720px">
          <tr>
            <td style="font-weight:bold;">TANGGAL</td>
            <td style="font-weight:bold;">NO BOX</td>
            <td style="font-weight:bold;">BUYER</td>
            <td style="font-weight:bold;">STYLE</td>
            <td style="font-weight:bold;">COLOUR</td>
            <td style="font-weight:bold;">WO #</td>
            <td style="font-weight:bold;">PO </td>
            <td style="font-weight:bold;">ITEM</td>
            <td style="font-weight:bold;">TOTAL</td>
            <td style="font-weight:bold;">KETERANGAN</td>
          </tr>
           @foreach($data->packing_detail as $key => $value)
          <tr>
            <td>{{$value->tanggal}}</td>
            <td>{{$value->no_box}}</td>
            <td>{{$value->buyer}}</td>
            <td>{{$value->style}}</td>
            <td>{{$value->color}}</td>
            <td>{{$value->no_wo}}</td>
            <td>{{$value->no_po}}</td>
            <td>{{$value->item}}</td>
            <td>{{$value->total}}</td>
            <td>{{$value->keterangan}}</td>
          </tr>
          @endforeach
        </table>
        <br>
        <table>
          <tr>
            <td width="300px" style="font-weight:bold;font-size:12px;">Diserahkan</td>
            <td width="360px" style="font-weight:bold;font-size:12px;">Mengetahui</td>
          </tr>
        </table>
        <br>
        <br>
        <table>
          <tr>
            <td width="300px" style="font-weight:bold;font-size:12px;">QC</td>
            <td width="180px" style="font-weight:bold;font-size:12px;">Kabag QC</td>
            <td width="200px" style="font-weight:bold;font-size:12px;">Exspedisi</td>
          </tr>
        </table>
    </body>
</html>