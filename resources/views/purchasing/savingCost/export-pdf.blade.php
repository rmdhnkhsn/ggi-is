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
        <center><font style="font-weight:bold;font-size:20px;">SAVING COST</font></center>
        <center><font style="font-weight:bold;font-size:15px;">{{$kodeBulan}} {{$tahun}}</font></center>
        <br>
        <table style="width:1260px">
            <tr>
                <td style="font-weight:bold;">ID</td>
                <td style="font-weight:bold;">BUYER</td>
                <td style="font-weight:bold;">ITEM</td>
                <td style="font-weight:bold;">BEFORE</td>
                <td style="font-weight:bold;">AMOUNT BEFORE</td>
                <td style="font-weight:bold;">AFTER</td>
                <td style="font-weight:bold;">AMOUNT AFTER</td>
                <td style="font-weight:bold;">VALID DATE</td>
                <td style="font-weight:bold;">OLD PRICE</td>
                <td style="font-weight:bold;">NEW PRICE</td>
                <td style="font-weight:bold;">KURS</td>
                <td style="font-weight:bold;">PO</td>
                <td style="font-weight:bold;">QTY</td>
                <td style="font-weight:bold;">UOM</td>
                <td style="font-weight:bold;">AMOUNT SAVING</td>
                <td style="font-weight:bold;">SAVING</td>
                <td style="font-weight:bold;">REMARKS</td>
            </tr>
            @foreach($data as $key => $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->buyer_name}}</td>
                <td>{{$value->item}}</td>
                <td>{{$value->before}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_before, 2, ",", ".")}}</td>
                <td>{{$value->after}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_after, 2, ",", ".")}}</td>
                <td>{{$value->valid_date}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->old_price, 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->new_price, 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">IDR </span>{{number_format($value->kurs, 2, ",", ".")}}</td>
                <td>{{$value->no_po}}</td>
                <td>{{$value->qty}}</td>
                <td>{{$value->uom}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_saving, 2, ",", ".")}}</td>
                <td>{{$value->saving}}</td>
                <td>{{$value->remark}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>