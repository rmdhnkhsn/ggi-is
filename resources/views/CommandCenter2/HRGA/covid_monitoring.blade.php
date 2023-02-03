@extends("layouts.app")
@section("title","Covid Monitoring")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

  <link rel="stylesheet" href="{{asset('/common/css/plugins/owl-carousel/owl-carousel.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/owl-carousel/owl-theme-default.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid covidMonitoring">  
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-calendar-check"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Safety Compliance</div>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-clock"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Past Time</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('cc.approval')}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-user-check"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Overtime Approval</div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('cc.covid_monitoring')}}" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-chart-bar"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Covid Monitoring</div>
            </div>
          </div>
        </div>
      </a>
      @endif
    </div>
    <div class="row pb-5">
        <div class="col-12">
            <div class="card-flat heightCvd">
                <div class="containerCard">
                    <div class="text1">
                        <div class="desc1">Monitoring COVID</div>
                        <div class="desc2">Monitoring the weekly activities of gistex garment indonesia employees</div>
                    </div>
                    <div class="text2">
                        <div class="containerResponse">
                            <div class="numb">{{$grand_total['yang_isi']}}</div>
                            <div class="tot">Total Response</div>
                            <div class="onTime">
                                <div class="txt">Ontime</div>
                                <div class="percent">{{$grand_total['ontime']}} <span>%</span></div>
                            </div>
                            <div class="onTime">
                                <div class="txt">Not Ontime</div>
                                <div class="percent">{{$grand_total['tidak_ontime']}} <span>%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="text3">
                        <img src="{{url('images/iconpack/monitoring_covid/study.svg')}}" class="imgStudy">
                    </div>
                </div>
                <div class="buleud"></div>
            </div>
        </div>
        <!-- Summary ontime per branch  -->
        <div class="col-12">
            <div class="card-flat bgLightBlue" style="padding:1rem;height:170px">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($branch_ontime as $key => $value)
                        @if($key == 'GISTEX CILEUNYI')
                        <div class="carousel-item active flex-column">
                        @else
                        <div class="carousel-item flex-column">
                        @endif
                            <div class="branchName w-100">{{$key}}</div>
                            <div class="flex w-100 mb-4" style="gap:.8rem">
                                @foreach($value as $key2 => $value2)
                                <div class="carouselColumn">
                                    <a href="#" class="carouselCard">
                                        <div class="judul">{{$value2['departemen']}}</div>
                                        <div class="respon">Ontime Response</div>
                                        <div class="percent">{{$value2['ontime']}}%</div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="crslPrev" href="#recipeCarousel" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="crslNext" href="#recipeCarousel" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php 
            $data_branch = collect($ontime_per_branch)->groupBy('nama_branch');
        ?>
        <!-- <div class="col-12">
            <div class="card-flat bgLightBlue" style="padding:1rem;height:160px">
                @foreach($data_branch as $key => $value)
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($value as $key2 => $value2)
                            @if($value2['departemen'] == auth()->user()->departemen)
                            <div class="carousel-item active flex-column">
                            @else
                            <div class="carousel-item flex-column">
                            @endif
                                <div class="branchName w-100">{{$key}}</div>
                                <div class="flex mb-4" style="gap:.8rem">
                                    <div class="carouselColumn">
                                        <a href="#" class="carouselCard">
                                            <div class="judul">{{$value2['departemen']}}</div>
                                            <div class="respon">Ontime Response</div>
                                            <div class="percent">{{$value2['ontime']}}%</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="crslPrev" href="#recipeCarousel" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="crslNext" href="#recipeCarousel" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div> -->

        <!-- Chart Grafik semua branch  -->
        <div class="col-12 mb-4">
            <div class="loop owl-carousel owl-theme">
                <?php
                    $branch = collect($ontime_per_dept)->groupBy('nama_branch')
                ?>
                @foreach($branch as $key => $value)
                <div class="item">
                    <div class="card-flat p-4" style="width:560px;height:430px">
                        <div class="title">{{$key}}</div>
                        <div class="sub-title">Persentase Ontime Response</div>
                        @if($key == 'GISTEX CILEUNYI')
                        <div class="barContainer">
                            <canvas id="barCLN"></canvas>
                        </div>
                        @endif
                        @if($key == 'GISTEX MAJALENGKA 1')
                        <div class="barContainer">
                            <canvas id="barMAJA1"></canvas>
                        </div>
                        @endif
                        @if($key == 'GISTEX MAJALENGKA 2')
                        <div class="barContainer">
                            <canvas id="barMAJA2"></canvas>
                        </div>
                        @endif
                        @if($key == 'GISTEX KALIBENDA')
                        <div class="barContainer">
                            <canvas id="barKBD"></canvas>
                        </div>
                        @endif
                        @include('CommandCenter2.HRGA.partials.legend')
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Summary all factory  -->
        <div class="col-lg-5">
            <div class="card-flat bgLightBlue" style="padding: 1.5rem 2rem">
                <div class="title">Summary All Factory</div>
                <div class="sub-title">PT. Gistex Garmen Indonesia</div>
                <div class="row mt-3">
                    @foreach($semuanya as $key => $value)
                    <div class="col-md-6">
                        <div class="cardRes" style="padding: .6rem 1.3rem">
                            <div class="judul">{{$value['nama_branch']}}</div>
                            <div class="number">{{$value['yang_isi']}}</div>
                            <div class="justify-sb">
                                <div class="respon">Response</div>
                                <div class="pill">of {{$value['semua_warga']}}</div>
                            </div>
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
                <?php 
                $total_semua = collect($semuanya)->sum('yang_isi');
                ?>
                <div class="justify-sb">
                    <div class="tot-res">Total Response</div>
                    <div class="pills">{{$total_semua}}</div>
                </div>
                
            </div>
        </div>

        <!-- Grafik Kurang sehat  -->
        <div class="col-lg-7">
            <div class="card-flat" style="padding: 1.5rem 2rem;height:390px">
                <div class="title text-truncate">Evaluasi Karyawan Kurang Sehat</div>
                <div class="sub-title flex">Rekap Mingguan <div class="fw-5 ml-1">{{$tanggal}}</div></div>
                <div class="barContainer2">
                    <canvas id="barEval"></canvas>
                </div> 
            </div>
        </div>

        <div class="col-12 gccTrafic">
            <!-- Berpergian Minggu ini  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_berpergian = collect($berpergian)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Berpergian Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_berpergian}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($berpergian as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menerima Tamu  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_tamu = collect($menerima_tamu)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Menerima Tamu Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_tamu}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menerima_tamu as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tidak sehat  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_tidak_sehat = collect($tidak_sehat)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Tidak Sehat Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_tidak_sehat}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tidak_sehat as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mengalami demam/ Batuk/ Pilek/ Sakit Tenggorokan/ Sesak Nafas dalam minggu ini  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_batuk_pilek = collect($batuk_pilek)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Mengalami Demam/ Batuk/ Pilek/ Sakit Tenggorokan/ Sesak Nafas Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_batuk_pilek}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batuk_pilek as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hilang Penciuman  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_hilang_penciuman = collect($hilang_penciuman)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Hilang Indera Perasa atau Penciuman Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_hilang_penciuman}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hilang_penciuman as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bertemu orang covid  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_bertemu_covid = collect($bertemu_covid)->count('id');
                    ?>
                    <div class="content">
                        <div class="description">Bertemu Keluarga, Teman, Tetangga, Yang Terkena COVID Minggu Ini</div> 
                        <div class="employee">
                            <div class="countt">{{$total_bertemu_covid}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:450px;">
                            <table class="table tbl-content-left no-wrap">
                                <thead class="stickyHeader2">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Bagian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bertemu_covid as $key => $value)
                                    <tr>
                                        <td>{{strtoupper($value['nama_branch'])}}</td>
                                        <td>{{strtoupper($value['bagian'])}}</td>
                                        <td>{{ucwords($value['nama'])}}</td>
                                        <td>{{$value['nik']}}</td>
                                        <td>{{$value['no_hp']}}</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['note5']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Karyawan tepat waktu  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_ontime = collect($yang_ontime)->count('id');
                        $data_ontime = collect($yang_ontime)->groupBy('nama_branch');
                    ?>
                    <div class="content">
                        <div class="description">Karyawan Tepat Waktu</div> 
                        <div class="employee">
                            <div class="countt">{{$total_ontime}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white pb-5">
                        @foreach($data_ontime as $key => $value)
                            <div class="title-20 text-center py-3">{{strtoupper($key)}}</div>
                            <div class="cards-scroll px-3 scrollY" id="scroll-bar" style="padding-bottom:20px;max-height:450px;">
                                <table class="table tbl-content-left no-wrap">
                                    <thead class="stickyHeader2">
                                        <tr>
                                            <th>Bagian</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>No Handphone</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_per_branch = collect($value)->count('id');
                                        ?>
                                        @foreach($value as $key => $value)
                                        <tr>
                                            <td>{{strtoupper($value['bagian'])}}</td>
                                            <td>{{ucwords($value['nama'])}}</td>
                                            <td>{{$value['nik']}}</td>
                                            <td>{{$value['no_hp']}}</td>
                                            <td>1</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"><center>TOTAL</center></td>
                                            <td>{{strtoupper($total_per_branch)}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Karyawan tidak tepat waktu  -->
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                    <?php 
                        $total_tidak_ontime = collect($tidak_ontime)->count('id');
                        $data_tidak_ontime = collect($tidak_ontime)->groupBy('nama_branch');
                    ?>
                    <div class="content">
                        <div class="description">Karyawan Tidak Tepat Waktu</div> 
                        <div class="employee">
                            <div class="countt">{{$total_tidak_ontime}}</div> 
                            Employee
                        </div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white pb-5">
                        @foreach($data_tidak_ontime as $key => $value)
                            <div class="title-20 text-center py-3">{{strtoupper($key)}}</div>
                            <div class="cards-scroll px-3 scrollY" id="scroll-bar" style="padding-bottom:20px;max-height:450px;">
                                <table class="table tbl-content-left no-wrap">
                                    <thead class="stickyHeader2">
                                        <tr>
                                            <th>Bagian</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>No Handphone</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_per_branch = collect($value)->count('id');
                                        ?>
                                        @foreach($value as $key => $value)
                                        <tr>
                                            <td>{{strtoupper($value['bagian'])}}</td>
                                            <td>{{ucwords($value['nama'])}}</td>
                                            <td>{{$value['nik']}}</td>
                                            <td>{{$value['no_hp']}}</td>
                                            <td>1</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"><center>TOTAL</center></td>
                                            <td>{{strtoupper($total_per_branch)}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('/common/js/owl-carousel/owl-carousel.js')}}"></script>

<script>
    $(document).ready(function ($) {
        $('.loop').owlCarousel({
            // autoplay: true,
            // autoplayTimeout: 6000,
            autoWidth: true,
            nav: true,
            loop: false,
            margin: 20,
        });
    });
</script>

<script>
    $('#recipeCarousel').carousel({
    interval: 4000
    })

    $(document).ready( function () {
        const carouselcount = document.getElementsByClassName('carousel-item').length;
            // console.log(carouselcount);

            $('.carousel .carousel-item').each(function(){
            if ( carouselcount < 6 ) {
                var minPerSlide = carouselcount - 2;
            } else {
                var minPerSlide = 4;
            }
            // var minPerSlide = 0;
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    
    });
</script>

<!-- Chart grafik cln  -->
<script>
    var barCLN = document.getElementById('barCLN').getContext('2d');
    var myBarCLN = new Chart(barCLN, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelCLN); ?>,
            datasets : [{
                label: "Percentage",
                data:  <?php echo json_encode($nilaiCLN); ?>,
                backgroundColor: [ 
                    '#3FAEFF', //BUSINESS & DEVELOPMENT
                    '#8A73FF', //MARKETING
                    '#FB5B5B', //HR & GA
                    '#623fff', //MANAGEMENT
                    '#FFAC00', //MATERIAL & EXIM
                    '#58DFBD', //IT & DIGITAL TRANSFORMATION
                    '#ff008c', //PRODUCTION
                    '#CF69FF', //QUALITY
                    '#007bff' //ACCOUNTING
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    display: false
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<!-- Chart grafik maja1  -->
<script>
    var barMAJA1 = document.getElementById('barMAJA1').getContext('2d');
    var myBarMAJA1 = new Chart(barMAJA1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelMAJA1); ?>,
            datasets : [{
                label: "Percentage",
                data:  <?php echo json_encode($nilaiMAJA1); ?>,
                backgroundColor: [  
                    '#ff008c', //PRODUCTION
                    '#CF69FF', //QUALITY
                    '#FFAC00', //MATERIAL & EXIM
                    '#58DFBD', //IT & DIGITAL TRANSFORMATION
                    '#FB5B5B', //HR & GA
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    display: false
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<!-- Chart grafik maja2  -->
<script>
    var barMAJA2 = document.getElementById('barMAJA2').getContext('2d');
    var myBarMAJA2 = new Chart(barMAJA2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelMAJA2); ?>,
            datasets : [{
                label: "Percentage",
                data:  <?php echo json_encode($nilaiMAJA2); ?>,
                backgroundColor: [ 
                    '#ff008c', //PRODUCTION
                    '#FB5B5B', //HR & GA
                    '#CF69FF', //QUALITY
                    '#58DFBD', //IT & DIGITAL TRANSFORMATION
                    '#FFAC00', //MATERIAL & EXIM
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    display: false
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<!-- Chart grafik kbd  -->
<script>
    var barKBD = document.getElementById('barKBD').getContext('2d');
    var myBarKBD = new Chart(barKBD, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelKB); ?>,
            datasets : [{
                label: "Percentage",
                data:  <?php echo json_encode($nilaiKB); ?>,
                backgroundColor: [ 
                    '#CF69FF', //QUALITY
                    '#58DFBD', //IT & DIGITAL TRANSFORMATION
                    '#ff008c', //PRODUCTION
                    '#FFAC00', //MATERIAL & EXIM
                    '#FB5B5B', //HR & GA
                    '#00ff40', //GLOBAL
                    '#FFD600', //PRODUKSI
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    display: false
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<!-- chart kurang sehat  -->
<script>
    var barEval = document.getElementById('barEval').getContext('2d');
    var myBarEval = new Chart(barEval, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelTidakSehat); ?>,
            datasets : [{
                label: "Kurang Sehat",
                data:  <?php echo json_encode($nilaiTidakSehat); ?>,
                backgroundColor: '#007bff',
            }],
        },
    
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                   
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

@endpush