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

  .headerLogo {

  }
  .logoGistex {
    position: relative;
  }
  .title-side {
    position: absolute;
    top: -30px;
    left: 500px;
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
                                        <center><h2 style="font-weight:bold;">DATA REPORT FINISHING</h2></center> 
                                        <center><h4>FACILITY : {{ $dataBranch->nama_branch }}</h4> </center>                                    
                                        <center><h4>DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }}</h4> </center>
                                    </div>
                                </div>
                                  {{-- <center><h3 style="font-weight:bold;">DATA REPORT FINISHING</h3></center>
                                  <center><h4>FACILITY : {{ $dataBranch->nama_branch }}  </h4></center> 
                                  <center><h4>DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }} </h4></center> --}}
                                  <br>
                                  <table style="width:1300px">
                                    <thead>
                                      <tr>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">NO</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TANGGAL</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">BUYER</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">PROSES</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">PLACING</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">START</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">FINISH</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">NAMA</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">NIK</td>
                                        <td style="font-weight:bold;padding-right:15px;padding-left:15px;">REMARK</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data_awal as $key => $value)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{  \Carbon\Carbon::parse($value['tanggal'] )->locale('id')->format('d-m-Y')  }}</td>
                                      <td>{{ $value['style'] }}</td>
                                      <td>{{ $value['buyer'] }}</td>
                                      <td>{{ $value['status_proses'] }},{{ str_replace(['"','[',']'], '', $value['status']) }}</td>
                                      <td>{{ $value['placing'] }}</td>
                                      <td>{{ $value['wo'] }}</td>
                                      <td>{{ $value['qty_target'] }}</td>
                                      <td>{{ $value['jam_mulai'] }}</td>
                                      <td>{{ $value['jam_selesai'] }}</td>
                                      <td>{{ $value['nama'] }}</td>
                                      <td>{{ $value['nik'] }}</td>
                                      <td>{{ $value['remark'] }}</td>
                                    </tr>
                                    @endforeach
                                      <tr>
                                        <td colspan="6">TOTAL TARGET</td>
                                        <td></td>
                                        <td>{{ $summarytarget }}</td>
                                        <td colspan="5"></td>
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
      </div>
  </body>
</html>

                     


