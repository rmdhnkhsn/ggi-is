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
            @if ($data[0]->action == 'PACKING')
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
          <th colspan="12" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">{{ $data[0]->judul }}</th>
        </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data[0]->buyer }} </th>
             
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OFF CTN</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSizeJumlahOFFctn }} </th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">STYLE</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data[0]->style }} </th>
           
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">QTY ORDER</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{$data[0]->qty }}</th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">OR Number</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data[0]->or_number }} </th>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">DATE </th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data[0]->tanggal }} </th>
          </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">WO</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $data[0]->wo }} </th>
              
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">NO CONTRACT </th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">: {{ $data[0]->no_kontrak }}</th>
          </tr>
      </table>
      <br>

      <table style="width:100%">
        <thead>
            <tr>
                <th style="font-weight:bold;text-align:center;width:70px;background-color:#C0C0C0;">CTN CODE</th>
                @if($data[0]->warehouse =='MARUBENI CORPORATION JEPANG' && ($data[0]->buyer =='MARUBENI FASHION LINK LTD.'))
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WAREHOUSE</th>
                @else
                @endif
                @if($data[0]->buyer =='AGRON, INC.' ||  $data[0]->buyer =='AGRON, INC.'|| $data[0]->buyer == 'ADIDAS COSTCO AUSTRALIA')
                    <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ARTICLE</th>
                @else
                   <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
                @endif
                  <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">COLOR CODE</th>
                @foreach($namaSizes as $val)
                  <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">{{$val}}</th>
                @endforeach
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">QTY SIZE</th>
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SATUAN</th>
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</th>
                <th  style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</th>
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
            {{-- {{$dataPackingSize  }} --}}
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
                <td  style="font-weight:bold;text-align:center;background-color:#8e948c;" ></td>
                <td colspan="2" style="font-weight:bold;text-align:center;background-color:#8e948c;">TOTAL</td>
                 @if($data[0]->warehouse =='MARUBENI CORPORATION JEPANG' || ($data[0]->buyer =='MARUBENI FASHION LINK LTD.'))
                 <td style="font-weight:bold;text-align:center;background-color:#8e948c;"></td>
                  @else
                  @endif        
                @foreach($dataByNamaSize as $key5=>$value5)
                        <?php 
                            $a=collect($JumlahTotalSize);
                            $qty_sizeJumlah = collect($a)->where('nama_size',$value5['nama_size'])->sum('jumlah_size');
                        ?>
                        <td  style="font-weight:bold;text-align:center;background-color:#8e948c;">{{ $qty_sizeJumlah }}</td>
                    @endforeach
                    <?php 
                        $a=collect($JumlahTotalSize);
                        $total = collect($a)->sum('jumlah_size');
                    ?>
                    
                <td  style="font-weight:bold;text-align:center;background-color:#8e948c;">{{ $total }}</td>  
                    <td style="font-weight:bold;text-align:center;background-color:#8e948c;"></td>
                
                        <?php 
                            $a=collect($JumlahSize);
                            $qtynw = collect($a)->sum('NW');
                        ?>
                        <td  style="font-weight:bold;text-align:center;background-color:#8e948c;">{{ $qtynw }}</td>
                          <?php 
                            $a=collect($JumlahSize);
                            $qtyGW = collect($a)->sum('GW');
                          ?>
                <td  style="font-weight:bold;text-align:center;background-color:#8e948c;">{{ $qtyGW }}</td>
            </tr>
        </tbody>
      </table>
      <br>
      <br>
    </body>
</html>
      

                     


