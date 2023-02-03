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
            $semuadataSize = [];
            $data_semua_size = [];
            foreach ($data as $key => $value) {
                foreach ($value->size as $key2 => $value2) {
                    foreach ($value2->all_size as $key3 => $value3) {
                        $semuadataSize[]=[
                            'nama_size' => $value3->nama_size,
                            'jumlah_size' => $value3->jumlah_size,
                            'qty_carton' => $value3->qty_carton
                        ];
                    }
                }
            }
            // dd($semuadataSize);
            $groupBynamaSize = collect($semuadataSize)->groupBy('nama_size');
            $cobain = [];
            foreach ($groupBynamaSize as $key => $value) {
                $data_allsize = collect($value)->where('jumlah_size','!=', null);
                foreach ($data_allsize as $key2 => $value2) {
                    $dicobain[] = [ 
                        'nama_size' => $key,
                        'jumlah_nya' => $value2['jumlah_size'] * $value2['qty_carton']
                    ];  
                }
            }
            $jumlah_kedua = collect($dicobain)->groupby('nama_size');
        ?>
        <table style="width:1300px">
            <tr>
                <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
            </tr>
            <tr>
                <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
            </tr>
            <tr>
                <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">BUYER : {{$namaBuyer}}</th>
            </tr>
      </table>
      <br>
        <table style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">CTN CODE</th>
                    @if($namaBuyer =='MARUBENI CORPORATION JEPANG' || $namaBuyer =='MARUBENI FASHION LINK LTD.')
                    <th style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">WAREHOUSE</th>
                    @endif
                    <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">WO</th>
                    <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">CONTRACT NUMBER</th>
                    @if($namaBuyer  =='AGRON, INC.')
                    <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">ARTICLE</th>
                    @else
                    <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">STYLE</th>
                    @endif
                    <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">PO</th>
                    <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">COLOR CODE</th>
                    @foreach($jumlah_kedua as $key =>$value)
                    <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">{{$key}}</th>
                    @endforeach
                    <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">JUMLAH QTY </th>
                    <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">NW</th>
                    <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">GW</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $counter = 1;
                    $total = 0;
                    $nw = 0;
                    $gw = 0;
                ?>
               @foreach($data as $key => $value)
                    @foreach($value->size as $key2 => $value2)
                        <?php
                            $all_size = collect($value2->all_size)->first();
                            $jumlah_size = collect($value2->all_size)->sum('jumlah_size');
                            $total_size = collect($jumlah_kedua)->count();
                            $adasizenya = collect($value2->all_size)->where('jumlah_size','!=', null);
                        ?>
                        @for($z=1; $z<=$value2->qty_carton; $z++)
                            <tr>
                                <td style="text-align:center;">{{ $counter }}</td>
                                @if($namaBuyer =='MARUBENI CORPORATION JEPANG' || $namaBuyer =='MARUBENI FASHION LINK LTD.')
                                <td style="text-align:center;">{{ $all_size->warehouse }}</td>
                                @endif
                                <td style="text-align:center;">{{ $all_size->wo }}</td>
                                <td style="text-align:center;">{{ $all_size->no_kontrak }}</td>
                                <td style="text-align:center;">{{ $all_size->style }}</td>
                                <td style="text-align:center;">{{ $all_size->po }}</td>
                                <td style="text-align:center;">{{$all_size->color_code}}</td>
                                @foreach($jumlah_kedua as $key3 =>$value3)
                                    <?php
                                        $cobain = collect($value2->all_size)->where('nama_size', $key3)->first();
                                    ?>
                                    @if($cobain != null)
                                    <td style="text-align:center;">{{$cobain->jumlah_size}}</td>
                                    @else
                                    <td style="text-align:center;"></td>
                                    @endif
                                @endforeach
                                <td style="text-align:center;">{{$jumlah_size}}</td>
                                <td style="text-align:center;">{{ $value2->NW }}</td>
                                <td style="text-align:center;">{{ $value2->GW }}</td>
                                @php
                                    $total += $jumlah_size;
                                    $nw += $value2->NW;
                                    $gw += $value2->GW;
                                @endphp
                            </tr>
                        <?php $counter++ ?>
                        @endfor
                    @endforeach
                @endforeach
                <tr>
                    @if($namaBuyer =='MARUBENI CORPORATION JEPANG' || $namaBuyer =='MARUBENI FASHION LINK LTD.')
                    <td colspan="7" style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">TOTAL</td>
                    @else
                    <td colspan="6" style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">TOTAL</td>
                    @endif
                    @foreach($jumlah_kedua as $key => $value)
                    <?php
                        $total_keseluruhan = collect($value)->sum('jumlah_nya');
                    ?>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$total_keseluruhan}}</td>
                    @endforeach
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$total}}</td>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$nw}}</td>
                    <td style="font-weight:bold;text-align:center;width:100px;background-color:#8e948c;">{{$gw}}</td>
                </tr>
            </tbody>
        </table>
      <br>
    </body>
</html>
      




                     


