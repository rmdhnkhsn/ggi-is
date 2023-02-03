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
            <div class="row">
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll px-1">Alarm Button</p>
                        <p class="desc-controll px-1">{{$count_PerItem['alarm']}}</p>
                        <img class="image-controll" src="{{url('images/iconpack/icon-alarm.svg')}}">
                    </div>
                </div>
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll px-1">Smoke Detector</p>
                        <p class="desc-controll px-1">{{$count_PerItem['smokedet']}}</p>
                        <img class="image-controll" src="{{url('images/iconpack/icon-smoke.svg')}}">
                    </div>
                </div>
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll px-1">APAR</p>
                        <p class="desc-controll px-1">{{$count_PerItem['apar']}}</p>
                        <img class="image-controll" src="{{url('images/iconpack/icon-apar.svg')}}">
                        
                    </div>
                </div>
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll px-1">Emergency Exit</p>
                        <p class="desc-controll px-1">{{$count_PerItem['emerexit']}}</p>
                        <img class="image-controll" src="{{url('images/iconpack/icon-emexit.svg')}}">
                    </div>
                </div>
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll px-1">Emergency Lamp</p>
                        <p class="desc-controll px-1">{{$count_PerItem['emerlamp']}}</p>
                        <img class="image-controll" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                    </div>
                </div>
                <div class="col-controll-responsive mb-3">
                    <div class="cards-controll">
                        <p class="desc-controll icon-report px-1">Overall</p>
                        <p class="desc-controll icon-report px-1">{{$count_PerItem['total']}}</p>
                        <img class="image-controll mt-1" src="{{url('images/iconpack/icon-report.svg')}}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <form  enctype="multipart/form-data"> -->
                            <a  href="{{ route('hr_ga.auditbuyer.repairpdf')}}" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i> Download PDF</a> 
                        <!-- </form> -->
                        <div class="card-body" style="overflow:scroll;">
                            <h3 style="font-weight:bold;font-size:20px;">Details Damage Recap</h3>
                            <br>
                            <h3 style="font-weight:bold;font-size:13px;">Alarm Button</h3>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color:#DCDCDC;">No</td>
                                    <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                    <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                    <td style="background-color:#DCDCDC;">Keterangan</td>
                                </tr>
                                <?php $no=1;?>
                                @foreach($record_alarm as $key =>$value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$value['kode_lokasi']}}</td>
                                    <td>{{$value['nama_lokasi']}}</td>
                                    @if($value['count']> '0')
                                    <td>{{$value['tgl_periksa']}}</td>
                                    <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                        @if($value['finish'] != null)
                                        <td>{{$value['finish']}}</td>
                                        @else
                                        <td>Proses Perbaikan</td>
                                        @endif
                                    @else
                                    <td>-</td>
                                    <td><i class="fas fa-check-circle"></i></td>
                                    <td>-</td>
                                    @endif

                                <?php $no++ ;?>
                                @endforeach
                            </table>
                            <br>
                            <br>
                            <h3 style="font-weight:bold;font-size:13px;">Smoke Detector</h3>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color:#DCDCDC;">No</td>
                                    <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                    <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                    <td style="background-color:#DCDCDC;">Keterangan</td>
                                </tr>
                                <?php $no=1;?>
                                @foreach($record_SmokeDet as $key =>$value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$value['kode_lokasi']}}</td>
                                    <td>{{$value['nama_lokasi']}}</td>
                                    @if($value['count']> '0')
                                    <td>{{$value['tgl_periksa']}}</td>
                                    <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                        @if($value['finish'] != null)
                                        <td>{{$value['finish']}}</td>
                                        @else
                                        <td>Proses Perbaikan</td>
                                        @endif
                                    @else
                                    <td>-</td>
                                    <td><i class="fas fa-check-circle"></i></td>
                                    <td>-</td>
                                    @endif

                                <?php $no++ ;?>
                                @endforeach
                            </table>
                            <br>
                            <br>
                            <h3 style="font-weight:bold;font-size:13px;">APAR</h3>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color:#DCDCDC;">No</td>
                                    <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                    <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                    <td style="background-color:#DCDCDC;">Keterangan</td>
                                </tr>
                                <?php $no=1;?>
                                @foreach($record_Apar as $key =>$value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$value['kode_lokasi']}}</td>
                                    <td>{{$value['nama_lokasi']}}</td>
                                    @if($value['count']> '0')
                                    <td>{{$value['tgl_periksa']}}</td>
                                    <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                        @if($value['finish'] != null)
                                        <td>{{$value['finish']}}</td>
                                        @else
                                        <td>Proses Perbaikan</td>
                                        @endif
                                    @else
                                    <td>-</td>
                                    <td><i class="fas fa-check-circle"></i></td>
                                    <td>-</td>
                                    @endif

                                <?php $no++ ;?>
                                @endforeach
                            </table>
                            <br>
                            <br>
                            <h3 style="font-weight:bold;font-size:13px;">Emergency Exit</h3>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color:#DCDCDC;">No</td>
                                    <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                    <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                    <td style="background-color:#DCDCDC;">Keterangan</td>
                                </tr>
                                <?php $no=1;?>
                                @foreach($record_EmerExit as $key =>$value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$value['kode_lokasi']}}</td>
                                    <td>{{$value['nama_lokasi']}}</td>
                                    @if($value['count']> '0')
                                    <td>{{$value['tgl_periksa']}}</td>
                                    <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                        @if($value['finish'] != null)
                                        <td>{{$value['finish']}}</td>
                                        @else
                                        <td>Proses Perbaikan</td>
                                        @endif
                                    @else
                                    <td>-</td>
                                    <td><i class="fas fa-check-circle"></i></td>
                                    <td>-</td>
                                    @endif

                                <?php $no++ ;?>
                                @endforeach
                            </table>
                            <br>
                            <br>
                            <h3 style="font-weight:bold;font-size:13px;">Emergency Lamp</h3>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td style="background-color:#DCDCDC;">No</td>
                                    <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Lokasi</td>
                                    <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                    <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                    <td style="background-color:#DCDCDC;">Keterangan</td>
                                </tr>
                                <?php $no=1;?>
                                @foreach($record_EmerLamp as $key =>$value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$value['kode_lokasi']}}</td>
                                    <td>{{$value['nama_lokasi']}}</td>
                                    @if($value['count']> '0')
                                    <td>{{$value['tgl_periksa']}}</td>
                                    <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                        @if($value['finish'] != null)
                                        <td>{{$value['finish']}}</td>
                                        @else
                                        <td>Proses Perbaikan</td>
                                        @endif
                                    @else
                                    <td>-</td>
                                    <td><i class="fas fa-check-circle"></i></td>
                                    <td>-</td>
                                    @endif

                                <?php $no++ ;?>
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
