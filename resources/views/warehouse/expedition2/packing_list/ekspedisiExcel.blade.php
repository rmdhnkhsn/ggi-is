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

@if($collectionData['buyer']  =='AGRON, INC.')            
     <table style="width:1300px">
      <tr>
           <th colspan="10" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="10" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <br>
        <tr>
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['invoice'] }} </th>
              @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
              @else
                  <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['buyer'] }} </th>
            @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['tanggal_surat'] }}</th>
            @else
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
            @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
              @if (auth()->user()->branch == 'CLN')
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
                <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</th>
             @else
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
             @endif
        </tr>
    </table>
      <table style="width:100%">
          <thead>
            <tr>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CARTON NUMBER</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TOTAL CARTON</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WORK NO</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE NO</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO NO</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th>
                <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TOTAL QTY</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">N.W (KGS)</th>
                <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">G.W (KGS)</th>
            </tr>
              <tr>
                @foreach($dataByNamaSize as $key2=>$value2)
                  <th style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
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
                        <?php
                          $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                          $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                          $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                          $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                        ?>
                        @endforeach
                       <tr>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          @foreach($dataByNamaSize as $key5=>$value5)
                            <?php 
                                $a=collect($dataSizeJumlah);
                                $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->where('style', $value['style'])->sum('jumlah_size');
                              if ($jumlah>0) {
                                                        $jumlah=$jumlah;
                                                    }
                                                    else{
                                                        $jumlah="";
                                                    }
                            ?>
                            
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $jumlah }}</td>
                            @endforeach
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                       </tr>
                        <thead>
                    <tr>                       
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">TTL. CTN</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">WO</div></th>
                          <th rowspan="2" style="text-align:center;"><div class="mb-3">ARTICLE</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">PO</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;" class="text-center">SIZE</th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">TTL PCS</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">NW</div></th>
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">GW</div></th>
                    </tr>
                    <tr>
                      @foreach($dataByNamaSize as $key2=>$value2)
                        <th style="text-align:center;">{{$value2['nama_size']}}</th>
                      @endforeach
                    </tr>
                </thead>
                    @endforeach
                <tr>
                    <td>TOTAL</td>
                    <td style="text-align:center;">{{ $sumCarton }}</td>
                    {{-- <td style="text-align:center;">{{ $dataSizeJumlahOFFctn }}</td> --}}
                     @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                      <td colspan="5" style="text-align:center;"></td>
                      @else
                      @endif
                    <td colspan="4" style="text-align:center;"></td>
                    <td  colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;"></td>
                    <td style="text-align:center;">{{ $dataJumlahPCS }}</td>
                    <td></td>
                    <td style="text-align:center;">{{ array_sum($total_nw) }}</td>
                    <td style="text-align:center;">{{ array_sum($total_gw) }}</td>
                </tr>
            </tbody>
      </table>
@elseif ($collectionData['buyer']  =='MATSUOKA TRADING CO., LTD.')
      {{-- CTN NO|TTL CTN|Style|Contract No|G Number|Size|TTL PCS|NW|GW --}}
    <table style="width:1300px">
      <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <br>
        <tr>
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['invoice'] }} </th>
              @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
              @else
                  <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['buyer'] }} </th>
            @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['tanggal_surat'] }}</th>
            @else
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
            @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
              @if (auth()->user()->branch == 'CLN')
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
                <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</th>
             @else
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
             @endif
        </tr>
    </table>
    <table style="width:100%">
        <thead>
          <tr>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th>
                @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
              @else
              @endif --}}
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th> --}}
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th> --}}
              <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
          </tr>
            <tr>
              @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
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
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                      ?>
                      @endforeach
                      <tr>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @else
                        @endif --}}
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @foreach($dataByNamaSize as $key5=>$value5)
                          <?php 
                              $a=collect($dataSizeJumlah);
                              $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->where('style', $value['style'])->sum('jumlah_size');
                            if ($jumlah>0) {
                                                      $jumlah=$jumlah;
                                                  }
                                                  else{
                                                      $jumlah="";
                                                  }
                          ?>
                          
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $jumlah }}</td>
                          @endforeach
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                      </tr>
                      <thead>
                  <tr>                       
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th>
                        @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                      @else
                      @endif --}}
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th> --}}
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th> --}}
                      <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
                  </tr>
                  <tr>
                    @foreach($dataByNamaSize as $key2=>$value2)
                      <th style="text-align:center;">{{$value2['nama_size']}}</th>
                    @endforeach
                  </tr>
              </thead>
                  @endforeach
              <tr>
                  <td>TOTAL</td>
                  <td style="text-align:center;">{{ $sumCarton }}</td>
                  {{-- <td style="text-align:center;">{{ $dataSizeJumlahOFFctn }}</td> --}}
                    {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                    <td colspan="5" style="text-align:center;"></td>
                    @else
                    @endif --}}
                  <td colspan="2" style="text-align:center;"></td>
                  <td  colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;"></td>
                  <td style="text-align:center;">{{ $dataJumlahPCS }}</td>
                  {{-- <td></td> --}}
                  <td style="text-align:center;">{{ array_sum($total_nw) }}</td>
                  <td style="text-align:center;">{{ array_sum($total_gw) }}</td>
              </tr>
          </tbody>
    </table>
@elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
@if ($dataWo->warehouse != null)
    <table style="width:1300px">
      <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <br>
        <tr>
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['invoice'] }} </th>
              @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
              @else
                  <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['buyer'] }} </th>
            @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['tanggal_surat'] }}</th>
            @else
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
            @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
              @if (auth()->user()->branch == 'CLN')
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
                <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</th>
             @else
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
             @endif
        </tr>
    </table>
    <table style="width:100%">
        <thead>
          <tr>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th> --}}
                @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
              @else
              @endif
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
              @if($collectionData['buyer'] =='AGRON, INC.')
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
              @else
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
              @endif
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th>
              <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
          </tr>
            <tr>
              @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
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
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                      ?>
                      @endforeach
                      <tr>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @else
                        @endif
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @foreach($dataByNamaSize as $key5=>$value5)
                          <?php 
                              $a=collect($dataSizeJumlah);
                              $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->where('style', $value['style'])->sum('jumlah_size');
                            if ($jumlah>0) {
                                                      $jumlah=$jumlah;
                                                  }
                                                  else{
                                                      $jumlah="";
                                                  }
                          ?>
                          
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $jumlah }}</td>
                          @endforeach
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                      </tr>
                      <thead>
                  <tr>                       
                       <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
                        {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th> --}}
                          @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                        @else
                        @endif
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
                        @if($collectionData['buyer'] =='AGRON, INC.')
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
                        @else
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
                        @endif
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th>
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th>
                        <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
                        {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                        <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
                  </tr>
                  <tr>
                    @foreach($dataByNamaSize as $key2=>$value2)
                      <th style="text-align:center;">{{$value2['nama_size']}}</th>
                    @endforeach
                  </tr>
              </thead>
                  @endforeach
              <tr>
                  <td>TOTAL</td>
                  <td style="text-align:center;">{{ $sumCarton }}</td>
                  {{-- <td style="text-align:center;">{{ $dataSizeJumlahOFFctn }}</td> --}}
                    {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                    <td colspan="" style="text-align:center;"></td>
                    @else
                    @endif --}}
                  <td colspan="5" style="text-align:center;"></td>
                  <td  colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;"></td>
                  <td style="text-align:center;">{{ $dataJumlahPCS }}</td>
                  {{-- <td></td> --}}
                  <td style="text-align:center;">{{ array_sum($total_nw) }}</td>
                  <td style="text-align:center;">{{ array_sum($total_gw) }}</td>
              </tr>
          </tbody>
    </table>
    @else
    {{-- CTN NO|TTL CTN |Contract No|Style|Item|Size|TTL PCS|NW|GW --}}
    <table style="width:1300px">
      <tr>
           <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <br>
        <tr>
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['invoice'] }} </th>
              @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
              @else
                  <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['buyer'] }} </th>
            @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['tanggal_surat'] }}</th>
            @else
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
            @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
              @if (auth()->user()->branch == 'CLN')
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
                <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</th>
             @else
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
             @endif
        </tr>
    </table>
    <table style="width:100%">
        <thead>
          <tr>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th>
                @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
              @else
              @endif --}}
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
              @if($collectionData['buyer'] =='AGRON, INC.')
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
              @else
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
              @endif
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th> --}}
              <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
              {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
          </tr>
            <tr>
              @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
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
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                      ?>
                      @endforeach
                      <tr>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @else
                        @endif --}}
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @foreach($dataByNamaSize as $key5=>$value5)
                          <?php 
                              $a=collect($dataSizeJumlah);
                              $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->where('style', $value['style'])->sum('jumlah_size');
                            if ($jumlah>0) {
                                                      $jumlah=$jumlah;
                                                  }
                                                  else{
                                                      $jumlah="";
                                                  }
                          ?>
                          
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $jumlah }}</td>
                          @endforeach
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                        {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                      </tr>
                      <thead>
                  <tr>                       
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th>
                        @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                      @else
                      @endif --}}
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
                      @if($collectionData['buyer'] =='AGRON, INC.')
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
                      @else
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
                      @endif
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th> --}}
                      <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
                      {{-- <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th> --}}
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                      <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
                  </tr>
                  <tr>
                    @foreach($dataByNamaSize as $key2=>$value2)
                      <th style="text-align:center;">{{$value2['nama_size']}}</th>
                    @endforeach
                  </tr>
              </thead>
                  @endforeach
              <tr>
                  <td>TOTAL</td>
                  <td style="text-align:center;">{{ $sumCarton }}</td>
                  {{-- <td style="text-align:center;">{{ $dataSizeJumlahOFFctn }}</td> --}}
                    {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                    <td colspan="5" style="text-align:center;"></td>
                    @else
                    @endif --}}
                  <td colspan="2" style="text-align:center;"></td>
                  <td  colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;"></td>
                  <td style="text-align:center;">{{ $dataJumlahPCS }}</td>
                  {{-- <td></td> --}}
                  <td style="text-align:center;">{{ array_sum($total_nw) }}</td>
                  <td style="text-align:center;">{{ array_sum($total_gw) }}</td>
              </tr>
          </tbody>
    </table>
