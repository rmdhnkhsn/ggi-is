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
      <center><font style="font-weight:bold;font-size:22px;">RECAP {{$namaBuyer->F0101_ALPH}} ORDER PO {{$master->no_po}}</font></center>
      <center><font style="font-weight:bold;font-size:15px;">ORDER DATE {{$master->date}}</font></center>
      @foreach($master->rekap_detail as $key => $value)
      <label for="" style="font-weight:bold;">#OR/SO {{$value->no_or}}</label>
        <table style="width:1250px">
          <tr style="text-align:center;">
            <td style="font-weight:bold;">CONTRACT</td>
            <td style="font-weight:bold;">STYLE</td>
            <td style="font-weight:bold;">COLORWAY</td>
            <td style="font-weight:bold;">PRODUCT NAME</td>
            <td style="font-weight:bold;">OR/SO</td>
            <td style="font-weight:bold;">PARENT ITEM</td>
            <td style="font-weight:bold;">EXFACT</td>
            <td style="font-weight:bold;">{{$master->standar}}</td>
            <td style="font-weight:bold;">TOTAL AMOUNT</td>
          </tr>
          <tr style="text-align:center;">
            <td>{{$value->contract}}</td>
            <td>{{$value->style}}</td>
            <td>{{$value->colorway}}</td>
            <td>{{$value->product_name}}</td>
            <td>{{$value->no_or}}</td>
            <td>{{$value->parent_item}}</td>
            <td>{{$value->ex_fact}}</td>
            <td>{{$value->nilai}}</td>
            @foreach($values as $key5 => $value5)
            @if($value5['rekap_detail_id'] == $value->id)
            <td>{{$value5['nilai']}}</td>
            @endif
            @endforeach
          </tr>
        </table>
        <table style="width:1250px">
          <tr style="text-align:center;">
            <td rowspan="2" style="font-weight:bold;">FABRIC</td>
            <td rowspan="2" style="font-weight:bold;">COLOR CODE</td>
            <td rowspan="2" style="font-weight:bold;">COLOR NAME</td>
            <td rowspan="2" style="font-weight:bold;">COUNTRY CODE</td>
            <td colspan="{{$total}}" style="font-weight:bold;">QTY BREAKDOWN</td>
            <td rowspan="2" style="font-weight:bold;">TOTAL</td>
          </tr>
          <tr style="text-align:center;">
            @foreach($ukuran as $key3 => $value3)
            <td>{{$value3}}</td>
            @endforeach
          </tr>
          @foreach($master->rekap_breakdown as $key2 => $value2)
          @if($value->id == $value2->rekap_detail_id)
          <tr>
            <td>{{$value2->fabric}}</td>
            <td>{{$value2->color_code}}</td>
            <td>{{$value2->color_name}}</td>
            <td>{{$value2->country_code}}</td>
            @if($master->rekap_size->size1 != null)
            <td style="text-align:center;">{{$value2->size1}}</td>
            @endif
            @if($master->rekap_size->size2 != null)
            <td style="text-align:center;">{{$value2->size2}}</td>
            @endif
            @if($master->rekap_size->size3 != null)
            <td style="text-align:center;">{{$value2->size3}}</td>
            @endif
            @if($master->rekap_size->size4 != null)
            <td style="text-align:center;">{{$value2->size4}}</td>
            @endif
            @if($master->rekap_size->size5 != null)
            <td style="text-align:center;">{{$value2->size5}}</td>
            @endif
            @if($master->rekap_size->size6 != null)
            <td style="text-align:center;">{{$value2->size6}}</td>
            @endif
            @if($master->rekap_size->size7 != null)
            <td style="text-align:center;">{{$value2->size7}}</td>
            @endif
            @if($master->rekap_size->size8 != null)
            <td style="text-align:center;">{{$value2->size8}}</td>
            @endif
            @if($master->rekap_size->size9 != null)
            <td style="text-align:center;">{{$value2->size9}}</td>
            @endif
            @if($master->rekap_size->size10 != null)
            <td style="text-align:center;">{{$value2->size10}}</td>
            @endif
            @if($master->rekap_size->size11 != null)
            <td style="text-align:center;">{{$value2->size11}}</td>
            @endif
            @if($master->rekap_size->size12 != null)
            <td style="text-align:center;">{{$value2->size12}}</td>
            @endif
            @if($master->rekap_size->size13 != null)
            <td style="text-align:center;">{{$value2->size13}}</td>
            @endif
            @if($master->rekap_size->size14 != null)
            <td style="text-align:center;">{{$value2->size14}}</td>
            @endif
            @if($master->rekap_size->size15 != null)
            <td style="text-align:center;">{{$value2->size15}}</td>
            @endif
            <td style="text-align:center;">{{$value2->total_size}}</td>
          </tr>
          @endif
          @endforeach
          @foreach($total_size as $key4 => $value4)
          @if($value->id == $value4['id'])
          <tr style="text-align:center;">
            <td colspan="4" style="background-color:#DCDCDC;font-weight:bold;">TOTAL</td>
            @if($master->rekap_size->size1 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size1']}}</td>
            @endif
            @if($master->rekap_size->size2 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size2']}}</td>
            @endif
            @if($master->rekap_size->size3 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size3']}}</td>
            @endif
            @if($master->rekap_size->size4 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size4']}}</td>
            @endif
            @if($master->rekap_size->size5 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size5']}}</td>
            @endif
            @if($master->rekap_size->size6 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size6']}}</td>
            @endif
            @if($master->rekap_size->size7 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size7']}}</td>
            @endif
            @if($master->rekap_size->size8 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size8']}}</td>
            @endif
            @if($master->rekap_size->size9 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size9']}}</td>
            @endif
            @if($master->rekap_size->size10 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size10']}}</td>
            @endif
            @if($master->rekap_size->size11 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size11']}}</td>
            @endif
            @if($master->rekap_size->size12 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size12']}}</td>
            @endif
            @if($master->rekap_size->size13 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size13']}}</td>
            @endif
            @if($master->rekap_size->size14 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size14']}}</td>
            @endif
            @if($master->rekap_size->size15 != null)
            <td style="background-color:#DCDCDC;">{{$value4['size15']}}</td>
            @endif
            <td style="background-color:#DCDCDC;">{{$value4['total_size']}}</td>
          </tr>
          @endif
          @endforeach
        </table>
        <br>
      @endforeach
    </body>
</html>