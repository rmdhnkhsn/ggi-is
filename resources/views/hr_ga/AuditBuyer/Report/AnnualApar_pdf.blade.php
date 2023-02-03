<html>
  <style>
    table, td, th {
    border: 1px solid black;
    text-align:center;
    font-size:13px;
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
  .div3 {
    width: auto;
    height: auto;  
    padding: 5px;
    border: 1px solid black;
  }
  </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <center>
                                  <h3 style="font-weight:bold;font-size:20px;"> ANNUAL REPORT SAFETY COMPLIENCE CONTROLL APAR</h3>
                                  <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                  <h3 style="font-weight:bold;font-size:13px;"> {{$tahun}}</h3> 
                                </center>
                               
                                <br>
                              <table class="table table-bordered">
                                <tr>
                                    <td style="font-weight:bold;">Bulan</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Nama Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Tekanan Apar </td>
                                    <td style="font-weight:bold;">Pin Pengaman APAR</td>
                                    <td style="font-weight:bold;">Kondisi Selang</td>
                                    <td style="font-weight:bold;">Berat Tabung APAR</td>
                                    <td style="font-weight:bold;">Masa Berlaku Pengisian</td>
                                    <td style="font-weight:bold;">Kondisi Handle/Tuas</td>
                                    <td style="font-weight:bold;">Garis Merah / Red Line APAR</td>
                                    <td style="font-weight:bold;">Kondisi Sign APAR</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                    
                                </tr>
                                @foreach($record_apar as $key =>$value)
                                <tr>
                                    <td rowspan="{{count($value) + 1 }}">{{$key}}</td>
                                    <td colspan="12" ></td>
                                    
                                </tr>
                                  @foreach($value as $dp)
                                    <tr>
                                      <td>{{$dp['kode_lokasi']}}</td>
                                      <td>{{$dp['nama_lokasi']}}</td>
                                      @if($dp['tgl_periksa'] != null )
                                          <td>{{$dp['tgl_periksa']}}</td>
                                          <td>{{$dp['tekanan']}}</td>
                                          <td>{{$dp['pin']}}</td>
                                          <td>{{$dp['kondisi_selang']}}</td>
                                          <td>{{$dp['berat_tabung']}}</td>
                                          <td>{{$dp['masa_berlaku']}}</td>
                                          <td>{{$dp['kondisi_tuas']}}</td>
                                          <td>{{$dp['garis_merah']}}</td>
                                          <td>{{$dp['kondisi_sign']}}</td>
                                          <td>{{$dp['petugas']}}</td>
                                          
                                      @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>  
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        
                                      @endif
                                    </tr>
                                  @endforeach
                                @endforeach
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
</html>