@endif


@else
    <table style="width:1300px">
      <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <br>
        <tr>
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['invoice'] }} </th>
              @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</th>
              @else
                  <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
              @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['buyer'] }} </th>
            @if (auth()->user()->branch == 'CLN')
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['tanggal_surat'] }}</th>
            @else
              <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
            @endif
        </tr>
        <tr>
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }} </th>
              @if (auth()->user()->branch == 'CLN')
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
                <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</th>
             @else
                <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
             @endif
        </tr>
    </table>
    <table style="width:100%">
        <thead>
          <tr>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">CTN NO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">TTL. CTN</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WO</th>
                @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
              @else
              @endif
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTACT NO</th>
              @if($collectionData['buyer'] =='AGRON, INC.')
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
              @else
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
              @endif
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:150px;background-color:#C0C0C0;">COLOR</th>
              <th  colspan="{{ $dataJumlahPerSizeCount }}" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TTL PCS</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT OF MESUREMENT</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
              <th  rowspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
          </tr>
            <tr>
              @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
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
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;

                      ?>
                      @endforeach
                      <tr>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @else
                        @endif
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        @foreach($dataByNamaSize as $key5=>$value5)
                          <?php 
                              $a=collect($dataSizeJumlah);
                              $jumlah=$a->where('nama_size',$value5['nama_size'])->where('wo', $value['wo'])->where('style', $value['style'])->sum('jumlah_size');
                            if ($jumlah>0) {
                                                      $jumlah=$jumlah;
                                                  }
                                                  else{
                                                      $jumlah="";
                                                  }
                          ?>
                          
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $jumlah }}</td>
                          @endforeach
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_dataJumlah }}</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                      </tr>
                      <thead>
                  <tr>                       
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">CTN NO</div></th> 
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">TTL. CTN</div></th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">WO</div></th>
                      @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">WAREHOUSE</div></th>
                      @else
                      @endif
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">CONTRACT NO</div></th>
                        @if($collectionData['buyer'] =='AGRON, INC.')
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">ARTICLE</div></th>
                        @else
                        <th rowspan="2" style="text-align:center;"><div class="mb-3">STYLE</div></th>
                        @endif
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">PO</div></th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">COLOR</div></th>
                      <th colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;" class="text-center">SIZE</th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">TTL PCS</div></th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">NW</div></th>
                      <th rowspan="2" style="text-align:center;"><div class="mb-3">GW</div></th>
                  </tr>
                  <tr>
                    @foreach($dataByNamaSize as $key2=>$value2)
                      <th style="text-align:center;">{{$value2['nama_size']}}</th>
                    @endforeach
                  </tr>
              </thead>
                  @endforeach
              <tr>
                  <td>TOTAL</td>
                  <td style="text-align:center;">{{ $sumCarton }}</td>
                  {{-- <td style="text-align:center;">{{ $dataSizeJumlahOFFctn }}</td> --}}
                    @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                    <td colspan="5" style="text-align:center;"></td>
                    @else
                    @endif
                  <td colspan="5" style="text-align:center;"></td>
                  <td  colspan="{{ $dataJumlahPerSizeCount }}" style="text-align:center;"></td>
                  <td style="text-align:center;">{{ $dataJumlahPCS }}</td>
                  <td></td>
                  <td style="text-align:center;">{{ array_sum($total_nw) }}</td>
                  <td style="text-align:center;">{{ array_sum($total_gw) }}</td>
              </tr>
          </tbody>
    </table>
@endif
    <br>    
  </body>
</html>