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
                    <div class="card-body" style="overflow:scroll;">
                        <div class="headerLogo">
                            <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}">
                            <div class="title-side">
                                @if ($data[0]->action == 'PACKING')
                                <center><h2 style="font-weight:bold;">PERFORMA PACKING REPORT</h2></center>
                                @else
                                    
                                <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                                @endif
                                <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                            </div>
                        </div>
                        <br>
                          <h4>{{ $data[0]->judul }}</h4>
                          <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">BUYER</th>
                                  <th style="text-align: left; width:43%">:{{ $data[0]->buyer }} </th>
                                  <th style="text-align: left; width: 15%">OFF CTN</th>
                                  <th style="text-align: left">:{{ $dataSizeJumlahOFFctn}} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">STYLE</th>
                                  <th style="text-align: left; width:43%">:{{ $data[0]->style }} </th>
                                  <th style="text-align: left; width: 15%">QTY ORDER </th>
                                  <th style="text-align: left">: {{ $data[0]->qty }}</th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">OR Number</th>
                                  <th style="text-align: left; width:43%">:{{ $data[0]->or_number }} </th>
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">:{{ $data[0]->tanggal }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">WO</th>
                                  <th style="text-align: left; width:43%">:{{ $data[0]->wo }} </th>
                                  <th style="text-align: left; width: 15%">NO CONTRACT </th>
                                  <th style="text-align: left">:{{ $data[0]->no_kontrak }} </th>
                              </tr>
                          </table>
                          <br>

                         <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN CODE</th>
                                        @if($data[0]->warehouse =='MARUBENI CORPORATION JEPANG' || ($data[0]->buyer =='MARUBENI FASHION LINK LTD.'))
                                        <th style="text-align:center;">WAREHOUSE</th>
                                        @else
                                        @endif
                                        
                                        @if($data[0]->buyer =='AGRON, INC.')
                                            <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                        @else
                                            <th style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                        @endif
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR CODE</th>
                                        @foreach($dataByNamaSize as $key2=>$value2)
                                        <th>{{$value2['nama_size']}}</th>
                                        @endforeach
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY SIZE</th>
                                        <th style="font-weight:bold;">SATUAN</th>
                                        <th style="font-weight:bold;">NW</th>
                                        <th style="font-weight:bold;">GW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter =1;
                                    @endphp
                                   @foreach ($packingSizeRaw as $dataPackingSize) 
                                    <?php
                                     $colors =  explode("|",$dataPackingSize->colors); 
                                     $colorsLen = count($colors);
                                     ?> 
                                       @for($i = 0; $i < $dataPackingSize->qty_carton; $i++)
                                            @for ($c = 0 ; $c < $colorsLen ; $c++)
                                                 <tr>
                                                    <td style="text-align:center;">{{ $counter }}</td>
                                                     @if ( !empty($dataPackingSize->warehouse))
                                                    <td style="text-align:center;">{{ $dataPackingSize->warehouse }}</td>
                                                @endif
                                                     <td style="text-align:center;">{{ $dataPackingSize->style }}</td>
                                                     <td style="text-align:center;">{{ $colors[$c] }}</td>
                                                  
                                                     @php
                                                    $sum = 0;
                                                    @endphp
                                                 <?php
                                                    $sumQty=[];
                                                    ?>
                                                    @foreach($dataByNamaSize as $key4=>$value4)
                                                            <?php 
                                                            $a=collect($dataSizeJumlah);
                                                            $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $colors[$c])->where('id_packing_report', $dataPackingSize->id)->count();
                                                            $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code',$colors[$c])->where('id_packing_report', $dataPackingSize->id) 
                                                            ->first();
                                                            if ($cek_data != 0 && $jumlah!= null) {
                                                                // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                                $qty=$jumlah['jumlah_size'];
                                                            }
                                                            else{
                                                            $qty='0';
                                                            }
                                                            $sumQty[]=$qty;
                                                            ?>
                                                            
                                                    <td style="text-align:center;">{{ $qty }}</td>
                                                        @endforeach
                                                    <?php
                                                        $a=array_sum($sumQty);
                                                        $dataJumlah = $a;
                                                    ?>
                                                    <td style="text-align:center;">{{ $dataJumlah }}</td>
                                                    <td style="text-align:center;">{{ $dataPackingSize->satuan }}</td>
                                                    <td style="text-align:center;">{{ $dataPackingSize->NW }}</td>
                                                    <td style="text-align:center;">{{ $dataPackingSize->GW }}</td>
                                                </tr>
                                            @endfor
                                            <?php $counter++ ?>
                                       @endfor
                                   @endforeach
                                   <tr>
                                        <td></td>
                                        <td colspan="2">TOTAL</td>
                                        @if($data[0]->warehouse =='MARUBENI CORPORATION JEPANG' || ($data[0]->buyer =='MARUBENI FASHION LINK LTD.'))
                                        <td style="text-align:center;"></td>
                                        @else
                                        @endif
                                        @foreach($dataByNamaSize as $key5=>$value5)
                                                <?php 
                                                    $a=collect($JumlahTotalSize);
                                                    $qty_sizeJumlah = collect($a)->where('nama_size',$value5['nama_size'])->sum('jumlah_size');
                                                    if ($qty_sizeJumlah>0) {
                                                        $qty_sizeJumlah=$qty_sizeJumlah;
                                                    }
                                                    else{
                                                        $qty_sizeJumlah="";
                                                    }
                                                ?>
                                                
                                                <td>{{ $qty_sizeJumlah }}</td>
                                            @endforeach
                                            <?php 
                                                $a=collect($JumlahTotalSize);
                                                $total = collect($a)->sum('jumlah_size');
                                            ?>
                                            
                                        <td>{{ $total }}</td>
                                        <td></td>  
                                        
                                                <?php 
                                                    $a=collect($JumlahSize);
                                                    $qtynw = collect($a)->sum('NW');
                                                ?>
                                        <td style="text-align:center;">{{ $qtynw }}</td>
                                      
                                                <?php 
                                                    $a=collect($JumlahSize);
                                                    $qtyGW = collect($a)->sum('GW');
                                                ?>
                                      
                                      <td style="text-align:center;">{{ $qtyGW }}</td>
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

                     


