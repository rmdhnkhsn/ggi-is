@extends("layouts.app")
@section("title","User Feedback")
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

<section class="content">
  <div class="container-fluid gccTrafic pb-4">
    <div class="row">
      <a href="{{ route('userfeedback-index') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
              <div class="desc-active">User Feedback</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('userfeedback-analytics') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
              <div class="desc">Analytics</div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('userfeedback-review') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
              <div class="desc">Kuesioner</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-12">
            <div class="judul">Traffic of Gistex Command Center</div>
            <div class="sub-judul">see the number of user visits on the Indonesian gistex garment system</div>
            <div class="title-14 text-left mt-2" id="periode">Period {{date('m/d/Y')}}</div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12 mb-4">
            <form class="filterContainer" id="frmFilter" action="{{route('traffic-index')}}" method="get" enctype="multipart/form-data">
                <input type="hidden" name="app_name" id="app_name" value="" placeholder="">
                <div class="title-24 no-wrap" >
                    <a type="button" href="{{ route('userfeedback-create') }}"><i class="fas fa-plus"></i> Add Quesionnaire </a>
                </div>
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
        @foreach($data as $v)
        <div class="col-12">
            <div class="accordionItems">            
                <header class="accordionHeaders justify-start" style="gap:.8rem">
                    <div class="images">
                        <img src="{{url('images/iconpack/production/issue_1.svg')}}">
                    </div>
                    <div class="content">
                        <div class="periode"><div class="fw-5 mr-1">{{$v->sistem}}</div> ({{$v->url}})</div> 
                        <div class="visit"><div class="countt">{{$v->question->count()}}</div> Questions</div> 
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
                                    <tr>
                                        <td>11</td>
                                        <td>22</td>
                                        <td>33/td>
                                        <td>44</td>
                                        <td>55</td>
                                        <td>66</td>
                                        <td>77</td>
                                        <td title="test">88</td>
                                        <td title="Count Visit to that time">99</td>
                                        <td title="Count Visit to that time">10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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

    $(document).ready( function () {
        var table = $('#DTtable1').DataTable({
        // scrollX : '100%',
        "pageLength": 12,
        "dom": '<"search"><"top">rt<"bottom"p><"clear">'
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