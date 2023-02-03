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
            <!-- <div class="btn-group" style="padding-bottom:10px">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
            </div> -->
            <form action="{{ route('hr_ga.auditbuyer.getblnpdf')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
                <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
            </form>
            <div class="row">
                <div class="col-12">
                    
                    <div class="card">
                        <div class="card-body" style="overflow:scroll;">
                            <center><h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT SAFETY COMPLIENCE CONTROLL</h3>
                            <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                            <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3> </center>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="13" style="font-weight:bold;">CONTROLL APAR</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">No</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Tekanan APAR </td>
                                    <td style="font-weight:bold;">Pin Pengaman APAR</td>
                                    <td style="font-weight:bold;">Kondisi Selang</td>
                                    <td style="font-weight:bold;">Berat Tabung APAR</td>
                                    <td style="font-weight:bold;">Masa Berlaku Pengisian</td>
                                    <td style="font-weight:bold;">Kondisi Handle/Tuas</td>
                                    <td style="font-weight:bold;">Garis Merah / Red Line APAR</td>
                                    <td style="font-weight:bold;">Kondisi Sign APAR</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                </tr>
                                <?php $no=1;?>
                            @foreach($record_apar as $key =>$value)
                                @foreach($value as $dp)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$dp['kode_lokasi']}}</td>
                                    <td>{{$dp['nama_lokasi']}}</td>
                                    @if($dp['id_report'] == null )
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
                                <?php $no++ ;?>
                                @endforeach
                            @endforeach
                            
                            
                            </table>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="8" style="font-weight:bold;">CONTROLL ALARM BUTTON</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">No</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Kondisi Tombol Alaram </td>
                                    <td style="font-weight:bold;">Kebersihan tombol alarm</td>
                                    <td style="font-weight:bold;">Chechklist tombol alarm</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                </tr>
                            
                            @foreach($record_alarm as $key =>$value)
                                <tr>
                                    <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                </tr>
                                @foreach($value as $dp)
                                <tr>
                                    <td>{{$dp['kode_lokasi']}}</td>
                                    <td>{{$dp['nama_lokasi']}}</td>
                                    @if($dp['id_report'] == null )
                                    <td>{{$dp['tgl_periksa']}}</td>
                                    <td>{{$dp['kondisi']}}</td>
                                    <td>{{$dp['kebersihan']}}</td>
                                    <td>{{$dp['ceklis']}}</td>
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
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="8" style="font-weight:bold;">CONTROLL SMOKE DETECTOR</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">No</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Terdapat smoke detector</td>
                                    <td style="font-weight:bold;">Fungsi smoke detector</td>
                                    <td style="font-weight:bold;">Baterai Smoke Detector</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                </tr>
                            
                            @foreach($record_smokedet as $key =>$value)
                                <tr>
                                    <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                </tr>
                                @foreach($value as $dp)
                                <tr>
                                    <td>{{$dp['kode_lokasi']}}</td>
                                    <td>{{$dp['nama_lokasi']}}</td>
                                    @if($dp['id_report'] == null )
                                    <td>{{$dp['tgl_periksa']}}</td>
                                    <td>{{$dp['ada_smoke']}}</td>
                                    <td>{{$dp['fungsi']}}</td>
                                    <td>{{$dp['baterai']}}</td>
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
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="8" style="font-weight:bold;">CONTROLL EMERGENCY EXIT</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">No</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Terdapat Emergency Exit  </td>
                                    <td style="font-weight:bold;">Kondisi Lampu</td>
                                    <td style="font-weight:bold;">Kebersihan</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                </tr>
                            
                            @foreach($record_emerexit as $key =>$value)
                                <tr>
                                    <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                </tr>
                                @foreach($value as $dp)
                                <tr>
                                    <td>{{$dp['kode_lokasi']}}</td>
                                    <td>{{$dp['nama_lokasi']}}</td>
                                    @if($dp['id_report'] == null )
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
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="8" style="font-weight:bold;">CONTROLL EMERGENCY LAMP</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">No</td>
                                    <td style="font-weight:bold;">Kode Lokasi</td>
                                    <td style="font-weight:bold;">Lokasi</td>
                                    <td style="font-weight:bold;">Tanggal Kontrol </td>
                                    <td style="font-weight:bold;">Kondisi Lampu </td>
                                    <td style="font-weight:bold;">Kebersihan Lampu</td>
                                    <td style="font-weight:bold;">Form Checklist</td>
                                    <td style="font-weight:bold;">Petugas</td>
                                </tr>
                            
                            @foreach($record_emerlamp as $key =>$value)
                                <tr>
                                    <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                </tr>
                                @foreach($value as $dp)
                                <tr>
                                    <td>{{$dp['kode_lokasi']}}</td>
                                    <td>{{$dp['nama_lokasi']}}</td>
                                    @if($dp['id_report'] == null )
                                    <td>{{$dp['tgl_periksa']}}</td>
                                    <td>{{$dp['kondisi']}}</td>
                                    <td>{{$dp['kebersihan']}}</td>
                                    <td>{{$dp['form']}}</td>
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
