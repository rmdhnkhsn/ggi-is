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
          <td colspan="{{$jumlah}}" style="font-weight:bold;font-size:16px;border:1px black solid;text-align:center;" >Measurement</td>
        </tr>  
      </table>
      <table border="1">
        <tr>
          <td colspan="{{$jumlah}}" style="font-weight:bold;font-size:12px;border:1px black solid;">SPEC</td>
        </tr>
        <tr>
          <th>POM</th>
          <th>Description</th>
          <th>Tol(+)</th>
          <th>Tol(-)</th>
          @foreach ($master_data->rekap_size->toArray() as $column => $field)
              @if (str_contains($column,'size')&&($field!==null))
                <th>{{$field}}</th>
              @endif
          @endforeach
        </tr>
        @foreach($master_data->measurement->where('tipe','SPEC')->toArray() as $key => $value)
        @php $i=1 @endphp
          <tr>
            <td>{{$value['pom']}}</td>
            <td>{{$value['description']}}</td>
            <td>{{$value['tol_positif']}}</td>
            <td>{{$value['tol_negatif']}}</td>
            @foreach ($master_data->rekap_size->toArray() as $column => $field)
                @if (str_contains($column,'size')&&($field!==null))
                  <td>{{$value['size'.$i]}}</td>
                  @php $i+=1 @endphp
                @endif
            @endforeach
          </tr>
        @endforeach
      </table>
      <br>
      <table border="1">
        <tr>
          <td colspan="{{$jumlah}}" style="font-weight:bold;font-size:12px;border:1px black solid;">PATTERN</td>
        </tr>
        <tr>
          <th>POM</th>
          <th>Description</th>
          <th>Tol(+)</th>
          <th>Tol(-)</th>
          @foreach ($master_data->rekap_size->toArray() as $column => $field)
              @if (str_contains($column,'size')&&($field!==null))
                <th>{{$field}}</th>
              @endif
          @endforeach
        </tr>
        @foreach($master_data->measurement->where('tipe','PATTERN')->toArray() as $key => $value)
          @php $i=1 @endphp
            <tr>
              <td>{{$value['pom']}}</td>
              <td>{{$value['description']}}</td>
              <td>{{$value['tol_positif']}}</td>
              <td>{{$value['tol_negatif']}}</td>
              @foreach ($master_data->rekap_size->toArray() as $column => $field)
                  @if (str_contains($column,'size')&&($field!==null))
                    <td>{{$value['size'.$i]}}</td>
                    @php $i+=1 @endphp
                  @endif
              @endforeach
            </tr>
        @endforeach
      </table>
    </body>
</html>