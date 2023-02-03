<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
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
  
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-before: always; }
.none {color:#fff}
.tbl-none tr th, .tbl-none tr td {border: 1px solid #fff}
</style>
</head>
    <body> 
    <section class="content-header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body" style="overflow:scroll;">
                    {{-- <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}"> --}}
                    <table class="tbl-none" style="width: 100%; !important;margin-bottom:2rem" >
                      <tr>
                          <th width="70%" style="padding-top:60px;text-align:left">
                              <img src="{{ storage_path('/app/public/databaseSmv/img/gistex-red.svg') }}">
                              <span style="font-size:28px;margin-left:24px">PT. GISTEX GARMEN INDONESIA</span>
                          </th>
                          <td width="10%" style="font-size:14px;text-align:right;padding:right:12px">
                              <span style="width:200px;position:relative;top:0">Office</span> <span class="ml-2">:</span>
                              <div class="none">x</div>
                              <div class="none">x</div>
                              <span style="width:200px;position:relative;top:0">Factory</span> <span class="ml-2">:</span>
                              <div class="none">x</div>
                              <div class="none">x</div>
                              <div class="none">x</div>
                              <div class="none">x</div>
                          </td>
                          <td width="20%" style="font-size:14px;text-align:left">
                              <span >Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</span><br/>
                              <div class="none">x</div>
                              <span >Jl. Panyawungan KM.19<br/>Cileunyi Wetan, Cileunyi<br/>Kab. Bandung, Jawabarat 40393<br/>Telp : (62-002) - 7796683, 7796684, 7798885<br/>Fax : (62-002) - 7796686</span>
                          </td>
                      </tr>
                    </table>
                    <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                    <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                    <br>
                         
@if($collectionData['buyer']  =='AGRON, INC.')
{{-- CTN NO|TTL CTN|WO|Article|PO|Colour|Size|TTL PCS|Unit Of Mesuremen|NW|GW --}}
                          <table style="width: 100%; border:none !important" class="header">
                            {{-- <tr>
                                <th style="text-align: left;">INVOICE</th>
                                <th style="text-align: left;">:{{ $collectionData['invoice'] }}</th>
                                    @if (auth()->user()->branch == 'CLN')
                                    <th style="text-align: left;">NO SURAT JALAN</th>
                                    <th style="text-align: left">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
                                    @else
                                    <th style="text-align: left;">NO SURAT JALAN</th>
                                    @endif
                                <th style="text-align: left;">SEAL NO</th>
                                <th style="text-align: left;">:{{ $collectionData['no_seal'] }}</th>
                            </tr>
                            <tr>
                                <th style="text-align: left">BUYER</th>
                                <th style="text-align: left; width:35%">:{{ $collectionData['buyer'] }} </th>
                                @if (auth()->user()->branch == 'CLN')
                                <th style="text-align: left; width: 15%">DATE </th>
                                <th style="text-align: left">: {{ $collectionData['tanggal_surat'] }}</th>
                                @else
                                <th style="text-align: left; width: 15%">DATE </th>
                                @endif
                            </tr>
                            <tr>
                                <th style="text-align: left">CONTAINER NO</th>
                                <th style="text-align: left; width:35%">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
                                @if (auth()->user()->branch == 'CLN')
                                <th style="text-align: left; width: 15%">SEAL NO </th>
                                <th style="text-align: left">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }} </th>
                                @else
                                <th style="text-align: left; width: 15%">SEAL NO </th>
                                @endif
                            </tr> --}}
                            <tr>
                              <th width="30%" style="text-align:left">
                                <div class="content">
                                  <span style="font-size:16px">INVOICE NO</span>
                                  <span style="margin-left:40px">:</span>
                                  <span style="font-size:16px;margin-left:10px">{{ $collectionData['invoice'] }}</span>
                                </div>
                                <div class="content">
                                  <span style="font-size:16px">DATE</span>
                                  <span style="margin-left:93px">:</span>
                                  <span style="font-size:16px;margin-left:10px">{{ $collectionData['tanggal_surat'] }}</span>
                                </div>
                              </th>
                              <th width="30%" style="text-align:left">
                                <div class="content">
                                  <span style="font-size:16px">CONTAINER NO :</span><br/>
                                  <span style="font-size:16px;font-weight:400">{{ $collectionData['no_kontainer'] }}</span><br/>
                                  <span style="font-size:16px;font-weight:400">{{ $collectionData['no_kontainer2'] }}</span>
                                </div>
                              </th>
                              <th width="40%" style="text-align:left">
                                <div class="content">
                                  <span style="font-size:16px">SEAL NO :</span><br/>
                                  <span style="font-size:16px;font-weight:400">{{ $collectionData['no_seal'] }}</span><br/>
                                  <span style="font-size:16px;font-weight:400">{{ $collectionData['no_seal2'] }}</span>
                                </div>
                              </th>
                            </tr>
                          </table>
                          <br>
                              <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CARTON NUMBER</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL CARTON</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WORK NO</th>
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTACT NO</th> --}}
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE NO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">PO NO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</th>
                                        <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;padding-right:15px;padding-left:15px;">SIZE</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL QTY</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIT OF MESUREMENT</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">N.W (KGS)</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">G.W (KGS)</th>
                                      </tr>
                                      <tr>
                                        @foreach($dataByNamaSize as $key2=>$value2)
                                          <th>{{$value2['nama_size']}}</th>
                                        @endforeach
                                      </tr>
                                </thead>
                                <tbody>   
                                    <?php
                                    $totalGW=0;
                                    $dataJumlahPCS=0;
                                    ?>
                                      @foreach ($dataEkspedisiPacking as $key =>$value7)
                                        <?php 
                                          $count=0; 
                                          $no=1;
                                          $sum_qty_carton3=0;
                                          $sum_dataJumlah=0;
                                          $sum_NWtotal=0;
                                          $sum_GWtotal=0;
                                        ?>
                                        @foreach ($value7 as $value)
                                      
                                          <?php
                                            $no=$no+$count;
                                            $count=$value['qty_carton3'];
                                            $a=$no + $count-1;
                                          ?>
                                          <tr>                      
                                            <td style="text-align:center;">{{ $no }}-{{ $a }}</td>
                                            <td style="text-align:center;">{{ $value['qty_carton3'] }}</td>
                                            <td style="text-align:center;">{{ $value['wo'] }}</td>
                                            <td style="text-align:center;">{{ $value['style'] }}</td>              
                                            <td style="text-align:center;">{{ $value['po'] }}</td>     
                                            <td style="text-align:center;">{{ $value['color_code'] }}</td>
                                            <?php
                                            $sumQty=[];
                                            ?>
                                            @foreach($dataByNamaSize as $key4=>$value4)
                                                  <?php 
                                                    $a=collect($dataSizeJumlah);
                                                    $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('nama_size', $value['nama_size'])->count();
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])
                                                    ->first();
                                                    if ($cek_data != 0 && $jumlah!= null) {
                                                        // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                        $qty=$jumlah['jumlah_size'];
                                                    }
                                                    else{
                                                    $qty='';
                                                    }
                                                    $sumQty[]=$qty;
                                                  ?>
                                                    
                                            <td style="text-align:center;">{{ $qty }}</td>
                                              @endforeach
                                                <?php
                                                  $a=array_sum($sumQty);
                                                  $dataJumlah = $a * $value['qty_carton3'];
                                                  $dataJumlahPCS = $dataJumlahPCS+$dataJumlah;
                                                  $total_nw[]=$value['NW_total'];
                                                  $total_gw[]=$value['GW_total'];

                                                ?>
                                            <td style="text-align:center;">{{ $dataJumlah }}</td>
                                            <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td>
                                            <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                                            <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                                          </tr>
                                       <?php
                                          $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                                          $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                                          $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                                          $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                                        ?>
                                        @endforeach
                                        <tr>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
                                            <td style="text-align:center;">{{ $sum_qty_carton3 }}</td>
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @foreach($dataByNamaSize as $key5=>$value5)
                                              <?php 
                                                  $a=collect($dataSizeJumlah);
                                                  $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->sum('jumlah_size');
                                                   if ($jumlah>0) {
                                                        $jumlah=$jumlah;
                                                    }
                                                    else{
                                                        $jumlah="";
                                                    }
                                              ?>
                                              
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $jumlah }}</td>
                                              @endforeach
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                                          </tr>
                                      @endforeach
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">GRAND TOTAL</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ $sumCarton }}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;" colspan="4"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"  colspan="{{ $dataJumlahPerSizeCount }}"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{$dataJumlahPCS}}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_nw) }}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_gw) }}</td>
                                    </tr>
                                </tbody>
                            </table>
