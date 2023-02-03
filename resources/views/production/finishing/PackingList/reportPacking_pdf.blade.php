<html>
    <head>
    <style>
        table,tr, td, th {
        border: 1px solid black;
        text-align:center;
        font-size:12px;
        padding:3px;
        margin-bottom: 0;
        }

        .header tr, .header th {
            border: none !important;
        }

        table {
            border-collapse: collapse;
            font-size:12px;
        }
            #tabel{
            width:100%;
            height: auto;
            padding:4px;
            border: 3px solid grey;
            background:white;
            align ; left;
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
        h3{
            margin-bottom: -10px;
        }
        h4{
            margin-top: -15px;
        }

        .headerLogo {

        }
        .logoGistex {
            position: relative;
        }
        .title-side {
            position: absolute;
            top: -30px;
            left: 230px;
            align-items: center;
        }

        .imgSMV {
            height: 250px;
            width: 300;
            border-radius: 6px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.082);
        }
        
        .tables { display: table; width: 100%;}
        .tables-row { display: table-row; }
        .tables-cell { display: table-cell; padding: 1em; }
        .page_break { page-break-before: always; }
        </style>
    </head>
    <body> 
        <div class="content-wrapper f-poppins">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <?php 
                                $data_warehouse = collect($data->size)->implode('warehouse');
                                // dd($data_warehouse);
                            ?>
                            <div class="card-body" style="overflow:scroll;">
                                <!-- Header Logo  -->
                                <div class="headerLogo">
                                    <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}">
                                    <div class="title-side">
                                        @if ($data->action == 'PACKING')
                                        <center><h2 style="font-weight:bold;">PERFORMA PACKING REPORT</h2></center>
                                        @else
                                        <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                                        @endif
                                        <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                                    </div>
                                </div>
                                <br>
                                <h4>{{ $data->judul }}</h4>
                                <!-- BUYER,STYLE,OR Number,WO -->
                                <table style="width: 100%; border:none !important" class="header">
                                    <tr>
                                        <th style="text-align: left; width:15%">BUYER</th>
                                        <th style="text-align: left; width:43%">: {{ $data->buyer }} </th>
                                        <th style="text-align: left; width: 15%">OFF CTN</th>
                                        <th style="text-align: left">: {{ $dataSizeJumlahOFFctn}} </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">STYLE</th>
                                        <th style="text-align: left; width:43%">: {{ $data->style }} </th>
                                        <th style="text-align: left; width: 15%">QTY ORDER </th>
                                        <th style="text-align: left">: {{ $data->qty }}</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">OR Number</th>
                                        <th style="text-align: left; width:43%">: {{ $data->or_number }} </th>
                                        <th style="text-align: left; width: 15%">DATE </th>
                                        <th style="text-align: left">: {{ $data->tanggal }} </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">WO</th>
                                        <th style="text-align: left; width:43%">: {{ $data->wo }} </th>
                                        <th style="text-align: left; width: 15%">NO CONTRACT </th>
                                        <th style="text-align: left">: {{ $data->no_kontrak }} </th>
                                    </tr>
                                </table>
                                <br>
                                <!-- End  -->
                                <!-- WAREHOUSE, ARTICLE, STYLE, COLOR CODE, QTY SIZE ker menta--> 
                                <table style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN CODE</th>
                                            @if($data->buyer =='MARUBENI CORPORATION JEPANG' || $data->buyer =='MARUBENI FASHION LINK LTD.')
                                                @if($data_warehouse != null)
                                                <th style="text-align:center;">WAREHOUSE</th>
                                                @endif
                                            @endif
                                            
                                            @if($data->buyer =='AGRON, INC.')
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                            @else
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                            @endif
                                            <th style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR CODE</th>
                                            <!-- Macam macam size yang ada  -->
                                            <?php
                                                $macamSize = collect($data->semua_ukuran)->groupBy('nama_size');
                                                // dd($macamSize);
                                            ?>
                                            @foreach($dataSize as $key => $value)
                                                <th style="width:4%;">{{$key}}</th>
                                            @endforeach
                                            <th style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY SIZE</th>
                                            <th style="font-weight:bold;">SATUAN</th>
                                            <th style="font-weight:bold;">NW</th>
                                            <th style="font-weight:bold;">GW</th>
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
                                                    @if($data->buyer == 'MARUBENI CORPORATION JEPANG' || ($data->buyer =='MARUBENI FASHION LINK LTD.'))
                                                        @if($data_warehouse != null)
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
                                            @if($data->buyer =='MARUBENI CORPORATION JEPANG' || ($data->buyer =='MARUBENI FASHION LINK LTD.'))
                                                @if($data_warehouse != null)
                                                <td colspan="4">TOTAL</td>
                                                @else
                                                <td colspan="3">TOTAL</td>
                                                @endif
                                            @else
                                            <td colspan="3">TOTAL</td>
                                            @endif
                                            <?php
                                                $dicobain = [];
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
                                                // dd($jumlah_kedua);
                                            ?>
                                            @foreach($jumlah_kedua as $key => $value)
                                            <?php
                                                $total_keseluruhan = collect($value)->sum('jumlah_nya');
                                            ?>
                                            @if($total_keseluruhan == 0)
                                            <td></td>
                                            @else
                                            <td>{{$total_keseluruhan}}</td>
                                            @endif
                                            @endforeach
                                            <td>{{$total}}</td>
                                            <td></td>
                                            <td>{{$nw}}</td>
                                            <td>{{$gw}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </body>
</html>

                     


