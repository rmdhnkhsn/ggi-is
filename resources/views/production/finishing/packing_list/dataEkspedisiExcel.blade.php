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
           <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
        </tr>
        <tr>
           <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
        </tr>
        <tr>
            @foreach($namaBuyer as $key12=>$value12)
                <th colspan="15" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">BUYER : {{$value12['buyer']}}</th>
            @endforeach
        </tr>
        <br>
      </table>
      <table style="width:100%">
        <thead>
            <tr>
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">CTN CODE</th>
                <th style="font-weight:bold;text-align:center;width:110px;background-color:#C0C0C0;">WAREHOUSE</th>
                <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">WO</th>
                <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">CONTRACT NUMBER</th>
                
                @if($value12['buyer']  =='AGRON, INC.')
                <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">ARTICLE</th>
                @else
                <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">STYLE</th>
                @endif
                <th style="font-weight:bold;text-align:center;width:90px;background-color:#C0C0C0;">PO</th>
                <th style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">COLOR CODE</th>
                    @foreach($dataByNamaSize as $key2=>$value2)
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">{{$value2['nama_size']}}</th>
                @endforeach
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">JUMLAH QTY </th>
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">NW</th>
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">GW</th>
            </tr>
        </thead>
          <tbody>
             <?php $counter = 1;
                                   
              ?>
              @foreach ($packingSizeRaw as $dataPackingSize) 
              <?php
                $colors =  explode("|",$dataPackingSize->colors); 
                $colorsLen = count($colors);
                ?> 
              {{-- {{$dataPackingSize  }} --}}
                  @for($i = 0; $i < $dataPackingSize->qty_carton; $i++)
                      @for ($c = 0 ; $c < $colorsLen ; $c++)
                            <tr>
                              <td style="text-align:center;">{{ $counter }}</td>
                              <td style="text-align:center;">{{ $dataPackingSize->warehouse }}</td>
                                <td style="text-align:center;">{{ $dataPackingSize->wo }}</td>
                                <td style="text-align:center;">{{ $dataPackingSize->no_kontrak }}</td>
                                <td style="text-align:center;">{{ $dataPackingSize->style }}</td>
                                <td style="text-align:center;">{{ $dataPackingSize->po }}</td>
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
                              <td style="text-align:center;">{{ $dataPackingSize->NW }}</td>
                              <td style="text-align:center;">{{ $dataPackingSize->GW }}</td>
                          </tr>
                      @endfor
                      <?php $counter++ ?>
                  @endfor
              @endforeach
            <tr>
                <td></td>
                <td colspan="6">TOTAL</td>
                
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
                        <td  style="text-align:center;">{{ $qty_sizeJumlah }}</td>
                    @endforeach
                    <?php 
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                    ?>
                    
                <td  style="text-align:center;">{{ $total }}</td>  
                
                        <?php 
                            $a=collect($JumlahSize);
                            $qtynw = collect($a)->sum('NW');
                        
                        ?>
                        <td  style="text-align:center;">{{ $qtynw }}</td>
                
                        <?php 
                            $a=collect($JumlahSize);
                            $qtyGW = collect($a)->sum('GW');
                        
                            ?>
                
                <td  style="text-align:center;">{{ $qtyGW }}</td>
            </tr>
          </tbody>
    </table>

      <br>
    </body>
</html>
      




                     