@elseif ($collectionData['buyer']  =='MATSUOKA TRADING CO., LTD.')
{{-- CTN NO|TTL CTN|Style|Contract No|G Number|Size|TTL PCS|NW|GW --}}
 <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">INVOICE</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['invoice'] }}</th>
                                     @if (auth()->user()->branch == 'CLN')
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     <th style="text-align: left">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
                                     @else
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['buyer'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">: {{ $collectionData['tanggal_surat'] }}</th>
                                  @else
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">CONTAINER NO</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  <th style="text-align: left">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }} </th>
                                  @else
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  @endif
                              </tr>
                          </table>
                          <br>
                              <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN NO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL. CTN</th>
                                       
                                        {{--                                         
                                          @if($collectionData['buyer'] =='AGRON, INC.')
                                          <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                          @else --}}
                                          <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                          <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTACT NO</th>
                                        {{-- @endif --}}
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">PO</th> --}}
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</th> --}}
                                        <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;padding-right:15px;padding-left:15px;">SIZE</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL PCS</th>
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIT OF MESUREMENT</th> --}}
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NW</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">GW</th>
                                      </tr>
                                      <tr>
                                        @foreach($dataByNamaSize as $key2=>$value2)
                                          <th>{{$value2['nama_size']}}</th>
                                        @endforeach
                                      </tr>
                                </thead>
                                <tbody>   
                                    <?php
                                    $totalGW=0;
                                    $dataJumlahPCS=0;
                                    ?>
                                      @foreach ($dataEkspedisiPacking as $key =>$value7)
                                        <?php 
                                          $count=0; 
                                          $no=1;
                                          $sum_qty_carton3=0;
                                          $sum_dataJumlah=0;
                                          $sum_NWtotal=0;
                                          $sum_GWtotal=0;
                                        ?>
                                        @foreach ($value7 as $value)
                                      
                                          <?php
                                            $no=$no+$count;
                                            $count=$value['qty_carton3'];
                                            $a=$no + $count-1;
                                          ?>
                                          <tr>                      
                                            <td style="text-align:center;">{{ $no }}-{{ $a }}</td>
                                            <td style="text-align:center;">{{ $value['qty_carton3'] }}</td>
                                            {{-- <td style="text-align:center;">{{ $value['wo'] }}</td>
                                            @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                            @else
                                            @endif --}}
                                            <td style="text-align:center;">{{ $value['style'] }}</td>              
                                            <td style="text-align:center;">{{ $value['no_kontrak'] }}</td>
                                            {{-- <td style="text-align:center;">{{ $value['article'] }}</td> --}}
                                            {{-- <td style="text-align:center;">{{ $value['po'] }}</td>     
                                            <td style="text-align:center;">{{ $value['color_code'] }}</td> --}}
                                            <?php
                                            $sumQty=[];
                                            ?>
                                            @foreach($dataByNamaSize as $key4=>$value4)
                                                  <?php 
                                                    $a=collect($dataSizeJumlah);
                                                    $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('nama_size', $value['nama_size'])->count();
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])
                                                    ->first();
                                                    if ($cek_data != 0 && $jumlah!= null) {
                                                        // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                        $qty=$jumlah['jumlah_size'];
                                                    }
                                                    else{
                                                    $qty='';
                                                    }
                                                    $sumQty[]=$qty;
                                                  ?>
                                                    
                                            <td style="text-align:center;">{{ $qty }}</td>
                                              @endforeach
                                                <?php
                                                  $a=array_sum($sumQty);
                                                  $dataJumlah = $a * $value['qty_carton3'];
                                                  $dataJumlahPCS = $dataJumlahPCS+$dataJumlah;
                                                  $total_nw[]=$value['NW_total'];
                                                  $total_gw[]=$value['GW_total'];

                                                ?>
                                            <td style="text-align:center;">{{ $dataJumlah }}</td>
                                            {{-- <td style="text-align:center;">{{ $value['satuan'] }}</td> --}}
                                            <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                                            <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                                          </tr>
                                       <?php
                                          $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                                          $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                                          $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                                          $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                                        ?>
                                        @endforeach
                                        <tr>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
                                            <td style="text-align:center;">{{ $sum_qty_carton3 }}</td>
                                             {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @else
                                            @endif --}}
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @foreach($dataByNamaSize as $key5=>$value5)
                                              <?php 
                                                  $a=collect($dataSizeJumlah);
                                                  $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->sum('jumlah_size');
                                                   if ($jumlah>0) {
                                                        $jumlah=$jumlah;
                                                    }
                                                    else{
                                                        $jumlah="";
                                                    }
                                              ?>
                                              
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $jumlah }}</td>
                                              @endforeach
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                                            
                                          
                                          </tr>
                                      @endforeach
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">GRAND TOTAL</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ $sumCarton }}</td>
                                         {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                          <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                          @else --}}
                                          {{-- @endif --}}
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;" colspan="2"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"  colspan="{{ $dataJumlahPerSizeCount }}"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{$dataJumlahPCS}}</td>
                                        {{-- <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td> --}}
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_nw) }}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_gw) }}</td>
                                    </tr>
                                </tbody>
                            </table>
@elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
@if ($dataWo->warehouse != null)
 <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">INVOICE</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['invoice'] }}</th>
                                     @if (auth()->user()->branch == 'CLN')
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     <th style="text-align: left">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
                                     @else
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['buyer'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">: {{ $collectionData['tanggal_surat'] }}</th>
                                  @else
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">CONTAINER NO</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  <th style="text-align: left">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }} </th>
                                  @else
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  @endif
                              </tr>
                          </table>
                          <br>
                            <table style="width:100%">
                              <thead>
                                  <tr>
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN NO</th>
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL. CTN</th>
                                      {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</th> --}}
                                      @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WAREHOUSE</th>
                                      @else
                                      @endif
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTACT NO</th>
                                      
                                      @if($collectionData['buyer'] =='AGRON, INC.')
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                      @else
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                      @endif
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">PO</th>
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</th>
                                      <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;padding-right:15px;padding-left:15px;">SIZE</th>
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL PCS</th>
                                      {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIT OF MESUREMENT</th> --}}
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NW</th>
                                      <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">GW</th>
                                    </tr>
                                    <tr>
                                      @foreach($dataByNamaSize as $key2=>$value2)
                                        <th>{{$value2['nama_size']}}</th>
                                      @endforeach
                                    </tr>
                              </thead>
                              <tbody>   
                                  <?php
                                  $totalGW=0;
                                  $dataJumlahPCS=0;
                                  ?>
                                    @foreach ($dataEkspedisiPacking as $key =>$value7)
                                      <?php 
                                        $count=0; 
                                        $no=1;
                                        $sum_qty_carton3=0;
                                        $sum_dataJumlah=0;
                                        $sum_NWtotal=0;
                                        $sum_GWtotal=0;
                                      ?>
                                      @foreach ($value7 as $value)
                                    
                                        <?php
                                          $no=$no+$count;
                                          $count=$value['qty_carton3'];
                                          $a=$no + $count-1;
                                        ?>
                                        <tr>                      
                                          <td style="text-align:center;">{{ $no }}-{{ $a }}</td>
                                          <td style="text-align:center;">{{ $value['qty_carton3'] }}</td>
                                          {{-- <td style="text-align:center;">{{ $value['wo'] }}</td> --}}
                                          @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                          <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                          @else
                                          @endif
                                          <td style="text-align:center;">{{ $value['no_kontrak'] }}</td>
                                          <td style="text-align:center;">{{ $value['style'] }}</td>              
                                          {{-- <td style="text-align:center;">{{ $value['article'] }}</td> --}}
                                          <td style="text-align:center;">{{ $value['po'] }}</td>     
                                          <td style="text-align:center;">{{ $value['color_code'] }}</td>
                                          <?php
                                          $sumQty=[];
                                          ?>
                                          @foreach($dataByNamaSize as $key4=>$value4)
                                                <?php 
                                                  $a=collect($dataSizeJumlah);
                                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('nama_size', $value['nama_size'])->count();
                                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])
                                                  ->first();
                                                  if ($cek_data != 0 && $jumlah!= null) {
                                                      // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                      $qty=$jumlah['jumlah_size'];
                                                  }
                                                  else{
                                                  $qty='';
                                                  }
                                                  $sumQty[]=$qty;
                                                ?>
                                                  
                                          <td style="text-align:center;">{{ $qty }}</td>
                                            @endforeach
                                              <?php
                                                $a=array_sum($sumQty);
                                                $dataJumlah = $a * $value['qty_carton3'];
                                                $dataJumlahPCS = $dataJumlahPCS+$dataJumlah;
                                                $total_nw[]=$value['NW_total'];
                                                $total_gw[]=$value['GW_total'];

                                              ?>
                                          <td style="text-align:center;">{{ $dataJumlah }}</td>
                                          {{-- <td style="text-align:center;">{{ $value['satuan'] }}</td> --}}
                                          <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                                          <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                                        </tr>
                                    <?php
                                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                                      ?>
                                      @endforeach
                                      <tr>
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
                                          <td style="text-align:center;">{{ $sum_qty_carton3 }}</td>
                                          @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                          @else
                                          @endif
                                          {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                          @foreach($dataByNamaSize as $key5=>$value5)
                                            <?php 
                                                $a=collect($dataSizeJumlah);
                                                $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->sum('jumlah_size');
                                                if ($jumlah>0) {
                                                      $jumlah=$jumlah;
                                                  }
                                                  else{
                                                      $jumlah="";
                                                  }
                                            ?>
                                            
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $jumlah }}</td>
                                            @endforeach
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                                          {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                                          <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                                          
                                        
                                        </tr>
                                    @endforeach
                                  <tr>
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">GRAND TOTAL</td>
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ $sumCarton }}</td>
                                      @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                        @else
                                        @endif
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;" colspan="4"></td>
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"  colspan="{{ $dataJumlahPerSizeCount }}"></td>
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{$dataJumlahPCS}}</td>
                                      {{-- <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td> --}}
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_nw) }}</td>
                                      <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_gw) }}</td>
                                  </tr>
                              </tbody>
                            </table>
