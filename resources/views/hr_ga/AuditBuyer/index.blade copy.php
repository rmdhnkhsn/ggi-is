@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="notif-hp mb-2">
                    <button type="button" class="notif-modal" data-toggle="modal" data-target="#notifHP" title="View Notification">
                        <span class="desc-notifHP ml-1">Notification</span>
                        <i class="icon-notifHP fas fa-bell"></i>
                        @if(($tgl >= '20') AND ($jml_notif > 0))
                        <span class="notifHP-count">{{$jml_notif}}</span>
                        @endif
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="notifHP" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(($tgl >= '20') AND ($jml_notif > 0))
                                            <div class="notif-hp">
                                                <!-- ======================================== -->
                                                @if($tgl >= '27')
                                                @foreach ($notif as $key => $value)
                                                    @if($value['id_item']=='1')
                                                    <div class="alertt alert-merah">
                                                        <div class="icon-notification bg-merah">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarm.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='2')
                                                    <div class="alertt alert-merah">
                                                        <div class="icon-notification bg-merah">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='3')
                                                    <div class="alertt alert-merah">
                                                        <div class="icon-notification bg-merah">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='4')
                                                    <div class="alertt alert-merah">
                                                        <div class="icon-notification bg-merah">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='5')
                                                    <div class="alertt alert-merah">
                                                        <div class="icon-notification bg-merah">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @endif

                                                @if(($tgl >= '24') && ($tgl < '27'))
                                                <!-- ============================== -->
                                                @foreach ($notif as $key => $value)
                                                    @if($value['id_item']=='1')
                                                    <div class="alertt alert-kuning">
                                                        <div class="icon-notification bg-kuning">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarmkuning.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='2')
                                                    <div class="alertt alert-kuning">
                                                        <div class="icon-notification bg-kuning">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='3')
                                                    <div class="alertt alert-kuning">
                                                        <div class="icon-notification bg-kuning">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='4')
                                                    <div class="alertt alert-kuning">
                                                        <div class="icon-notification bg-kuning">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='5')
                                                    <div class="alertt alert-kuning">
                                                        <div class="icon-notification bg-kuning">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @endif
                                                <!-- ================================== -->
                                                @if(($tgl >= '20') && ($tgl < '24'))
                                                @foreach ($notif as $key => $value)
                                                    @if($value['id_item']=='1')
                                                    <div class="alertt alert-hijau">
                                                        <div class="icon-notification bg-hijau">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarmhijau.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='2')
                                                    <div class="alertt alert-hijau">
                                                        <div class="icon-notification bg-hijau">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='3')
                                                    <div class="alertt alert-hijau">
                                                        <div class="icon-notification bg-hijau">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='4')
                                                    <div class="alertt alert-hijau">
                                                        <div class="icon-notification bg-hijau">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @elseif($value['id_item']=='5')
                                                    <div class="alertt alert-hijau">
                                                        <div class="icon-notification bg-hijau">
                                                            <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                                        </div>
                                                        <span class="desc-notif truncate">
                                                            <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                                        </span>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @endif
                                            </div>
                                            @endif 
                                        </div>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        @if($user_login=='SYS_ADMIN')
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
        <center><a href="{{ route('hr_ga.auditbuyer.repair')}}"><h5>See Details...</h5></a></center>
        @endif

        <div class="row">
            @if($user_login=='SYS_ADMIN')
            <div class="col-xl-6 mb-4">
                <ul class="nav nav-tabs md-tabs mb-4" role="tablist">
                    <li class="nav-item-show">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#damage" role="tab"></i>Damage
                        @if( $count_PerStatus['damage'] != 0)   
                            <span class="number-badge">{{$count_PerStatus['damage']}}</span>
                        @endif    
                        </a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item-show">
                        <a class="nav-link py-2" data-toggle="tab" href="#process" role="tab"></i>On Process
                        @if( $count_PerStatus['process'] != 0)     
                            <span class="number-badge">{{$count_PerStatus['process']}}</span>
                        @endif 
                        </a>
                        <div class="slide"></div>
                    </li>
                    
                    <li class="nav-item-show">
                        <a class="nav-link py-2" data-toggle="tab" href="#finish-1" role="tab"></i>Finish
                        @if( $count_PerStatus['finish'] != 0)    
                            <span class="number-badge">{{$count_PerStatus['finish']}}</span>
                        @endif     
                        </a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="damage" role="tabpanel">
                   
                        <!-- <div class="no-ticket-queue">
                            <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                            <span class="no-ticket-capt">No Ticket Queue</span>
                        </div> -->

                        <!-- alarm -->
                        @foreach ($alarm_perbaikan as $key => $value)
                        @if($value->perbaikan == null)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Alarm Button</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Upps..!, Sepertinya ada masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header> 
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Tombol Alaram</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan tombol alarm</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Chechklist tombol alarm</td>
                                    <td width="65%">{{$value->ceklis}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        @if($value->kondisi=='Rusak')
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-1{{$value ['id'] }}" title="View Info">Proses
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                        <!-- Modal proses -->
                                        <div class="modal fade" id="modal-1{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL ALARM BUTTON
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                        <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.alaram.perbaikan')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="perbaikan" name="perbaikan" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        @elseif(($value->kebersihan=='Kotor')OR($value->ceklis=='Tidak'))
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-2{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-2{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL ALARM BUTTON
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                    <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.alaram.finish')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3 mt-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Kondisi Tombol Alarm</div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="kondisi" value="Bagus" class="blue-radio" id="AB-1{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Bagus' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-1{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Bagus</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="kondisi" value="Rusak" class="red-radio" id="AB-2{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-2{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Rusak</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
    
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Kebersihan Tombol Alarm</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="AB-3{{$value ['id'] }}"{{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-3{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Bersih</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="AB-4{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-4{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Kotor</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
    
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Chechklist tombol alarm</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="ceklis" value="Ada" class="blue-radio" id="AB-5{{$value ['id'] }}" {{ $value ? ($value->ceklis == 'Ada' ? 'checked' : '') : '' }} >
                                                                                    <label for="AB-5{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Ada</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="ceklis" value="Tidak" class="red-radio" id="AB-6{{$value ['id'] }}" {{ $value ? ($value->ceklis == 'Tidak' ? 'checked' : '') : '' }} >
                                                                                    <label for="AB-6{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Tidak</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- Smoke Detector -->
                        @foreach ($SmokeDet_perbaikan as $key => $value)
                        @if($value->perbaikan == null)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 software-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-robot icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Smoke Detector</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Upps..!, Sepertinya ada masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat smoke detector</td>
                                    <td width="65%">{{$value->ada_smoke}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Fungsi smoke detector</td>
                                    <td width="65%">{{$value->fungsi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Baterai Smoke Detector	</td>
                                    <td width="65%">{{$value->baterai}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-1s{{$value ['id'] }}" title="View Info">Proses
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                        <!-- Modal proses -->
                                        <div class="modal fade" id="modal-1s{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL SMOKE DETECTOR
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                        <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.smokedet.perbaikan')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="perbaikan" name="perbaikan" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- APAR -->
                        @foreach ($apar_perbaikan as $key => $value)
                        @if($value->perbaikan == null)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">APAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Upps..!, Sepertinya ada masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Tekanan APAR</td>
                                    <td width="65%">{{$value->tekanan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Pin Pengaman APAR</td>
                                    <td width="65%">{{$value->pin}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Selang</td>
                                    <td width="65%">{{$value->kondisi_selang}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Berat Tabung APAR	</td>
                                    <td width="65%">{{$value->berat_tabung}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Masa Berlaku Pengisian	</td>
                                    <td width="65%">{{$value->masa_berlaku}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Handle/Tuas	</td>
                                    <td width="65%">{{$value->kondisi_tuas}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Garis Merah / Red Line APAR	</td>
                                    <td width="65%">{{$value->garis_merah}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Sign APAR	</td>
                                    <td width="65%">{{$value->kondisi_sign}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        @if(($value->tekanan == 'Rendah') OR ($value->pin == 'Tidak') OR($value->kondisi_tuas == 'Tidak'))
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-1ap{{$value ['id'] }}" title="View Info">Proses
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                        <!-- Modal proses -->
                                        <div class="modal fade" id="modal-1ap{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL APAR
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                        <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.apar.perbaikan')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="perbaikan" name="perbaikan" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-2ap{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-2ap{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL APAR
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.apar.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Tekanan APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="tekanan" value="Tinggi" class="blue-radio" id="AP-1{{$value ['id'] }}" {{ $value ? ($value->tekanan == 'Tinggi' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue">Tinggi</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="tekanan" value="Normal" class="green-radio" id="AP-2{{$value ['id'] }}" {{ $value ? ($value->tekanan == 'Normal' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-2{{$value ['id'] }}" class="option option-3">
                                                                                    <span class="radio-title-green">Normal</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="tekanan" value="Rendah" class="red-radio" id="AP-3{{$value ['id'] }}"  {{ $value ? ($value->tekanan == 'Rendah' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-3{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red">Rendah </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Pin Pengaman APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="pin" value="Ada" class="blue-radio" id="AP-4{{$value ['id'] }}" {{ $value ? ($value->pin == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-4{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="pin" value="Tidak" class="red-radio" id="AP-5{{$value ['id'] }}" {{ $value ? ($value->pin == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-5{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Selang</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_selang" value="Bagus" class="blue-radio" id="AP-6{{$value ['id'] }}" {{ $value ? ($value->kondisi_selang == 'Bagus' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-6{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bagus</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_selang" value="Rusak" class="red-radio" id="AP-7{{$value ['id'] }}"{{ $value ? ($value->kondisi_selang == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-7{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Rusak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Berat Tabung APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="berat_tabung" value="25Kg" class="blue-radio" id="AP-8{{$value ['id'] }}"{{ $value ? ($value->berat_tabung == '25Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-8{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue">25Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="berat_tabung" value="6Kg" class="green-radio" id="AP-9{{$value ['id'] }}"{{ $value ? ($value->berat_tabung == '6Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-9{{$value ['id'] }}" class="option option-3">
                                                                                    <span class="radio-title-green">6Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="berat_tabung" value="3Kg3" class="red-radio" id="AP-10{{$value ['id'] }}" {{ $value ? ($value->berat_tabung == '3Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-10{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red">3Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Masa Berlaku Pengisian</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                                <div class="input-group-append " data-target="#reservationdate" data-toggle="datetimepicker">
                                                                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Tanggal</span><i class="ml-2 fas fa-caret-down"></i></div>
                                                                                </div>
                                                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="masa_berlaku" value="{{$value->tgl_periksa }}" placeholder="Pilih Tanggal" required/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Handle/Tuas</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_tuas" value="Ada" class="blue-radio" id="AP-11{{$value ['id'] }}"{{ $value ? ($value->kondisi_tuas == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-11{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_tuas" value="Tidak" class="red-radio" id="AP-12{{$value ['id'] }}"{{ $value ? ($value->kondisi_tuas == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-12{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Garis Merah/Red Line APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="garis_merah" value="Ada" class="blue-radio" id="AP-13{{$value ['id'] }}" {{ $value ? ($value->garis_merah == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-13{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="garis_merah" value="Tidak" class="red-radio" id="AP-14{{$value ['id'] }}"  {{ $value ? ($value->garis_merah == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-14{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                

                                                                <div class="content-apar mb-3"  >
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Sign APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2 px-2 options">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Petunjuk APAR Rusak" id="check1" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check1">
                                                                                <span class="kondisi-sign">Petunjuk APAR Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Cara Penggunaan APAR Rusak" id="check2" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check2">
                                                                                <span class="kondisi-sign">Cara Penggunaan APAR Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Instruksi Kerja Rusak" id="check3" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check3">
                                                                                <span class="kondisi-sign">Instruksi Kerja Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Label 'Dilarang Menyimpan Barang di Area APAR' Rusak" id="check4" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check4">
                                                                                <span class="kondisi-sign">Label "Dilarang Menyimpan Barang di Area APAR" Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Ceklis APAR Tidak ada/belum diupdate" id="check5" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check5">
                                                                                <span class="kondisi-sign">Ceklis APAR Tidak ada/belum diupdate</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Semua Sign Dalam Kondisi Baik" id="check6" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check6">
                                                                                <span class="kondisi-sign">Semua Sign Dalam Kondisi Baik</span>
                                                                            </label>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- Emergency Exit -->
                        @foreach ($EmerExit_perbaikan as $key => $value)
                        @if($value->perbaikan == null)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 pinjaman-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="far fa-credit-card icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Exit</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Upps..!, Sepertinya ada masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat Emergency Exit</td>
                                    <td width="65%">{{$value->ada_exit}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi_lampu}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        @if(($value->ada_exit=='Tidak') OR ($value->kondisi_lampu=='Mati'))
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-1ee{{$value ['id'] }}" title="View Info">Proses
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                        <!-- Modal proses -->
                                        <div class="modal fade" id="modal-1ee{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                CONTROLL EMERGENCY EXIT
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                        <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.emerexit.perbaikan')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="perbaikan" name="perbaikan" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-2ee{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-2ee{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL EMERGENCY EXIT
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.emerexit.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Apakah Ada Lampu Emergency Exit Tersebut ?</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="ada_exit" value="Ada" class="blue-radio" id="EE-1{{$value ['id'] }}" {{ $value ? ($value->ada_exit == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="ada_exit" value="Tidak" class="red-radio" id="EE-2{{$value ['id'] }}" {{ $value ? ($value->ada_exit == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-2{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Lampu</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_lampu" value="Menyala" class="blue-radio" id="EE-3{{$value ['id'] }}" {{ $value ? ($value->kondisi_lampu == 'Menyala' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-3{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Menyala</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_lampu" value="Mati" class="red-radio" id="EE-4{{$value ['id'] }}" {{ $value ? ($value->kondisi_lampu == 'Mati' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-4{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Mati</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kebersihan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="EE-5{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-5{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bersih</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="EE-6{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-6{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Kotor</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- Emergency Lamp -->
                        @foreach ($EmerLamp_perbaikan as $key => $value)
                        @if($value->perbaikan == null)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 hardware-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-desktop icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Lamp</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Upps..!, Sepertinya ada masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan Lampu</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Form Checklist</td>
                                    <td width="65%">{{$value->form}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        @if($value->kondisi=='Rusak')
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-1el{{$value ['id'] }}" title="View Info">Proses
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                        <!-- Modal proses -->
                                        <div class="modal fade" id="modal-1el{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL EMERGENCY LAMP
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                        <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route ('hr_ga.emerlamp.perbaikan')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="perbaikan" name="perbaikan" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-2el{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-2el{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL EMERGENCY LAMP
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.emerlamp.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Lampu</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi" value="Menyala" class="blue-radio" id="EL-1{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Menyala' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Menyala</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi" value="Rusak" class="red-radio" id="EL-2{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-2{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Rusak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kebersihan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="EL-3{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-3{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bersih</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="EL-4{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-4{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Kotor</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Form Checklist</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="form" value="Ada" class="blue-radio" id="EL-5{{$value ['id'] }}" {{ $value ? ($value->form == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-5{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="form" value="Tidak" class="red-radio" id="EL-6{{$value ['id'] }}" {{ $value ? ($value->form == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-6{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                        @endforeach
                  
                    </div>

                     <div class="tab-pane" id="process" role="tabpanel">
                        <!-- <div class="no-ticket-queue">
                            <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                            <span class="no-ticket-capt">No Ticket Queue</span>
                        </div> -->

                        <!-- ALARM -->
                        @foreach ($alarm_proses as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Alarm Button</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Memprosess masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header> 
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Tombol Alaram</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan tombol alarm</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Chechklist tombol alarm</td>
                                    <td width="65%">{{$value->ceklis}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->perbaikan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-3{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="judul-apar">
                                                                    CONTROLL ALARM BUTTON
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                    <div class="apar-info">
                                                                    <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('hr_ga.alaram.finish')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                    <div class="content-apar mb-3 mt-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Kondisi Tombol Alarm</div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="kondisi" value="Bagus" class="blue-radio" id="AB-1{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Bagus' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-1{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Bagus</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="kondisi" value="Rusak" class="red-radio" id="AB-2{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-2{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Rusak</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
    
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Kebersihan Tombol Alarm</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="AB-3{{$value ['id'] }}"{{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-3{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Bersih</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="AB-4{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                    <label for="AB-4{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Kotor</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
    
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Chechklist tombol alarm</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio">
                                                                                    <input type="radio" name="ceklis" value="Ada" class="blue-radio" id="AB-5{{$value ['id'] }}" {{ $value ? ($value->ceklis == 'Ada' ? 'checked' : '') : '' }} >
                                                                                    <label for="AB-5{{$value ['id'] }}" class="option option-1">
                                                                                        <span class="radio-title-blue mr-2">Ada</span>
                                                                                        <i class="icon-sub-blue fas fa-check"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="wrapper-radio"> 
                                                                                    <input type="radio" name="ceklis" value="Tidak" class="red-radio" id="AB-6{{$value ['id'] }}" {{ $value ? ($value->ceklis == 'Tidak' ? 'checked' : '') : '' }} >
                                                                                    <label for="AB-{{$value ['id'] }}" class="option option-2">
                                                                                        <span class="radio-title-red mr-2">Tidak</span>
                                                                                        <i class="icon-sub-red fas fa-times"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="content-apar mb-3">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="apar-title">Keterangan</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                    <button type="submit" class="btn btn-kirim btn-block mb-2" data-toggle="modal" data-target="#modal-default">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach

                        <!-- Smoke Detector -->
                        @foreach ($SmokeDet_proses as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 software-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-robot icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Smoke Detector</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Memprosess masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat smoke detector</td>
                                    <td width="65%">{{$value->ada_smoke}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Fungsi smoke detector</td>
                                    <td width="65%">{{$value->fungsi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Baterai Smoke Detector	</td>
                                    <td width="65%">{{$value->baterai}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->perbaikan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3s{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-3s{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL SMOKE DETECTOR
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                    <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                    <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.smokedet.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Apakah ada SMOKE DETECTOR di lokasi tersebut..?</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="ada_smoke" value="Ada" class="blue-radio" id="SD-1{{$value ['id'] }}" {{ $value ? ($value->ada_smoke == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="ada_smoke" value="Tidak" class="red-radio" id="SD-2{{$value ['id'] }}" {{ $value ? ($value->ada_smoke == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-2{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Cek Fungsi smoke detector</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="fungsi" value="Berfungsi" class="blue-radio" id="SD-3{{$value ['id'] }}" {{ $value ? ($value->fungsi == 'Berfungsi' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-3{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Berfungsi</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="fungsi" value="Tidak" class="red-radio" id="SD-4{{$value ['id'] }}"{{ $value ? ($value->fungsi == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-4{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Cek Baterai Smoke Detector</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="baterai" value="Bagus" class="blue-radio" id="SD-5{{$value ['id'] }}" {{ $value ? ($value->baterai == 'Bagus' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-5{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bagus</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="baterai" value="Rusak" class="red-radio" id="SD-6{{$value ['id'] }}" {{ $value ? ($value->baterai == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                <label for="SD-6{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Rusak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- APAR -->
                        @foreach ($apar_proses as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">APAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Memprosess masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Tekanan APAR</td>
                                    <td width="65%">{{$value->tekanan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Pin Pengaman APAR</td>
                                    <td width="65%">{{$value->pin}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Selang</td>
                                    <td width="65%">{{$value->kondisi_selang}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Berat Tabung APAR	</td>
                                    <td width="65%">{{$value->berat_tabung}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Masa Berlaku Pengisian	</td>
                                    <td width="65%">{{$value->masa_berlaku}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Handle/Tuas	</td>
                                    <td width="65%">{{$value->kondisi_tuas}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Garis Merah / Red Line APAR	</td>
                                    <td width="65%">{{$value->garis_merah}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Sign APAR	</td>
                                    <td width="65%">{{$value->kondisi_sign}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->perbaikan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3ap{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-3ap{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL APAR
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.apar.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Tekanan APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="tekanan" value="Tinggi" class="blue-radio" id="AP-1{{$value ['id'] }}" {{ $value ? ($value->tekanan == 'Tinggi' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue">Tinggi</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="tekanan" value="Normal" class="green-radio" id="AP-2{{$value ['id'] }}" {{ $value ? ($value->tekanan == 'Normal' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-2{{$value ['id'] }}" class="option option-3">
                                                                                    <span class="radio-title-green">Normal</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="tekanan" value="Rendah" class="red-radio" id="AP-3{{$value ['id'] }}"  {{ $value ? ($value->tekanan == 'Rendah' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-3{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red">Rendah </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Pin Pengaman APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="pin" value="Ada" class="blue-radio" id="AP-4{{$value ['id'] }}" {{ $value ? ($value->pin == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-4{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="pin" value="Tidak" class="red-radio" id="AP-5{{$value ['id'] }}" {{ $value ? ($value->pin == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-5{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Selang</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_selang" value="Bagus" class="blue-radio" id="AP-6{{$value ['id'] }}" {{ $value ? ($value->kondisi_selang == 'Bagus' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-6{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bagus</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_selang" value="Rusak" class="red-radio" id="AP-7{{$value ['id'] }}"{{ $value ? ($value->kondisi_selang == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-7{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Rusak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Berat Tabung APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="berat_tabung" value="25Kg" class="blue-radio" id="AP-8{{$value ['id'] }}"{{ $value ? ($value->berat_tabung == '25Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-8{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue">25Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="berat_tabung" value="6Kg" class="green-radio" id="AP-9{{$value ['id'] }}"{{ $value ? ($value->berat_tabung == '6Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-9{{$value ['id'] }}" class="option option-3">
                                                                                    <span class="radio-title-green">6Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="berat_tabung" value="3Kg" class="red-radio" id="AP-10{{$value ['id'] }}" {{ $value ? ($value->berat_tabung == '3Kg' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-10{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red">3Kg</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Masa Berlaku Pengisian</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                                <div class="input-group-append " data-target="#reservationdate" data-toggle="datetimepicker">
                                                                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Tanggal</span><i class="ml-2 fas fa-caret-down"></i></div>
                                                                                </div>
                                                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="masa_berlaku" value="{{$value->tgl_periksa }}" placeholder="Pilih Tanggal" required/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Handle/Tuas</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_tuas" value="Ada" class="blue-radio" id="AP-11{{$value ['id'] }}"{{ $value ? ($value->kondisi_tuas == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-11{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_tuas" value="Tidak" class="red-radio" id="AP-12{{$value ['id'] }}"{{ $value ? ($value->kondisi_tuas == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-12{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Garis Merah/Red Line APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="garis_merah" value="Ada" class="blue-radio" id="AP-13{{$value ['id'] }}" {{ $value ? ($value->garis_merah == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-13{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="garis_merah" value="Tidak" class="red-radio" id="AP-14{{$value ['id'] }}"  {{ $value ? ($value->garis_merah == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="AP-14{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                

                                                                <div class="content-apar mb-3"  >
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Sign APAR</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2 px-2 options">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Petunjuk APAR Rusak" id="check1" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check1">
                                                                                <span class="kondisi-sign">Petunjuk APAR Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Cara Penggunaan APAR Rusak" id="check2" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check2">
                                                                                <span class="kondisi-sign">Cara Penggunaan APAR Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Instruksi Kerja Rusak" id="check3" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check3">
                                                                                <span class="kondisi-sign">Instruksi Kerja Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Label 'Dilarang Menyimpan Barang di Area APAR' Rusak" id="check4" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check4">
                                                                                <span class="kondisi-sign">Label "Dilarang Menyimpan Barang di Area APAR" Rusak</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Ceklis APAR Tidak ada/belum diupdate" id="check5" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check5">
                                                                                <span class="kondisi-sign">Ceklis APAR Tidak ada/belum diupdate</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="Semua Sign Dalam Kondisi Baik" id="check6" name="kondisi_sign[]" required>
                                                                            <label class="form-check-label" for="check6">
                                                                                <span class="kondisi-sign">Semua Sign Dalam Kondisi Baik</span>
                                                                            </label>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- Emergency Exit -->
                        @foreach ($EmerExit_proses as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 pinjaman-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="far fa-credit-card icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Exit</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Memprosess masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat Emergency Exit</td>
                                    <td width="65%">{{$value->ada_exit}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi_lampu}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->perbaikan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                    
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3ee{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-3ee{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL EMERGENCY EXIT
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.emerexit.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Apakah Ada Lampu Emergency Exit Tersebut ?</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="ada_exit" value="Ada" class="blue-radio" id="EE-1{{$value ['id'] }}" {{ $value ? ($value->ada_exit == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="ada_exit" value="Tidak" class="red-radio" id="EE-2{{$value ['id'] }}" {{ $value ? ($value->ada_exit == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-2{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Lampu</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi_lampu" value="Menyala" class="blue-radio" id="EE-3{{$value ['id'] }}" {{ $value ? ($value->kondisi_lampu == 'Menyala' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-3{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Menyala</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi_lampu" value="Mati" class="red-radio" id="EE-4{{$value ['id'] }}" {{ $value ? ($value->kondisi_lampu == 'Mati' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-4{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Mati</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kebersihan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="EE-5{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-5{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bersih</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="EE-6{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                <label for="EE-6{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Kotor</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- Emergency Lamp -->
                        @foreach ($EmerLamp_proses as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 hardware-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-desktop icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Lamp</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Memprosess masalah di lokasi {{$value->nama_lokasi}}  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan Lampu</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Form Checklist</td>
                                    <td width="65%">{{$value->form}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->perbaikan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Action</td>

                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3el{{$value->id}}" title="View Info">finish
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal finish -->
                                        <div class="modal fade" id="modal-3el{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Memperoses Kerusakan
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="judul-apar">
                                                                CONTROLL EMERGENCY LAMP
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
                                                                <div class="apar-info">
                                                                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$value->tgl_periksa}}</span><br>
                                                                        <span class="location">Location</span>:<span class="ml-2">{{$value->nama_lokasi}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('hr_ga.emerlamp.finish')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="cards w-405 ml-auto mr-auto py-4 px-4">
                                                                <div class="content-apar mb-3 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kondisi Lampu</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kondisi" value="Menyala" class="blue-radio" id="EL-1{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Menyala' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-1{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Menyala</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kondisi" value="Rusak" class="red-radio" id="EL-2{{$value ['id'] }}" {{ $value ? ($value->kondisi == 'Rusak' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-2{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Rusak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>

                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Kebersihan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="EL-3{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Bersih' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-3{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Bersih</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="EL-4{{$value ['id'] }}" {{ $value ? ($value->kebersihan == 'Kotor' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-4{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Kotor</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Form Checklist</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio">
                                                                                <input type="radio" name="form" value="Ada" class="blue-radio" id="EL-5{{$value ['id'] }}" {{ $value ? ($value->form == 'Ada' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-5{{$value ['id'] }}" class="option option-1">
                                                                                    <span class="radio-title-blue mr-2">Ada</span>
                                                                                    <i class="icon-sub-blue fas fa-check"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="wrapper-radio"> 
                                                                                <input type="radio" name="form" value="Tidak" class="red-radio" id="EL-6{{$value ['id'] }}" {{ $value ? ($value->form == 'Tidak' ? 'checked' : '') : '' }}>
                                                                                <label for="EL-6{{$value ['id'] }}" class="option option-2">
                                                                                    <span class="radio-title-red mr-2">Tidak</span>
                                                                                    <i class="icon-sub-red fas fa-times"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-apar mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="apar-title">Keterangan</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control" id="finish" name="finish" value="" required>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                                <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <div class="tab-pane" id="finish-1" role="tabpanel">
                        <!-- <div class="no-ticket-queue">
                            <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                            <span class="no-ticket-capt">No Ticket Queue</span>
                        </div> -->
                        @foreach ($alarm_finish as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Alarm Button</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Masalah di lokasi {{$value->nama_lokasi}} sudah diperbaiki  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header> 
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Tombol Alaram</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan tombol alarm</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Chechklist tombol alarm</td>
                                    <td width="65%">{{$value->ceklis}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->finish}}</td>
                                </tr>
                                
                            </table>
                            </div>
                        </div>
                        @endforeach

                        <!-- Smoke Detector -->
                        @foreach ($SmokeDet_finish as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 software-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-robot icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Smoke Detector</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Masalah di lokasi {{$value->nama_lokasi}} sudah diperbaiki  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat smoke detector</td>
                                    <td width="65%">{{$value->ada_smoke}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Fungsi smoke detector</td>
                                    <td width="65%">{{$value->fungsi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Baterai Smoke Detector	</td>
                                    <td width="65%">{{$value->baterai}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->finish}}</td>
                                </tr>
                                
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- APAR -->
                        @foreach ($apar_finish as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 network-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-wifi icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">APAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Masalah di lokasi {{$value->nama_lokasi}} sudah diperbaiki  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Tekanan APAR</td>
                                    <td width="65%">{{$value->tekanan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Pin Pengaman APAR</td>
                                    <td width="65%">{{$value->pin}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Selang</td>
                                    <td width="65%">{{$value->kondisi_selang}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Berat Tabung APAR	</td>
                                    <td width="65%">{{$value->berat_tabung}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Masa Berlaku Pengisian	</td>
                                    <td width="65%">{{$value->masa_berlaku}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Handle/Tuas	</td>
                                    <td width="65%">{{$value->kondisi_tuas}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Garis Merah / Red Line APAR	</td>
                                    <td width="65%">{{$value->garis_merah}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Sign APAR	</td>
                                    <td width="65%">{{$value->kondisi_sign}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->finish}}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- Emergency Exit -->
                        @foreach ($EmerExit_finish as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 pinjaman-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="far fa-credit-card icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Exit</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                <span>Masalah di lokasi {{$value->nama_lokasi}} sudah diperbaiki  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Terdapat Emergency Exit</td>
                                    <td width="65%">{{$value->ada_exit}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi_lampu}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->finish}}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                        <!-- Emergency Lamp -->
                        @foreach ($EmerLamp_finish as $key => $value)
                        <div class="accordion__item">
                            <header class="accordion__header">
                                <div class="row px-2">
                                    <div class="col-3 py-3 hardware-badge">
                                        <div class="row">
                                            <div class="col-4 text-right">
                                                <i class="fas fa-desktop icon-badge"></i>
                                            </div>
                                            <div class="col-8">
                                                <span class="accord-title">Emergency Lamp</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 py-3">
                                        <div class="desc-accordion">
                                            <div class="row">
                                                <div class="col-7 text-truncate">
                                                    <span>Masalah di lokasi {{$value->nama_lokasi}} sudah diperbaiki  </span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-1 py-3 text-center">
                                        <i class="fas fa-plus accordion__iconIT"></i>
                                    </div>
                                </div>
                            </header>
                        
                            <div class="accordion__content border-top">
                            <table class="tables title-content">
                                <tr>
                                    <td width="35%" style="font-weight:600">Lokasi</td>
                                    <td width="65%">{{$value->nama_lokasi}} </td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kondisi Lampu</td>
                                    <td width="65%">{{$value->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Kebersihan Lampu</td>
                                    <td width="65%">{{$value->kebersihan}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Form Checklist</td>
                                    <td width="65%">{{$value->form}}</td>
                                </tr>
                                <tr>
                                    <td width="35%" style="font-weight:600">Keterangan</td>
                                    <td width="65%">{{$value->finish}}</td>
                                </tr>
                                
                            </table>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
            @endif
            @if($user_login=='Petugas_apar')
            <div class="col-6">
                <div class="auditB-title">
                    Controll
                </div>
                <div class="row">
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.alaram.scant')}}">
                        <div class="cards-controll">
                            <img class="image-controll" src="{{url('images/iconpack/icon-alarm.svg')}}">
                            <p class="desc-controll px-1">Alarm Button</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.smokedet.scant')}}">
                        <div class="cards-controll">
                            <img class="image-controll" src="{{url('images/iconpack/icon-smoke.svg')}}">
                            <p class="desc-controll px-1">Smoke Detector</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.apar.scant')}}">
                        <div class="cards-controll">
                            <img class="image-controll" src="{{url('images/iconpack/icon-apar.svg')}}">
                            <p class="desc-controll px-1">APAR</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.emerexit.scant')}}">
                        <div class="cards-controll">
                            <img class="image-controll" src="{{url('images/iconpack/icon-emexit.svg')}}">
                            <p class="desc-controll px-1">Emergency Exit</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.emerlamp.scant')}}">
                        <div class="cards-controll">
                            <img class="image-controll" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                            <p class="desc-controll px-1">Emergency Lamp</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-controll-responsive mb-3">
                    <a href="{{ route('hr_ga.auditbuyer.repair')}}">
                        <div class="cards-controll">
                            <img class="image-controll mt-1" src="{{url('images/iconpack/icon-report.svg')}}">
                            <p class="desc-controll icon-report px-1">Report</p>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-6 notif-web">
              <div class="auditB-title">
                  Notification
              </div>
              @if(($tgl >= '20') AND ($jml_notif > 0))
              <div class="row">
                  <div class="col-12">
                      <div class="cards h-416 px-3 py-2 scroll-y">
                          <!-- ======================================== -->
                          @if($tgl >= '27')
                          @foreach ($notif as $key => $value)
                              @if($value['id_item']=='1')
                              <div class="alertt alert-merah">
                                  <div class="icon-notification bg-merah">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarm.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='2')
                              <div class="alertt alert-merah">
                                  <div class="icon-notification bg-merah">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='3')
                              <div class="alertt alert-merah">
                                  <div class="icon-notification bg-merah">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='4')
                              <div class="alertt alert-merah">
                                  <div class="icon-notification bg-merah">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='5')
                              <div class="alertt alert-merah">
                                  <div class="icon-notification bg-merah">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @endif
                          @endforeach
                          @endif
                          @if(($tgl >= '24') && ($tgl < '27'))
                          <!-- ============================== -->
                          @foreach ($notif as $key => $value)
                              @if($value['id_item']=='1')
                              <div class="alertt alert-kuning">
                                  <div class="icon-notification bg-kuning">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarmkuning.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='2')
                              <div class="alertt alert-kuning">
                                  <div class="icon-notification bg-kuning">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='3')
                              <div class="alertt alert-kuning">
                                  <div class="icon-notification bg-kuning">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='4')
                              <div class="alertt alert-kuning">
                                  <div class="icon-notification bg-kuning">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='5')
                              <div class="alertt alert-kuning">
                                  <div class="icon-notification bg-kuning">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @endif
                          @endforeach
                          <!-- ================================== -->
                          @endif
                          @if(($tgl >= '20') && ($tgl < '24'))
                          @foreach ($notif as $key => $value)
                              @if($value['id_item']=='1')
                              <div class="alertt alert-hijau">
                                  <div class="icon-notification bg-hijau">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarmhijau.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='2')
                              <div class="alertt alert-hijau">
                                  <div class="icon-notification bg-hijau">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='3')
                              <div class="alertt alert-hijau">
                                  <div class="icon-notification bg-hijau">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='4')
                              <div class="alertt alert-hijau">
                                  <div class="icon-notification bg-hijau">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @elseif($value['id_item']=='5')
                              <div class="alertt alert-hijau">
                                  <div class="icon-notification bg-hijau">
                                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                                  </div>
                                  <span class="desc-notif truncate">
                                      <b>{{$value['item']}}</b> location <b>{{$value['nama_lokasi']}}</b> has not been checked {{$value['sisa_cek']}} of {{$value['jml_lokasi']}} Location
                                  </span>
                              </div>
                              @endif
                          @endforeach
                          @endif
                      </div>
                      @endif
                  </div>
              </div>
            </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  @endsection

@push("scripts")

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>


<script>
    $('#reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });

    $(function(){
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
</script>
@endpush