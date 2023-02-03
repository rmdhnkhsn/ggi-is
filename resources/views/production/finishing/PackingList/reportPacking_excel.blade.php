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
        <?php 
          // format judul 
          $cek_jumlah_size = collect($data->semua_ukuran)->groupBy('nama_size')->count();
          $colspan=$cek_jumlah_size-1;
          $data_warehouse = collect($data->size)->implode('warehouse');
        ?>
        <table style="width:1300px">
            <tr>
                @if ($data->action == 'PACKING')
                <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PERFORMA PACKING REPORT</th>
                @else
                <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
                @endif
            </tr>
            <tr>
                <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
            </tr>
            <br>
            <tr>
                <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">{{ $data->judul }}</th>
            </tr>
            <tr>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->buyer }} </th>
                <th colspan="{{$colspan}}" style="font-weight:bold;text-align:center;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OFF CTN</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $dataSizeJumlahOFFctn }} </th>
            </tr>
            <tr>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">STYLE</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->style }} </th>
                <th colspan="{{$colspan}}" style="font-weight:bold;text-align:center;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">QTY ORDER</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{$data->qty }}</th>
            </tr>
            <tr>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OR Number</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->or_number }} </th>
                <th colspan="{{$colspan}}" style="font-weight:bold;text-align:center;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">DATE </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->tanggal }} </th>
            </tr>
            <tr>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">WO</th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->wo }} </th>
                <th colspan="{{$colspan}}" style="font-weight:bold;text-align:center;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">NO CONTRACT </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data->no_kontrak }}</th>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">CTN CODE</th>
                    @if($data->buyer =='MARUBENI CORPORATION JEPANG' || ($data->buyer =='MARUBENI FASHION LINK LTD.'))
                      @if($data_warehouse != null)
                      <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                      @endif
                    @endif
                    @if($data->buyer =='AGRON, INC.' ||  $data->buyer =='AGRON, INC.'|| $data->buyer == 'ADIDAS COSTCO AUSTRALIA')
                    <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
                    @else
                    <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
                    @endif
                    <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">COLOR CODE</th>
                    @foreach($dataSize as $key => $value)
                        <th style="width:4%;font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">{{$key}}</th>
                    @endforeach
                    <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">QTY SIZE</th>
                    <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SATUAN</th>
                    <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                    <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $counter = 1;
                    $total = 0;
                    $nw = 0;
                    $gw = 0;
                ?>
                @foreach($data->size as $key => $value)
                    <?php
                        $all_size = collect($value->all_size)->first();
                        $jumlah_size = collect($value->all_size)->sum('jumlah_size');
                    ?>
                    @for($z=1; $z<=$value->qty_carton; $z++)
                    <tr>
                        <td style="text-align:center;">{{ $counter }}</td>
                        @if($data->buyer =='MARUBENI CORPORATION JEPANG' || ($data->buyer =='MARUBENI FASHION LINK LTD.'))
                        @if($data_warehouse!=null)
                        <td style="text-align:center;">{{$value->warehouse}}</td>
                        @endif
                        @endif
                        <td style="text-align:center;">{{$all_size->style}}</td>
                        <td style="text-align:center;">{{$all_size->color_code}}</td>
                        @foreach($value->all_size as $key2 => $value2)
                        <td style="text-align:center;">{{$value2->jumlah_size}}</td>
                        @endforeach
                        <td style="text-align:center;">{{$jumlah_size}}</td>
                        <td style="text-align:center;">{{ $value->satuan }}</td>
                        <td style="text-align:center;">{{ $value->NW }}</td>
                        <td style="text-align:center;">{{ $value->GW }}</td>
                    </tr>
                    @php
                        $total += $jumlah_size;
                        $nw += $value->NW;
                        $gw += $value->GW;
                    @endphp
                    <?php $counter++ ?>
                    @endfor
                @endforeach
                <tr>
                    <td style="font-weight:bold;text-align:center;background-color:#8e948c;" ></td>
                    @if($data->buyer =='MARUBENI CORPORATION JEPANG' || ($data->buyer =='MARUBENI FASHION LINK LTD.'))
                      @if($data_warehouse != null)
                      <td colspan="3" style="font-weight:bold;text-align:center;background-color:#8e948c;">TOTAL</td>
                      @else
                      <td colspan="2" style="font-weight:bold;text-align:center;background-color:#8e948c;">TOTAL</td>
                      @endif
                    @else
                    <td colspan="2" style="font-weight:bold;text-align:center;background-color:#8e948c;">TOTAL</td>
                    @endif
                    <?php
                        $cobain = [];
                        foreach ($dataSize as $key => $value) {
                            $data_allsize = collect($value)->where('jumlah_size','!=', null);
                            foreach ($value as $key2 => $value2) {
                                $dicobain[] = [ 
                                    'nama_size' => $key,
                                    'jumlah_nya' => $jumlah_awal = $value2->jumlah_size * $value2->qty_carton
                                ];  
                            }
                        }
                        $jumlah_kedua = collect($dicobain)->groupby('nama_size');
                    ?>
                    @foreach($jumlah_kedua as $key => $value)
                    <?php
                        $total_keseluruhan = collect($value)->sum('jumlah_nya');
                    ?>
                    @if($total_keseluruhan == 0)
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;"></td>
                    @else
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$total_keseluruhan}}</td>
                    @endif
                    @endforeach
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$total}}</td>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;"></td>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$nw}}</td>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$gw}}</td>
                </tr>
            </tbody>
        </table>
      <br>
      <br>
    </body>
</html>
      

                     


