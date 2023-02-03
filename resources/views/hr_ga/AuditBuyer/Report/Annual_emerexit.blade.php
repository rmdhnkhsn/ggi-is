@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
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
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
  <section class="content-header">
      <div class="container-fluid">
        <form action="{{ route('hr_ga.auditbuyer.getexitpdf')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="tahun" id="tahun" value="{{$tahun}}">
              <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
              <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
        </form>
          <div class="row">
              <div class="col-12">
                  
                  <div class="card">
                      <div class="card-body" style="overflow:scroll;">
                          <center>
                            <h3 style="font-weight:bold;font-size:20px;"> ANNUAL REPORT SAFETY COMPLIENCE CONTROLL EMERGENCY EXIT</h3>
                            <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                            <h3 style="font-weight:bold;font-size:13px;"> {{$tahun}}</h3> 
                          </center>
                          
                          <br>
                        <table class="table table-bordered">
                          <tr>
                              <td style="font-weight:bold;">Bulan</td>
                              <td style="font-weight:bold;">Kode Lokasi</td>
                              <td style="font-weight:bold;">Lokasi</td>
                              <td style="font-weight:bold;">Tanggal Kontrol </td>
                              <td style="font-weight:bold;">TerdapatEmergency Exit  </td>
                              <td style="font-weight:bold;">Kondisi Lampu</td>
                              <td style="font-weight:bold;">Kebersihan</td>
                              <td style="font-weight:bold;">Petugas</td>
                          </tr>
                          @foreach($record_emerexit as $key =>$value)
                          <tr>
                              <td rowspan="{{count($value) + 1 }}">{{$key}}</td>
                          </tr>
                            @foreach($value as $dp)
                              <tr>
                                <td>{{$dp['kode_lokasi']}}</td>
                                <td>{{$dp['nama_lokasi']}}</td>
                                @if($dp['tgl_periksa'] != null )
                                  <td>{{$dp['tgl_periksa']}}</td>
                                  <td>{{$dp['ada_exit']}}</td>
                                  <td>{{$dp['kondisi_lampu']}}</td>
                                  <td>{{$dp['kebersihan']}}</td>
                                  <td>{{$dp['petugas']}}</td>
                                  @else
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
@endsection

@push("scripts")

@endpush

