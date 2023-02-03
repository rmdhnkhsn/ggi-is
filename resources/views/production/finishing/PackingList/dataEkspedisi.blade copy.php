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
                left: 600px;
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
                                    <div class="card-body" style="overflow:scroll;">
                                        <div class="headerLogo">
                                            <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}">
                                            <div class="title-side">
                                            <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                                                <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                                            </div>
                                        </div>
                                    <br>
                                    <h4>BUYER : {{$namaBuyer}}</h4>
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN CODE</th>
                                                @if($namaBuyer =='MARUBENI CORPORATION JEPANG' || $namaBuyer =='MARUBENI FASHION LINK LTD.')
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">WAREHOUSE</th>
                                                @endif
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</th>
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTRACT NUMBER</th>
                                                @if($namaBuyer  == 'AGRON, INC.')
                                                    <th  style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                                @else
                                                    <th  style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                                @endif

                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">PO</th>
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR CODE</th>
                                                @foreach($dataByNamaSize as $key =>$value)
                                                <th style="text-align:center;">{{$key}}</th>
                                                @endforeach
                                                <th style="font-weight:bold;padding-right:15px;padding-left:15px;">JUMLAH QTY </th>
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
                                            @foreach($dataSize as $key => $value)
                                                <?php
                                                    $all_size = collect($value->all_size)->first();
                                                    $jumlah_size = collect($value->all_size)->sum('jumlah_size');
                                                    $total_size = collect($dataByNamaSize)->count();
                                                    $adasizenya = collect($value->all_size)->where('jumlah_size','!=', null);
                                                ?>
                                                @for($z=1; $z<=$value->qty_carton; $z++)
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
                                                        @foreach($dataByNamaSize as $key2 =>$value2)
                                                            <?php
                                                                $cobain = collect($value->all_size)->where('nama_size', $key2)->first();
                                                            ?>
                                                            @if($cobain != null)
                                                            <td style="text-align:center;">{{$cobain->jumlah_size}}</td>
                                                            @else
                                                            <td style="text-align:center;"></td>
                                                            @endif
                                                        @endforeach
                                                        <td style="text-align:center;">{{$jumlah_size}}</td>
                                                        <td style="text-align:center;">{{ $value->NW }}</td>
                                                        <td style="text-align:center;">{{ $value->GW }}</td>
                                                        @php
                                                            $total += $jumlah_size;
                                                            $nw += $value->NW;
                                                            $gw += $value->GW;
                                                        @endphp
                                                    </tr>
                                                <?php $counter++ ?>
                                                @endfor
                                            @endforeach
                                            <tr>
                                                @if($namaBuyer =='MARUBENI CORPORATION JEPANG' || $namaBuyer =='MARUBENI FASHION LINK LTD.')
                                                <td colspan="7">TOTAL</td>
                                                @else
                                                <td colspan="6">TOTAL</td>
                                                @endif
                                                <?php 
                                                    $dicobain = [];
                                                    foreach ($dataByNamaSize as $key => $value) {
                                                        $data_allsize = collect($value)->where('jumlah_size','!=', null);
                                                        foreach ($data_allsize as $key2 => $value2) {
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
                                                <td>{{$total_keseluruhan}}</td>
                                                @endforeach
                                                <td>{{$total}}</td>
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
            </div>
        </section>  
    </body>
</html>

                     


