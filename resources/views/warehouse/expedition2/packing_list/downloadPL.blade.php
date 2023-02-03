@extends("layouts.app")
@section("title","Detail Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 my-3 text-center">
        <div class="title-30">PACKING LIST </div>
        <div class="title-20">PT. GISTEX GARMEN INDONESIA</div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Invoice</div>
          <div class="flat-desc"> {{ $collectionData['invoice'] }}</div>
           @if (auth()->user()->branch == 'CLN')
           <div class="flat-title mt-2">No Surat jalan</div>
           <div class="flat-desc truncate">{{ $collectionData['no_surat_jalan'] }}-{{ $collectionData['no_surat_jalan2'] }}</div>
           @else 
           <div class="flat-title mt-2">No Surat jalan</div>
           @endif
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Buyer</div>
          <div class="flat-desc">{{ $collectionData['buyer'] }}</div>
           @if (auth()->user()->branch == 'CLN')
           <div class="flat-title mt-2">Date</div>
           <div class="flat-desc truncate">{{ $collectionData['tanggal_surat'] }}</div>
           @else 
           <div class="flat-title mt-2">Date</div>
           @endif
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Container No</div>
          <div class="flat-desc">{{ $collectionData['no_kontainer'] }}-{{ $collectionData['no_kontainer2'] }}</div>
           @if (auth()->user()->branch == 'CLN')
           <div class="flat-title mt-2">Seal No</div>
           <div class="flat-desc truncate">{{ $collectionData['no_seal'] }}-{{ $collectionData['no_seal2'] }}</div>
           @else 
           <div class="flat-title mt-2">Seal No</div>
           @endif
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Download Packing List</div>
          <div class="containerGrid">
            <a href="{{ route('packing.EkspedisiPDF',$collectionData['kode_ekspedisi']) }}" class="btn-merah">Download<i class="fs-18 ml-3 fas fa-file-pdf"></i></a>
            <a href="{{ route('packing.EkspedisiExcel',$collectionData['kode_ekspedisi']) }}" class="btn-green">Download<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row pb-5 mt-2">
      <div class="col-12 mb-2">
        <div class="cards-18" style="padding:1.5rem">
          <div class="cards-scroll scrollX" id="scroll-bar">
              @if($collectionData['buyer']  =='AGRON, INC.')
              {{-- CTN NO|TTL CTN|WO|Article|PO|Colour|Size|TTL PCS|Unit Of Mesuremen|NW|GW --}}
              <table id="DTtable4" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>                       
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        <th rowspan="2"><div class="mb-3">WO</div></th>
                        <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                        <th rowspan="2"><div class="mb-3">PO</div></th>
                        <th rowspan="2"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
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
                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                          <td style="text-align:center;"></td>
                        </tr>
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                      ?>
                      @endforeach
                       <tr>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                              <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                              <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                              <th rowspan="2"><div class="mb-3">WO</div></th>
                              <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                              <th rowspan="2"><div class="mb-3">PO</div></th>
                              <th rowspan="2"><div class="mb-3">COLOR</div></th>
                              <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                              <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                              <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                              <th rowspan="2"><div class="mb-3">NW</div></th>
                              <th rowspan="2"><div class="mb-3">GW</div></th>
                          </tr>
                          <tr>
                            @foreach($dataByNamaSize as $key2=>$value2)
                              <th>{{$value2['nama_size']}}</th>
                            @endforeach
                          </tr>
                      </thead>
             
                    @endforeach
                </tbody>
              </table>
              @elseif ($collectionData['buyer']  =='MATSUOKA TRADING CO., LTD.')
              {{-- CTN NO|TTL CTN|Style|Contract No|G Number|Size|TTL PCS|NW|GW --}}
              <table id="DTtable4" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>                       
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                        <th rowspan="2"><div class="mb-3">STYLE</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                        {{-- <th rowspan="2"><div class="mb-3">COLOR</div></th> --}}
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
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
                          <td style="text-align:center;">{{ $value['style'] }}</td>              
                          {{-- <td style="text-align:center;">{{ $value['po'] }}</td>     
                          <td style="text-align:center;">{{ $value['color_code'] }}</td> --}}
                          <?php
                          $sumQty=[];
                          ?>
                          @foreach($dataByNamaSize as $key4=>$value4)
                                <?php 
                                  $a=collect($dataSizeJumlah);
                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('qty_carton', $value['qty_carton'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                          {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                          <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                          <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                          {{-- <td style="text-align:center;"></td> --}}
                        </tr>
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                      ?>
                      @endforeach
                       <tr>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                              <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                              <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                              <th rowspan="2"><div class="mb-3">STYLE</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                              {{-- <th rowspan="2"><div class="mb-3">COLOR</div></th> --}}
                              <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                              <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                              <th rowspan="2"><div class="mb-3">NW</div></th>
                              <th rowspan="2"><div class="mb-3">GW</div></th>
                          </tr>
                          <tr>
                            @foreach($dataByNamaSize as $key2=>$value2)
                              <th>{{$value2['nama_size']}}</th>
                            @endforeach
                          </tr>
                      </thead>
             
                    @endforeach
                </tbody>
              </table>
            @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
              {{-- CTN NO|TTL CTN|Warehouse|Style|Colour|Size|TTL PCS|NW|GW --}}
              @if ($dataWo->warehouse != null)
              <table id="DTtable4" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>                       
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                        
                        <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                        {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                          <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                          @else --}}
                          <th rowspan="2"><div class="mb-3">STYLE</div></th>
                          {{-- @endif --}}
                        {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                        <th rowspan="2"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
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
                          {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.')) --}}
                          <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                          {{-- @else
                          @endif --}}
                          {{-- <td style="text-align:center;">{{ $value['no_kontrak'] }}</td> --}}
                          <td style="text-align:center;">{{ $value['style'] }}</td>              
                          {{-- <td style="text-align:center;">{{ $value['po'] }}</td>      --}}
                          <td style="text-align:center;">{{ $value['color_code'] }}</td>
                          <?php
                          $sumQty=[];
                          ?>
                          @foreach($dataByNamaSize as $key4=>$value4)
                                <?php 
                                  $a=collect($dataSizeJumlah);
                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                          {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                          <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                          <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                          <td style="text-align:center;"></td>
                        </tr>
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                      ?>
                      @endforeach
                      <tr>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_NWtotal }}</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_GWtotal }}</td>
                      </tr>
                        <thead>
                          <tr>                       
                            <tr>                       
                                <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                                <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                                {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                                
                                <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                                {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                                {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                                  <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                                  @else --}}
                                  <th rowspan="2"><div class="mb-3">STYLE</div></th>
                                  {{-- @endif --}}
                                {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                                <th rowspan="2"><div class="mb-3">COLOR</div></th>
                                <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                                <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                                {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                                <th rowspan="2"><div class="mb-3">NW</div></th>
                                <th rowspan="2"><div class="mb-3">GW</div></th>
                            </tr>
                          <tr>
                            @foreach($dataByNamaSize as $key2=>$value2)
                              <th>{{$value2['nama_size']}}</th>
                            @endforeach
                          </tr>
                      </thead>
            
                    @endforeach
                </tbody>
              </table>
              @else     
              {{-- CTN NO|TTL CTN |Contract No|Style|Item|Size|TTL PCS|NW|GW --}}           
              <table id="DTtable4" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>                       
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                        
                        {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                        <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                        {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                          <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                          @else --}}
                          <th rowspan="2"><div class="mb-3">STYLE</div></th>
                          {{-- @endif --}}
                        {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                        <th rowspan="2"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
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
                          {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.')) --}}
                          {{-- <td style="text-align:center;">{{ $value['warehouse'] }}</td> --}}
                          {{-- @else
                          @endif --}}
                          <td style="text-align:center;">{{ $value['no_kontrak'] }}</td>
                          <td style="text-align:center;">{{ $value['style'] }}</td>              
                          {{-- <td style="text-align:center;">{{ $value['po'] }}</td>      --}}
                          <td style="text-align:center;">{{ $value['color_code'] }}</td>
                          <?php
                          $sumQty=[];
                          ?>
                          @foreach($dataByNamaSize as $key4=>$value4)
                                <?php 
                                  $a=collect($dataSizeJumlah);
                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                          {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                          <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                          <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                          {{-- <td style="text-align:center;"></td> --}}
                        </tr>
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                      ?>
                      @endforeach
                      <tr>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                        
                          {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                          <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                              <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                              <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                              
                              {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                              <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                              {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                                <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                                @else --}}
                                <th rowspan="2"><div class="mb-3">STYLE</div></th>
                                {{-- @endif --}}
                              {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                              <th rowspan="2"><div class="mb-3">COLOR</div></th>
                              <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                              <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                              <th rowspan="2"><div class="mb-3">NW</div></th>
                              <th rowspan="2"><div class="mb-3">GW</div></th>
                          </tr>
                          <tr>
                            @foreach($dataByNamaSize as $key2=>$value2)
                              <th>{{$value2['nama_size']}}</th>
                            @endforeach
                          </tr>
                      </thead>
            
                    @endforeach
                </tbody>
              </table>
              @endif
              {{-- CTN NO|TTL CTN |Contract No|Style|Item|Size|TTL PCS|NW|GW --}}
            @elseif ($collectionData['buyer']  =='COCOS SAMPLE')
            {{-- CTN NO|TTL CTN|Colour|Size|TTL PCS|NW|GW --}}
            <table id="DTtable4" class="table tbl-content-left no-wrap">
              <thead>
                  <tr>                       
                      <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                      <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                      {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                      
                      {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                      {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                      {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                        <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                        @else --}}
                        {{-- <th rowspan="2"><div class="mb-3">STYLE</div></th> --}}
                        {{-- @endif --}}
                      {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                      <th rowspan="2"><div class="mb-3">COLOR</div></th>
                      <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                      <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                      {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                      <th rowspan="2"><div class="mb-3">NW</div></th>
                      <th rowspan="2"><div class="mb-3">GW</div></th>
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
                        {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.')) --}}
                        {{-- <td style="text-align:center;">{{ $value['warehouse'] }}</td> --}}
                        {{-- @else
                        @endif --}}
                        {{-- <td style="text-align:center;">{{ $value['no_kontrak'] }}</td> --}}
                        {{-- <td style="text-align:center;">{{ $value['style'] }}</td>               --}}
                        {{-- <td style="text-align:center;">{{ $value['po'] }}</td>      --}}
                        <td style="text-align:center;">{{ $value['color_code'] }}</td>
                        <?php
                        $sumQty=[];
                        ?>
                        @foreach($dataByNamaSize as $key4=>$value4)
                              <?php 
                                $a=collect($dataSizeJumlah);
                                $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                        {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                        <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                        <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                        <td style="text-align:center;"></td>
                      </tr>
                    <?php
                      $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                      $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                      $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                      $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                      $a=collect($JumlahTotalSize);
                      $total = collect($a)->sum('jumlah_size');
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
                            <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                            <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                            <th rowspan="2"><div class="mb-3">WO</div></th>
                            @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                            <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                            @else
                            @endif
                            <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                            @if($collectionData['buyer'] =='AGRON, INC.')
                              <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                              @else
                              <th rowspan="2"><div class="mb-3">STYLE</div></th>
                              @endif
                            <th rowspan="2"><div class="mb-3">PO</div></th>
                            <th rowspan="2"><div class="mb-3">COLOR</div></th>
                            <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                            <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                            <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                            <th rowspan="2"><div class="mb-3">NW</div></th>
                            <th rowspan="2"><div class="mb-3">GW</div></th>
                        </tr>
                        <tr>
                          @foreach($dataByNamaSize as $key2=>$value2)
                            <th>{{$value2['nama_size']}}</th>
                          @endforeach
                        </tr>
                    </thead>
          
                  @endforeach
              </tbody>
            </table>
            @elseif ($collectionData['buyer']  =='TEIJIN FRONTIER CO., LTD SEC. 831')
            {{-- CTN NO|TTL CTN|Style|Colour|Size|TTL PCS|NW|GW --}}
            <table id="DTtable4" class="table tbl-content-left no-wrap">
              <thead>
                  <tr>                       
                      <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                      <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                      {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                      
                      {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                      {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                      {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                        <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                        @else --}}
                        <th rowspan="2"><div class="mb-3">STYLE</div></th>
                        {{-- @endif --}}
                      {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                      <th rowspan="2"><div class="mb-3">COLOR</div></th>
                      <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                      <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                      {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                      <th rowspan="2"><div class="mb-3">NW</div></th>
                      <th rowspan="2"><div class="mb-3">GW</div></th>
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
                        {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.')) --}}
                        {{-- <td style="text-align:center;">{{ $value['warehouse'] }}</td> --}}
                        {{-- @else
                        @endif --}}
                        {{-- <td style="text-align:center;">{{ $value['no_kontrak'] }}</td> --}}
                        <td style="text-align:center;">{{ $value['style'] }}</td>              
                        {{-- <td style="text-align:center;">{{ $value['po'] }}</td>      --}}
                        <td style="text-align:center;">{{ $value['color_code'] }}</td>
                        <?php
                        $sumQty=[];
                        ?>
                        @foreach($dataByNamaSize as $key4=>$value4)
                              <?php 
                                $a=collect($dataSizeJumlah);
                                $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                        {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                        <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                        <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                        <td style="text-align:center;"></td>
                      </tr>
                    <?php
                      $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                      $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                      $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                      $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                      $a=collect($JumlahTotalSize);
                      $total = collect($a)->sum('jumlah_size');
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
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                             <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                              <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                              
                              {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                              {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                              {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                                <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                                @else --}}
                                <th rowspan="2"><div class="mb-3">STYLE</div></th>
                                {{-- @endif --}}
                              {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                              <th rowspan="2"><div class="mb-3">COLOR</div></th>
                              <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                              <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                              {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                              <th rowspan="2"><div class="mb-3">NW</div></th>
                              <th rowspan="2"><div class="mb-3">GW</div></th>
                        </tr>
                        <tr>
                          @foreach($dataByNamaSize as $key2=>$value2)
                            <th>{{$value2['nama_size']}}</th>
                          @endforeach
                        </tr>
                    </thead>
          
                  @endforeach
              </tbody>
            </table>
           <table id="DTtable4" class="table tbl-content-left no-wrap">
            <thead>
                <tr>                       
                    <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                    <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                    {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                     
                    {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                    {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                     {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                      <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                      @else --}}
                      <th rowspan="2"><div class="mb-3">STYLE</div></th>
                      {{-- @endif --}}
                    {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                    <th rowspan="2"><div class="mb-3">COLOR</div></th>
                    <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                    <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                    {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                    <th rowspan="2"><div class="mb-3">NW</div></th>
                    <th rowspan="2"><div class="mb-3">GW</div></th>
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
                      {{-- @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.')) --}}
                      {{-- <td style="text-align:center;">{{ $value['warehouse'] }}</td> --}}
                      {{-- @else
                      @endif --}}
                      {{-- <td style="text-align:center;">{{ $value['no_kontrak'] }}</td> --}}
                      <td style="text-align:center;">{{ $value['style'] }}</td>              
                      {{-- <td style="text-align:center;">{{ $value['po'] }}</td>      --}}
                      <td style="text-align:center;">{{ $value['color_code'] }}</td>
                      <?php
                      $sumQty=[];
                      ?>
                      @foreach($dataByNamaSize as $key4=>$value4)
                            <?php 
                              $a=collect($dataSizeJumlah);
                              $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                              $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                      {{-- <td style="text-align:center;">{{ strtoupper($value['satuan']) }}</td> --}}
                      <td style="text-align:center;">{{ $value['NW_total'] }}</td>
                      <td style="text-align:center;">{{ $value['GW_total'] }}</td>
                      <td style="text-align:center;"></td>
                    </tr>
                  <?php
                    $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                    $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                    $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                    $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                    $a=collect($JumlahTotalSize);
                    $total = collect($a)->sum('jumlah_size');
                  ?>
                  @endforeach
                   <tr>
                      <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
                      <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{ $sum_qty_carton3 }}</td>
                  
                      <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                      {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
                      {{-- <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                      <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
                      <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td> --}}
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
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">WO</div></th> --}}
                        
                        {{-- <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th> --}}
                        {{-- <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th> --}}
                        {{-- @if($collectionData['buyer'] =='AGRON, INC.')
                          <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                          @else --}}
                          <th rowspan="2"><div class="mb-3">STYLE</div></th>
                          {{-- @endif --}}
                        {{-- <th rowspan="2"><div class="mb-3">PO</div></th> --}}
                        <th rowspan="2"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        {{-- <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th> --}}
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
                    </tr>
                      <tr>
                        @foreach($dataByNamaSize as $key2=>$value2)
                          <th>{{$value2['nama_size']}}</th>
                        @endforeach
                      </tr>
                  </thead>
         
                @endforeach
            </tbody>
        </table>
            @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
            {{-- @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
            @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
            @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG')
            @elseif ($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG') --}}
            @else
            <table id="DTtable4" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>                       
                        <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                        <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                        <th rowspan="2"><div class="mb-3">WO</div></th>
                         @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                          <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                          @else
                          @endif
                        <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                         @if($collectionData['buyer'] =='AGRON, INC.')
                          <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                          @else
                          <th rowspan="2"><div class="mb-3">STYLE</div></th>
                          @endif
                        <th rowspan="2"><div class="mb-3">PO</div></th>
                        <th rowspan="2"><div class="mb-3">COLOR</div></th>
                        <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                        <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                        <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                        <th rowspan="2"><div class="mb-3">NW</div></th>
                        <th rowspan="2"><div class="mb-3">GW</div></th>
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
                          <td style="text-align:center;">{{ $value['po'] }}</td>     
                          <td style="text-align:center;">{{ $value['color_code'] }}</td>
                          <?php
                          $sumQty=[];
                          ?>
                          @foreach($dataByNamaSize as $key4=>$value4)
                                <?php 
                                  $a=collect($dataSizeJumlah);
                                  $cek_data = $a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])->count();
                                  $jumlah=$a->where('nama_size',$value4['nama_size'])->where('color_code', $value['color_code'])->where('nama_size', $value['nama_size'])->where('jumlah_size', $value['jumlah_size'])
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
                          <td style="text-align:center;"></td>
                        </tr>
                      <?php
                        $sum_qty_carton3=$value['qty_carton3']+$sum_qty_carton3;
                        $sum_NWtotal=$value['NW_total']+$sum_NWtotal;
                        $sum_GWtotal=$value['GW_total']+$sum_GWtotal;
                        $sum_dataJumlah=$dataJumlah+$sum_dataJumlah;
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
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
                              <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                              <th rowspan="2"><div class="mb-3">TTL. CTN</div></th>
                              <th rowspan="2"><div class="mb-3">WO</div></th>
                              @if($collectionData['buyer']  =='MARUBENI CORPORATION JEPANG' || ($collectionData['buyer'] =='MARUBENI FASHION LINK LTD.'))
                              <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                              @else
                              @endif
                              <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                              @if($collectionData['buyer'] =='AGRON, INC.')
                                <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                                @else
                                <th rowspan="2"><div class="mb-3">STYLE</div></th>
                                @endif
                              <th rowspan="2"><div class="mb-3">PO</div></th>
                              <th rowspan="2"><div class="mb-3">COLOR</div></th>
                              <th colspan="{{ $dataJumlahPerSizeCount }}" class="text-center">SIZE</th>
                              <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                              <th rowspan="2"><div class="mb-3">UNIT OF MESUREMENT</div></th>
                              <th rowspan="2"><div class="mb-3">NW</div></th>
                              <th rowspan="2"><div class="mb-3">GW</div></th>
                          </tr>
                          <tr>
                            @foreach($dataByNamaSize as $key2=>$value2)
                              <th>{{$value2['nama_size']}}</th>
                            @endforeach
                          </tr>
                      </thead>
             
                    @endforeach
                </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">Total Carton</div>
          <div class="txt2">{{ $sumCarton }}</div>
          {{-- <div class="txt2">{{ $dataSizeJumlahOFFctn }}</div> --}}
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">Total Pcs</div>
          <div class="txt2">{{$dataJumlahPCS}}</div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">NW</div>
          <div class="txt2">{{ array_sum($total_nw) }}</div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">GW</div>
          <div class="txt2">{{array_sum($total_gw) }}</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable4').DataTable({
    "pageLength": 15,
    // "dom": '<"search"><"top">rt<"bottom"p><"clear">',
     order: [[4, 'desc']],
     dom: 'Brtp',
        buttons: [
            'excel', 'pdf', 'print'
        ],
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
      
    });
    $('#table-filter').on('change', function(){
       table.search(this.value).draw();   
    });
  });

  $(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush