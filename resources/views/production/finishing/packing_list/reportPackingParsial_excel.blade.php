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
      
      <table style="width:1300px">
        <tr>
           <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
            
        </tr>
        <tr>
          @foreach ($dataPackingList as $item)
            <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">{{ $item['packing_list'] }}</th>
            @endforeach
        </tr>
        <br>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data->buyer }} </th>
             
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OFF CTN</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $qtyPartlist}} </th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">STYLE</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data->style }} </th>
           
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">QTY ORDER</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{$data->qty }}</th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OR Number</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data->or_number }} </th>
            
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">DATE </th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data->tanggal }} </th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">WO</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data->wo }} </th>
              
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">NO CONTRACT </th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->no_kontrak }}</th>
          </tr>
      </table>
      <br>

      <table style="width:100%">
        <thead>
            <tr>
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">CTN CODE</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">COLOR CODE</th>
                @if($data->warehouse ==null)

                @else
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                
                @endif
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>

                @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
                @endforeach
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">QTY SIZE</th>

                
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SATUAN</th>

                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tes as $key =>$value)
                
            <tr>
                <td style="text-align:center;">{{ $loop->iteration }}</td>
                <td style="text-align:center;">{{ $value['color_code'] }}</td>
                @if ($value['warehouse']== null )

                @elseif ($value['warehouse'] )
                <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                @endif
                <td style="text-align:center;">{{ $value['article'] }}</td>
               @foreach($dataByNamaSize as $key4=>$value4)
                  <?php 
                      $a=collect($dataSizePartlist);
                      // dd($a);
                      $qty_sizeJumlah = collect($a)->where('carton', $value['carton'])->sum('jumlah_size');
                      $cek_data = $a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->count();
                      if ($cek_data != 0) {
                          $jumlah=$a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->first();
                          $qty=$jumlah['jumlah_size'];
                      }
                      else{
                      $qty='0';
                      }
                  ?>
                  <td style="text-align:center;">{{ $qty }}</td>
                  @endforeach
                <td style="text-align:center;">{{ $qty_sizeJumlah }}</td>
                <td style="text-align:center;">{{ $value['satuan'] }}</td>
                <td style="text-align:center;">{{ $value['NW'] }}</td>
                <td style="text-align:center;">{{ $value['GW'] }}</td>
            </tr>
            @endforeach
            
        </tbody>
      </table>
      <br>
      <br>
    </body>
</html>
      

                     


