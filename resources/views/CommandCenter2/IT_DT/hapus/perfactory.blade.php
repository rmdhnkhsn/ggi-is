@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
@endpush

@section("content")
<!-- <section class="content-header f-poppins">
        <div class="card-navigate">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('it_dt2.all') }}" class="title-navigate">IT & DT</a></li>
                    <li class="breadcrumb-item title-navigate-active" aria-current="page">Ticket IT Support</li>
                    <li class="navigate-active ml-it"></li>
                </ol>
            </nav>
        </div>
    </section> -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-8 col-md-12 col-12">
            <div class="cards bg-card h-307">
                <div class="row">
                    <div class="col-12 p-4">
                        <span class="card-tittle-repair"><center>Last 30 days Repair Data</center></span>
                        <div class="col-lg-12 col-12 my-2">
                            <div class="card-block ml-5" style="height: 210px; width: 92%">
                                <canvas id="barChart"></canvas>
                            </div>
                            <span class="quantity2">Quantity</span>
                            <span class="date-label">Date</span>
                        </div>
                    </div>
                </div>

            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="row mb-3 mt-1">
                <div class="col-lg-12">
                    <span class="staff-it">Staff IT Support</span>
                </div>
                <div class="col-lg-12">
                    <span class="tot-repair">Total repairing : {{$Total_repairing['total_tiket_done']}} of {{$Total_repairing['total_tiket']}}</span>
                </div>
            </div>
            <div class="row">
                @foreach ($it_support as $key => $value)
                <div class="col-xl-12 col-md-6 col-lg-6">
                    <div class="cards card-itsupp">
                        <div class="row px-2">
                            <div class="col-3">
                                <div class="cards card-finish">
                                    <p class="finished">Finished</p>
                                    <p class="count">{{$value['jumlah_asiggn']}}</p>
                                </div>
                            </div>
                            <div class="col-8 border-bot pt-1 ml-auto mr-auto">
                                <span class="itsupp-name">{{$value ['nama']}}</span>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-3"></div>
                            <div class="col-8 pt-1 ml-auto mr-auto process">
                                <span class="on-process">
                                {{$value ['proses']}}  {{$value ['count_proses']}} &ensp;&ensp;:&ensp;{{$value ['branchdetail']}}-{{$value ['no']}}
                                </span>
                            </div>
                        </div>   
                    </div>
                </div> 
                @endforeach
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="cards bg-card p-3">
                <div class="row">
                    <div class="col-lg-10">
                        <span class="card-tittle-repair"><center>{{$dataBranch->branchdetail}} Repair Comparison {{$tgl_grafik['dataBulan1']}} {{$tgl_grafik['tahun1']}} - {{$tgl_grafik['dataBulan2']}} {{$tgl_grafik['tahun2']}}</center></span>
                        <div class="card-block p-3 ml-2">
                            <div class="chart">
                                <canvas id="barChart2" style="height: 230px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-12">
                                <!-- <center>
                                <div class="container-good-ticket">
                                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="135" data-thickness=".19" data-height="135" value="95" disabled>
                                    <div class="knob-label" id="labelknob-good">GOOD</div>
                                </div>
                                </center> -->
                                <center>
                                <div class="container-knob">
                                    <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="140" data-thickness=".19" data-height="140" value="{{$critical}}" disabled>
                                    <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                                </div>
                                </center>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <center>
                                <div class="branch-tot">
                                    <span class="branch">{{$dataBranch->nama_branch}}</span>
                                    <span class="tot-issue">Total Issues&ensp;:&ensp;{{$issu['issu']}}</span>
                                </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid">
        <div class="row mt-2 mb-2">
            <div class="col-lg-12">
                <span class="it-task">IT Support Task</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7">
                <ul class="nav nav-tabs md-tabs mb-4" role="tablist">
                    <li class="nav-item-show">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#waiting" role="tab"></i>Waiting
                        @if($total_tiket['waiting']  != 0) 
                            <span class="number-badge">{{$total_tiket['waiting']}}</span>
                        @endif
                        </a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item-show">
                        <a class="nav-link py-2" data-toggle="tab" href="#process" role="tab"></i>Process
                        @if($total_tiket['proggres']  != 0) 
                            <span class="number-badge">{{ $total_tiket['proggres'] }}</span>
                        @endif
                        </a>
                        <div class="slide"></div>
                    </li>
                    
                    <li class="nav-item-show">
                        <a class="nav-link py-2" data-toggle="tab" href="#pending" role="tab"></i>Pending
                        @if($total_tiket['pending']  != 0)   
                            <span class="number-badge">{{ $total_tiket['pending'] }}</span>
                        @endif
                        </a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                  <div class="tab-pane active" id="waiting" role="tabpanel">
                    @if($total_tiket['waiting']  == 0)
                    <div class="no-ticket-queue">
                        <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                        <span class="no-ticket-capt">No Ticket Queue</span>
                    </div>
                    @endif
                    @foreach ($dataTiketw as $key => $value)   
                    <div class="accordion__item">
                    @if($value['judul'] == 'Software')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 software-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-robot icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Software</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Hardware')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 hardware-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-desktop icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Hardware</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Network')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 network-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-wifi icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Network</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Peminjaman')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 pinjaman-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="far fa-credit-card icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Peminjaman</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        @endif
                        <div class="accordion__content border-top">
                          <table class="tables title-content">
                            <tr>
                                <td width="35%" style="font-weight:600">Ticket Number</td>
                                <td width="65%"> {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">NIK</td>
                                <td width="65%">{{ $value['nik'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Name</td>
                                <td width="65%">{{ $value['nama'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Departement</td>
                                <td width="65%">{{ $value['bagian'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">IP Address</td>
                                <td width="65%">{{ $value['ip'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">EXT</td>
                                <td width="65%">{{ $value['ext'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Error</td>
                                <td width="65%">{{ $value['judul'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Description Error</td>
                                <td width="65%">{{ $value['deskripsi'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Create Date</td>
                                <td width="65%">{{ $value['tgl_pengajuan'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Status</td>
                                <td width="65%">{{ $value['status'] }}</td>
                            </tr>
                          </table>

                        </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="tab-pane" id="process" role="tabpanel">
                    @if($total_tiket['proggres']  == 0)
                    <div class="no-ticket-queue">
                        <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                        <span class="no-ticket-capt">No Ticket Queue</span>
                    </div>
                    @endif
                    @foreach ($dataTiketpro as $key => $value)   
                    <div class="accordion__item">
                        @if($value['judul'] == 'Software')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 software-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-robot icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Software</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Hardware')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 hardware-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-desktop icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Hardware</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Network')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 network-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-wifi icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Network</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Peminjaman')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 pinjaman-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="far fa-credit-card icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Peminjaman</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        @endif
                        <div class="accordion__content border-top">
                          <table class="tables title-content">
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600" style="font-weight:600">No Ticket</td>
                                <td width="65%">{{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600" style="font-weight:600">NIK</td>
                                <td width="65%">{{ $value['nik'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600" style="font-weight:600">Name</td>
                                <td width="65%">{{ $value['nama'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600" style="font-weight:600">Departement</td>
                                <td width="65%">{{ $value['bagian'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600" style="font-weight:600">IP Address</td>
                                <td width="65%">{{ $value['ip'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600">EXT</td>
                                <td width="65%">{{ $value['ext'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600">Error</td>
                                <td width="65%">{{ $value['judul'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600" style="font-weight:600">Description error</td>
                                <td width="65%">{{ $value['deskripsi'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Create Date</td>
                                <td width="65%">{{ $value['tgl_pengajuan'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Status</td>
                                <td width="65%">{{ $value['status'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">IT Support</td>
                                <td width="65%">{{ $value['petugas'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Start Process</td>
                                <td width="65%">{{ $value['tgl_pengerjaan'] }}</td>
                            </tr>
                          </table>
                        </div>
                    </div>
                    @endforeach
                  </div>

                  <div class="tab-pane" id="pending" role="tabpanel">
                    @if($total_tiket['pending']  == 0)
                    <div class="no-ticket-queue">
                        <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                        <span class="no-ticket-capt">No Ticket Queue</span>
                    </div>
                    @endif
                    @foreach ($dataTiketp as $key => $value)   
                    <div class="accordion__item">
                        @if($value['judul'] == 'Software')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 software-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-robot icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Software</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Hardware')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 hardware-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-desktop icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Hardware</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Network')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 network-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="fas fa-wifi icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Network</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>
                        </header>
                        @elseif($value['judul'] == 'Peminjaman')
                        <header class="accordion__header">
                            <div class="row px-2">
                                <div class="col-3 py-3 pinjaman-badge">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <i class="far fa-credit-card icon-badge"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="accord-title">Peminjaman</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 py-3">
                                    <div class="desc-accordion">
                                        <div class="row">
                                            <div class="col-7 text-truncate">
                                                <span>Ticket Number : {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</span>
                                            </div>
                                            <div class="col-5 text-truncate">
                                                <span class="day-ago">{{ $value['waktu'] }} Ago</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-truncate">
                                                <span class="desc-acc">Description : {{ $value['deskripsi'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 py-3 text-center">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        @endif
                        <div class="accordion__content border-top">
                          <table class="tables title-content">
                            <tr>
                                <td width="35%" style="font-weight:600">No Ticket</td>
                                <td width="65%">{{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">NIK</td>
                                <td width="65%">{{ $value['nik'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Name</td>
                                <td width="65%">{{ $value['nama'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Departement</td>
                                <td width="65%">{{ $value['bagian'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">IP Address</td>
                                <td width="65%">{{ $value['ip'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">EXT</td>
                                <td width="65%">{{ $value['ext'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Error</td>
                                <td width="65%">{{ $value['judul'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Description Error</td>
                                <td width="65%">{{ $value['deskripsi'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Create Date</td>
                                <td width="65%">{{ $value['tgl_pengajuan'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Status</td>
                                <td width="65%">{{ $value['status'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">IT Support</td>
                                <td width="65%">{{ $value['petugas'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Start Process</td>
                                <td width="65%">{{ $value['tgl_pengerjaan'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Problem Category</td>
                                <td width="65%">{{ $value['rusak'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Sub Category</td>
                                <td width="65%">{{ $value['sub_rusak'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Pending Date</td>
                                <td width="65%">{{ $value['tgl_pending'] }}</td>
                            </tr>
                            <tr>
                                <td width="35%" style="font-weight:600">Pending Description</td>
                                <td width="65%">{{ $value['deskripsi_pending'] }}</td>
                            </tr>
                          </table>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="cards card-finish-detail h-400F scroll-y">
                    <div class="row py-4">
                        <div class="col-12 text-center">
                            <span class="finished-cln">Finished {{$dataBranch->branchdetail}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                          <table class="table">
                            <thead>
                            <tr>
                                <th class="no-wrap">No.</th>
                                <th class="no-wrap">Ticket Number</th>
                                <th class="no-wrap">Name</th>
                                <th class="no-wrap">Finish Time</th>
                                <th class="no-wrap"></th>
                            </tr>
                            </thead>
                            <tbody> 
                            <?php $no=0;?>
                            @foreach ($dataTiketdone as $key => $value) 
                            <?php $no++;?> 
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$value ['no_tiket'] }}</td>
                                <td>{{$value ['nama']}}</td>
                                <td>{{$value ['jam_selesai']}}</td>
                                <td>
                                    <button type="button" class="info-modal" data-toggle="modal" data-target="#modal-{{$value ['id'] }}" title="View Info">
                                        <i class="fas fa-info icon-info"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                            <table class="info-content">
                                                                <tr>
                                                                    <td width="40%">No Ticket</td>
                                                                    <td width="60%">{{$value ['no_tiket'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">NIK</td>
                                                                    <td width="60%">{{$value ['nik'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Name</td>
                                                                    <td width="60%">{{$value ['nama'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Departement</td>
                                                                    <td width="60%">{{$value ['bagian'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">IP Address</td>
                                                                    <td width="60%">{{$value ['ip'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">EXT</td>
                                                                    <td width="60%">{{$value ['ext'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Error</td>
                                                                    <td width="60%">{{$value ['judul'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Error Description</td>
                                                                    <td width="60%">{{$value ['deskripsi'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Create Date</td>
                                                                    <td width="60%">{{$value ['tgl_pengajuan'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Status</td>
                                                                    <td width="60%">{{$value ['status'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">IT Support</td>
                                                                    <td width="60%">{{$value ['petugas'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Start Process</td>
                                                                    <td width="60%">{{$value ['tgl_pengerjaan'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Problem Category</td>
                                                                    <td width="60%">{{$value ['rusak'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Sub Category</td>
                                                                    <td width="60%">{{$value ['sub_rusak'] }}</td>
                                                                </tr>
                                                                <!-- ($data->foto != null) -->
                                                                @if($value['date_pending'] != null)
                                                                <tr>
                                                                    <td width="40%">Pending Date</td>
                                                                    <td width="60%">{{$value ['tgl_pending'] }}</td>
                                                                </tr>
                                                                @endif
                                                                @if($value['deskripsi_pending'] != null)
                                                                <tr>
                                                                    <td width="40%">Pending Description</td>
                                                                    <td width="60%">{{$value ['deskripsi_pending'] }}</td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <td width="40%">Done Description</td>
                                                                    <td width="60%">{{$value ['deskripsi_selesai'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="40%">Completion Date</td>
                                                                    <td width="60%">{{$value ['tgl_selesai'] }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>  
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3"></div>
      </div>
    </section>
@endsection

@push("scripts")
<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '16pt').css('font-weight', '500').css('padding-bottom', '15px').css('font-family', 'poppins');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 1.5;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>

<script>
    var barChart = document.getElementById('barChart').getContext('2d');

    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($dataLabel); ?>,
            datasets : [{
                label: "Total Repair Per Day",
                backgroundColor: '#0d6efd',
                borderColor: '#0d6efd',
                data:  <?php echo json_encode($dataNilai); ?>,
            }],
        },
    
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        }
    });
</script>

<script>
  $(function () {

    var areaChartData = {
      labels  : ['Jaringan', 'Telepon', 'Printer', 'Scanner', 'CPU', 'Monitor', 'Aksesoris','OS','Aplikasi','Peminjaman','Other','HP/TAB','SmartMRT'],
      datasets: [
        {
          label               : 'Last Month',
          backgroundColor     : '#fb5b5b',
          borderColor         : '#fb5b5b',
          pointRadius         : false,
          pointColor          : '#fb5b5b',
          pointStrokeColor    : '#fb5b5b',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#fb5b5b',
          data                : <?php echo json_encode($dataNilai1_grafik); ?>,
        },
        {
          label               : 'This Month',
          backgroundColor     : '#0d6efd',
          borderColor         : '#0d6efd',
          pointRadius         : false,
          pointColor          : '#0d6efd',
          pointStrokeColor    : '#0d6efd',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0d6efd',
          data                : <?php echo json_encode($dataNilai2_grafik); ?>,
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart2').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>

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
  $(function () {
    $(document).on('click', '[ data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@endpush