@else
 {{-- CTN NO|TTL CTN |Contract No|Style|Item|Size|TTL PCS|NW|GW --}}
  <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">INVOICE</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['invoice'] }}</th>
                                     @if (auth()->user()->branch == 'CLN')
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     <th style="text-align: left">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
                                     @else
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['buyer'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">: {{ $collectionData['tanggal_surat'] }}</th>
                                  @else
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">CONTAINER NO</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  <th style="text-align: left">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }} </th>
                                  @else
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  @endif
                              </tr>
                          </table>
                          <br>
                              <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN NO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL. CTN</th>
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</th> --}}
                                        {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WAREHOUSE</th>
                                        @else
                                        @endif --}}
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTACT NO</th>
                                        @if($collectionData['buyer'] =='AGRON, INC.')
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                        @else
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                        @endif
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">PO</th> --}}
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</th> --}}
                                        <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;padding-right:15px;padding-left:15px;">SIZE</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL PCS</th>
                                        {{-- <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIT OF MESUREMENT</th> --}}
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NW</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">GW</th>
                                      </tr>
                                      <tr>
                                        @foreach($dataByNamaSize as $key2=>$value2)
                                          <th>{{$value2['nama_size']}}</th>
                                        @endforeach
                                      </tr>
                                </thead>
                                <tbody>   
                                    <?php
                                    $totalGW=0;
                                    $dataJumlahPCS=0;
                                    ?>
                                      @foreach ($dataEkspedisiPacking as $key =>$value7)
                                        <?php 
                                          $count=0; 
                                          $no=1;
                                          $sum_qty_carton3=0;
                                          $sum_dataJumlah=0;
                                          $sum_NWtotal=0;
                                          $sum_GWtotal=0;
                                        ?>
                                        @foreach ($value7 as $value)
                                      
                                          <?php
                                            $no=$no+$count;
                                            $count=$value['qty_carton3'];
                                            $a=$no + $count-1;
                                          ?>
                                          <tr>                      
                                            <td style="text-align:center;">{{ $no }}-{{ $a }}</td>
                                            <td style="text-align:center;">{{ $value['qty_carton3'] }}</td>
                                            {{-- <td style="text-align:center;">{{ $value['wo'] }}</td>
                                            @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                            @else
                                            @endif --}}
                                            <td style="text-align:center;">{{ $value['no_kontrak'] }}</td>
                                            <td style="text-align:center;">{{ $value['style'] }}</td>              
                                            {{-- <td style="text-align:center;">{{ $value['article'] }}</td> --}}
                                            {{-- <td style="text-align:center;">{{ $value['po'] }}</td>     
                                            <td style="text-align:center;">{{ $value['color_code'] }}</td> --}}
                                            <?php
                                            $sumQty=[];
                                            ?>
                                            @foreach($dataByNamaSize as $key4=>$value4)
                                                  <?php 
                                                    $a=collect($dataSizeJumlah);
                                                    $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('nama_size', $value['nama_size'])->count();
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])
                                                    ->first();
                                                    if ($cek_data != 0 && $jumlah!= null) {
                                                        // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                        $qty=$jumlah['jumlah_size'];
                                                    }
                                                    else{
                                                    $qty='';
                                                    }
                                                    $sumQty[]=$qty;
                                                  ?>
                                                    
                                            <td style="text-align:center;">{{ $qty }}</td>
                                              @endforeach
                                                <?php
                                                  $a=array_sum($sumQty);
                                                  $dataJumlah = $a * $value['qty_carton3'];
                                                  $dataJumlahPCS = $dataJumlahPCS+$dataJumlah;
                                                  $total_nw[]=$value['NW_total'];
                                                  $total_gw[]=$value['GW_total'];

                                                ?>
                                            <td style="text-align:center;">{{ $dataJumlah }}</td>
                                            {{-- <td style="text-align:center;">{{ $value['satuan'] }}</td> --}}
                                            <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                                            <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                                          </tr>
                                       <?php
                                          $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                                          $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                                          $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                                          $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                                        ?>
                                        @endforeach
                                        <tr>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
                                            <td style="text-align:center;">{{ $sum_qty_carton3 }}</td>
                                             {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @else
                                            @endif --}}
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @foreach($dataByNamaSize as $key5=>$value5)
                                              <?php 
                                                  $a=collect($dataSizeJumlah);
                                                  $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->sum('jumlah_size');
                                                   if ($jumlah>0) {
                                                        $jumlah=$jumlah;
                                                    }
                                                    else{
                                                        $jumlah="";
                                                    }
                                              ?>
                                              
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $jumlah }}</td>
                                              @endforeach
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                                            {{-- <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td> --}}
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                                            
                                          
                                          </tr>
                                      @endforeach
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">GRAND TOTAL</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ $sumCarton }}</td>
                                         {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                          <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                          @else
                                          @endif --}}
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;" colspan="2"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"  colspan="{{ $dataJumlahPerSizeCount }}"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{$dataJumlahPCS}}</td>
                                        {{-- <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td> --}}
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_nw) }}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_gw) }}</td>
                                    </tr>
                                </tbody>
                              </table>
