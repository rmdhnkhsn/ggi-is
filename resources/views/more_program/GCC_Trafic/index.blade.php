@extends("layouts.app")
@section("title","GCC TRAFIC")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesGCCTrafic.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">

<style>
    .tbl-content-left tbody tr th {
        font-size:12px;
    }
    .tbl-content-left tbody tr td {
        font-size:12px;
    }
</style>
@endpush

@section("content")

@php
    $traffic_all=0;
    $traffic_production_schedule=0;
    $traffic_rekap_order=0;
    $traffic_sewing_upload=0;
    $traffic_ticketing=0;
    $traffic_monitoring_covid=0;
    $traffic_approval_overtime=0;

    $no=1;
    $totaldawn=0;
    $totalmorning=0;
    $totalafternoon=0;
    $totalevening=0;
@endphp

@foreach($data as $d)
    @php
        if (str_contains($d['url'], 'pic/schedule')) {
            $traffic_production_schedule+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }
        if (str_contains($d['url'], 'mkt/rekap-order')) {
            $traffic_rekap_order+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }
        if (str_contains($d['url'], 'prd/sewing')) {
            $traffic_sewing_upload+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }
        if (str_contains($d['url'], 'itd/ticket')) {
            $traffic_ticketing+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }
        if (str_contains($d['url'], 'mrp/weekly-question')) {
            $traffic_monitoring_covid+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }
        if (str_contains($d['url'], 'cmc/approval')) {
            $traffic_approval_overtime+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
            $traffic_all+=$d['jam1']+$d['jam2']+$d['jam3']+$d['jam4']+$d['jam5']+$d['jam6']+$d['jam7']+$d['jam8'];
        }

        $d['jam1']==0 ? : $totaldawn+=$d['jam1'];
        $d['jam2']==0 ? : $totaldawn+=$d['jam2'];
        $d['jam3']==0 ? : $totalmorning+=$d['jam3'];
        $d['jam4']==0 ? : $totalmorning+=$d['jam4'];
        $d['jam5']==0 ? : $totalafternoon+=$d['jam5'];
        $d['jam6']==0 ? : $totalafternoon+=$d['jam6'];
        $d['jam7']==0 ? : $totalevening+=$d['jam7'];
        $d['jam8']==0 ? : $totalevening+=$d['jam8'];
    @endphp
@endforeach

