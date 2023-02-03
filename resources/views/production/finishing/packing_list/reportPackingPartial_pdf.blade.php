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
</style>
</head>
    <body> 
    <section class="content-header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body" style="overflow:scroll;">
                          <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                          <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                          @foreach ($dataPackingList as $item)
                          <center><h4>{{ $item['packing_list'] }}</h4></center> 
                          @endforeach

                          <br>
                          <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $data->buyer }} </th>
                                  <th style="text-align: left; width: 15%">OFF CTN</th>
                                  <th style="text-align: left">:{{ $qtyPartlist}} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">STYLE</th>
                                  <th style="text-align: left; width:35%">:{{ $data->style }} </th>
                                  <th style="text-align: left; width: 15%">QTY ORDER </th>
                                  <th style="text-align: left">: {{ $data->qty }}</th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">OR Number</th>
                                  <th style="text-align: left; width:35%">:{{ $data->or_number }} </th>
                                  <th style="text-align: left; width: 15%">DATE </th>
                                  <th style="text-align: left">:{{ $data->tanggal }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">WO</th>
                                  <th style="text-align: left; width:35%">:{{ $data->wo }} </th>
                                  <th style="text-align: left; width: 15%">NO CONTRACT </th>
                                  <th style="text-align: left">:{{ $data->no_kontrak }} </th>
                              </tr>
                          </table>
                          <br>

                         <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CTN CODE</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR CODE</th>
                                        @if($data->warehouse ==null)
                                        
                                        @else
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">WAREHOUSE</th>
                                        @endif
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ARTICLE</th>

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
                                    @foreach ($tes as $key =>$value)
                                     
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value['color_code'] }}</td>
                                        @if ($value['warehouse']== null )

                                        @elseif ($value['warehouse'] )
                                        <td>{{ $value['warehouse'] }}</td>
                                        @endif
                                        <td>{{ $value['article'] }}</td>
                                        @foreach($dataByNamaSize as $key4=>$value4)
                                            <?php 
                                                $a=collect($dataSizePartlist);
                                                // dd($a);
                                                $qty_sizeJumlah = collect($a)->where('carton', $value['carton'])->sum('jumlah_size');
                                                $cek_data = $a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->count();
                                                if ($cek_data != 0) {
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->first();
                                                    $qty=$jumlah['jumlah_size'];
                                                }
                                                else{
                                                $qty='0';
                                                }
                                            ?>
                                            <td style="text-align:center;">{{ $qty }}</td>
                                            @endforeach
                                        <td>{{ $qty_sizeJumlah }}</td>

                                        <td>{{ $value['satuan'] }}</td>
                                        <td>{{ $value['NW'] }}</td>
                                        <td>{{ $value['GW'] }}</td>
                                    </tr>
                                    @endforeach
                                   
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

                     


