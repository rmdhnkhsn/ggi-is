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
          <td colspan="9" style="font-weight:bold;font-size:16px;border:1px black solid;text-align:center;" >BULK TRIM CARD</td>
        </tr>  
      </table>
      <table border="1">
        <tr>
          <td style="font-weight:bold;width:140px;">AGENT</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->agent}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;">COLORWAY</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway1}}</td>
        </tr>  
        <tr>
          <td style="font-weight:bold;width:140px;">BUYER</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->buyer}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;"></td>
          <td style="font-weight:bold;width:10px;"></td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway2}}</td>
        </tr>  
        <tr>
          <td style="font-weight:bold;width:140px;">DESTINATION</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->destination}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;"></td>
          <td style="font-weight:bold;width:10px;"></td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway3}}</td>
        </tr>  
        <tr>
          <td style="font-weight:bold;width:140px;">PROD DESCRIPTION</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->prod_desc}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;"></td>
          <td style="font-weight:bold;width:10px;"></td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway4}}</td>
        </tr>  
        <tr>
          <td style="font-weight:bold;width:140px;">STYLE</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->style}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;"></td>
          <td style="font-weight:bold;width:10px;"></td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway5}}</td>
        </tr>  
        <tr>
          <td style="font-weight:bold;width:140px;">ART</td>
          <td style="font-weight:bold;width:10px;">:</td>
          <td style="font-weight:bold;width:230px;">{{$atas->art}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td style="font-weight:bold;width:140px;"></td>
          <td style="font-weight:bold;width:10px;"></td>
          <td style="font-weight:bold;width:230px;">{{$atas->colorway6}}</td>
        </tr>  
      </table>
      @foreach($hasil as $key => $value)
      <table>
        <tr>
          <td style="font-weight:bold;">{{$value['desc1']}}</td>
        </tr>
        <tr>
          <td style="font-weight:bold;">{{$value['desc2']}}</td>
        </tr>
        <tr>
          <td style="font-weight:bold;">{{$value['srtx']}}</td>
        </tr>
        <tr>
          <td colspan="9" rowspan="4" style="background-color:#D3D3D3;"></td>
        </tr>  
        <tr>
          <td></td>
        </tr>  
      </table><br><br>
      @endforeach
    </body>
</html>