<section class="content">
  <div class="container-fluid gccTrafic pb-4">
    <div class="row">
      <a href="{{ route('traffic-index') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
              <div class="desc-active">Daily Visitors</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('traffic-analytics') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
              <div class="desc">Visitor Analytics</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="judul">Traffic of Gistex Command Center</div>
            <div class="sub-judul">see the number of user visits on the Indonesian gistex garment system</div>
            <div class="title-14 text-left mt-2" id="periode">Period {{date('m/d/Y')}}</div>
        </div>
        @include('more_program.GCC_Trafic.partials.nav-card')
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <form class="filterContainer" id="frmFilter" action="{{route('traffic-index')}}" method="get" enctype="multipart/form-data">
                <input type="hidden" name="app_name" id="app_name" value="" placeholder="">
                <div class="title-24 no-wrap" >By Time</div>
                <div class="input-group dates">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control border-input-10" name="daterange" id="daterange" value="" placeholder="Input Date" />
                </div>
                <div class="containerForm">
                    <input type="text" class="searchText" name="search" placeholder="search department or name ...">
                    <button type="submit" class="iconSearch"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_1.svg')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">Dawn</div> (00:00 to 06:00)</div> 
                        <div class="visit"><div class="countt">{{$totaldawn}}</div> Visitors</div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                            <table id="DTtable1" class="table tbl-content-left no-wrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTMENT</th>
                                        <th>SUB</th>
                                        <th>MODUL</th>
                                        <th>ACT</th>
                                        <th>URL</th>
                                        <th>03:00</th>
                                        <th>06:00</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        @if($d['jam1']>0||$d['jam2']>0)
                                        <tr>
                                            <td>{{$d['tanggal']}}</td>
                                            <td>{{$d['nik']}}</td>
                                            <td>{{$d['nama']}}</td>
                                            <td>{{substr($d['departemen'],0,15)}}</td>
                                            <td>{{$d['departemensubsub']}}</td>
                                            <td>{{$d['modul']}}</td>
                                            <td>{{$d['action']}}</td>
                                            <td title="{{$d['url']}}">{{substr($d['url'],0,20)}}...</td>
                                            <td title="Count Visit to that time">{{$d['jam1']}}</td>
                                            <td title="Count Visit to that time">{{$d['jam2']}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_1.svg')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">Morning</div> (06:01 to 12:00)</div> 
                        <div class="visit"><div class="countt">{{$totalmorning}}</div> Visitors</div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                            <table id="DTtable2" class="table tbl-content-left no-wrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTMENT</th>
                                        <th>SUB</th>
                                        <th>MODUL</th>
                                        <th>ACT</th>
                                        <th>URL</th>
                                        <th>09:00</th>
                                        <th>12:00</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        @if($d['jam3']>0||$d['jam4']>0)
                                        <tr>
                                            <td>{{$d['tanggal']}}</td>
                                            <td>{{$d['nik']}}</td>
                                            <td>{{$d['nama']}}</td>
                                            <td>{{$d['departemen']}}</td>
                                            <td>{{$d['departemensubsub']}}</td>
                                            <td>{{$d['modul']}}</td>
                                            <td>{{$d['action']}}</td>
                                            <td title="{{$d['url']}}">{{substr($d['url'],0,20)}}...</td>
                                            <td title="Count Visit to that time">{{$d['jam3']}}</td>
                                            <td title="Count Visit to that time">{{$d['jam4']}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_1.svg')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">Afternoon</div> (12:01 to 18:00)</div> 
                        <div class="visit"><div class="countt">{{$totalafternoon}}</div> Visitors</div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                            <table id="DTtable3" class="table tbl-content-left no-wrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTMENT</th>
                                        <th>SUB</th>
                                        <th>MODUL</th>
                                        <th>ACT</th>
                                        <th>URL</th>
                                        <th>15:00</th>
                                        <th>18:00</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        @if($d['jam5']>0||$d['jam6']>0)
                                        <tr>
                                            <td>{{$d['tanggal']}}</td>
                                            <td>{{$d['nik']}}</td>
                                            <td>{{$d['nama']}}</td>
                                            <td>{{$d['departemen']}}</td>
                                            <td>{{$d['departemensubsub']}}</td>
                                            <td>{{$d['modul']}}</td>
                                            <td>{{$d['action']}}</td>
                                            <td title="{{$d['url']}}">{{substr($d['url'],0,20)}}...</td>
                                            <td title="Count Visit to that time">{{$d['jam5']}}</td>
                                            <td title="Count Visit to that time">{{$d['jam6']}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_1.svg')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">Evening</div> (18:01 to 23:59)</div> 
                        <div class="visit"><div class="countt">{{$totalevening}}</div> Visitors</div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                            <table id="DTtable4" class="table tbl-content-left no-wrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTMENT</th>
                                        <th>SUB</th>
                                        <th>MODUL</th>
                                        <th>ACT</th>
                                        <th>URL</th>
                                        <th>TO 21:00</th>
                                        <th>TO 23:59</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        @if($d['jam7']>0||$d['jam8']>0)
                                        <tr>
                                            <td>{{$d['tanggal']}}</td>
                                            <td>{{$d['nik']}}</td>
                                            <td>{{$d['nama']}}</td>
                                            <td>{{$d['departemen']}}</td>
                                            <td>{{$d['departemensubsub']}}</td>
                                            <td>{{$d['modul']}}</td>
                                            <td>{{$d['action']}}</td>
                                            <td title="{{$d['url']}}">{{substr($d['url'],0,20)}}...</td>
                                            <td title="Count Visit to that time">{{$d['jam7']}}</td>
                                            <td title="Count Visit to that time">{{$d['jam8']}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 mb-4">
            <div class="title-24 no-wrap" id="periode">By Employee</div>
        </div>
        <div class="col-12">

            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_8.png')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">Summary</div></div> 
                        <div class="visit"><div class="countt">{{count($byemployee)}}</div> Visitors</div> 
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="bg-white">
                        <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                            <table id="DTtable5" class="table tbl-content-left no-wrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTMENT</th>
                                        <th>SUB</th>
                                        <th>MODUL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($byemployee as $d)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$d['nik']}}</td>
                                            <td>{{$d['nama']}}</td>
                                            <td>{{$d['departemen']}}</td>
                                            <td>{{$d['departemensubsub']}}</td>
                                            <td>{{$d['Modul']}}</td>
                                        </tr>
                                        @php
                                        $i+=1;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    });
</script>

<script>
  function set_appname(appnm) {
    $('#app_name').val(appnm);
    $('#frmFilter').submit();
  }

  $(document).ready( function () {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var product = urlParams.get('daterange');
    $('#daterange').val(product);
    if (product) {
        $('#periode').html('Period '+product);
    }

    var table = $('#DTtable1').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable4').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable5').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable6').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
    $('#recipeCarousel').carousel({
    interval: 3500
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