@endif

{{-- @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
@elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
@elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG') --}}
@else
 <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">INVOICE</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['invoice'] }}</th>
                                     @if (auth()->user()->branch == 'CLN')
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     <th style="text-align: left">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
                                     @else
                                     <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
                                     @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['buyer'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">: {{ $collectionData['tanggal_surat'] }}</th>
                                  @else
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  @endif
                              </tr>
                              <tr>
                                  <th style="text-align: left">CONTAINER NO</th>
                                  <th style="text-align: left; width:35%">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
                                  @if (auth()->user()->branch == 'CLN')
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  <th style="text-align: left">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }} </th>
                                  @else
                                  <th style="text-align: left; width: 15%">SEAL NO </th>
                                  @endif
                              </tr>
                          </table>
                          <br>
                              <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN NO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL. CTN</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</th>
                                        @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WAREHOUSE</th>
                                        @else
                                        @endif
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">CONTACT NO</th>
                                        
                                        @if($collectionData['buyer'] =='AGRON, INC.')
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>
                                        @else
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</th>
                                        @endif
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">PO</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</th>
                                        <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;padding-right:15px;padding-left:15px;">SIZE</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TTL PCS</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIT OF MESUREMENT</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NW</th>
                                        <th  rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">GW</th>
                                      </tr>
                                      <tr>
                                        @foreach($dataByNamaSize as $key2=>$value2)
                                          <th>{{$value2['nama_size']}}</th>
                                        @endforeach
                                      </tr>
                                </thead>
                                <tbody>   
                                    <?php
                                    $totalGW=0;
                                    $dataJumlahPCS=0;
                                    ?>
                                      @foreach ($dataEkspedisiPacking as $key =>$value7)
                                        <?php 
                                          $count=0; 
                                          $no=1;
                                          $sum_qty_carton3=0;
                                          $sum_dataJumlah=0;
                                          $sum_NWtotal=0;
                                          $sum_GWtotal=0;
                                        ?>
                                        @foreach ($value7 as $value)
                                      
                                          <?php
                                            $no=$no+$count;
                                            $count=$value['qty_carton3'];
                                            $a=$no + $count-1;
                                          ?>
                                          <tr>                      
                                            <td style="text-align:center;">{{ $no }}-{{ $a }}</td>
                                            <td style="text-align:center;">{{ $value['qty_carton3'] }}</td>
                                            <td style="text-align:center;">{{ $value['wo'] }}</td>
                                            @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                            @else
                                            @endif
                                            <td style="text-align:center;">{{ $value['no_kontrak'] }}</td>
                                            <td style="text-align:center;">{{ $value['style'] }}</td>              
                                            {{-- <td style="text-align:center;">{{ $value['article'] }}</td> --}}
                                            <td style="text-align:center;">{{ $value['po'] }}</td>     
                                            <td style="text-align:center;">{{ $value['color_code'] }}</td>
                                            <?php
                                            $sumQty=[];
                                            ?>
                                            @foreach($dataByNamaSize as $key4=>$value4)
                                                  <?php 
                                                    $a=collect($dataSizeJumlah);
                                                    $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('nama_size', $value['nama_size'])->count();
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('jumlah_size', $value['jumlah_size'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])
                                                    ->first();
                                                    if ($cek_data != 0 && $jumlah!= null) {
                                                        // $jumlah=$a->where('nama_size',$value4['nama_size'])->where('qty_carton', $value['qty_carton'])->where('color_code', $value['color_code'])->where('kode_ekspedisi', $value['kode_ekspedisi'])->first();
                                                        $qty=$jumlah['jumlah_size'];
                                                    }
                                                    else{
                                                    $qty='';
                                                    }
                                                    $sumQty[]=$qty;
                                                  ?>
                                                    
                                            <td style="text-align:center;">{{ $qty }}</td>
                                              @endforeach
                                                <?php
                                                  $a=array_sum($sumQty);
                                                  $dataJumlah = $a * $value['qty_carton3'];
                                                  $dataJumlahPCS = $dataJumlahPCS+$dataJumlah;
                                                  $total_nw[]=$value['NW_total'];
                                                  $total_gw[]=$value['GW_total'];

                                                ?>
                                            <td style="text-align:center;">{{ $dataJumlah }}</td>
                                            <td style="text-align:center;">{{ $value['satuan'] }}</td>
                                            <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                                            <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                                          </tr>
                                       <?php
                                          $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                                          $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                                          $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                                          $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                                        ?>
                                        @endforeach
                                        <tr>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
                                            <td style="text-align:center;">{{ $sum_qty_carton3 }}</td>
                                             @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @else
                                            @endif
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            @foreach($dataByNamaSize as $key5=>$value5)
                                              <?php 
                                                  $a=collect($dataSizeJumlah);
                                                  $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->sum('jumlah_size');
                                                   if ($jumlah>0) {
                                                        $jumlah=$jumlah;
                                                    }
                                                    else{
                                                        $jumlah="";
                                                    }
                                              ?>
                                              
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $jumlah }}</td>
                                              @endforeach
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                                            <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                                            
                                          
                                          </tr>
                                      @endforeach
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">GRAND TOTAL</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ $sumCarton }}</td>
                                         @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                                          <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                          @else
                                          @endif
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;" colspan="5"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"  colspan="{{ $dataJumlahPerSizeCount }}"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{$dataJumlahPCS}}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;"></td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_nw) }}</td>
                                        <td style="font-weight:bold;text-align:center;background-color:#aeaaaa;">{{ array_sum($total_gw) }}</td>
                                    </tr>
                                </tbody>
                            </table>
@endif

                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>  
  </body>
</html>