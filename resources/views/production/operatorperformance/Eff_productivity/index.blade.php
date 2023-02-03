@extends("layouts.app")
@section("title","Eff & Productivity")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="col-12">
              <div class="justify-sb mb-3">
                <div class="title-22">Eff & Productivity</div>
                <div class="flex" style="gap:.5rem">
                  <div class="input-group dates" id="filter_date" style="width:270px">
                      <div class="input-group-prepend">
                          <span class="inputGroupBlue" style="width:45px;height:37px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="" placeholder="Input Date" style="height:37px;border-radius:0 10px 10px 0" />
                  </div>
                  <!-- <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                  <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button> -->
                  <a href="{{ route('operatorperformance.monitoring')}}" class="btn-simple-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Production Monitoring"><i class="fs-18 fas fa-chart-area"></i></a>
                </div>
              </div>
            </div>
            <div class="col-12 mt-2">
              <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#efficiency" role="tab"></i>
                        <i class="fs-28 fas fa-business-time"></i>
                        <div class="f-14">Efficiency</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#effectivity" role="tab"></i>
                        <i class="fs-28 fas fa-chart-line"></i>
                        <div class="f-14">Effectivity</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#productivity" role="tab"></i>
                        <i class="fs-28 fas fa-cogs"></i>
                        <div class="f-14">Productivity</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="efficiency" role="tabpanel">
                    @include('production.operatorperformance.Eff_productivity.partials.efficiency')
                </div>
                <div class="tab-pane" id="effectivity" role="tabpanel">
                    @include('production.operatorperformance.Eff_productivity.partials.effectivity')
                </div>
                <div class="tab-pane" id="productivity" role="tabpanel">
                    @include('production.operatorperformance.Eff_productivity.partials.productivity')
                </div>
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
<script src="{{asset('common/js/export_btn/buttons2.js')}}"></script>
<script src="{{asset('common/js/export_btn/buttons.html5.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    // $(function() {
    //     $('input[name="daterange"]').daterangepicker();
    // });

    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

    $('.exportExcel2').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf2').click(function(){
        $(".buttons-pdf").click();
    })
</script>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>
<script>
  $(function () {
    $("#DTtable1").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  // $(document).ready( function () {
  //   var table = $('#DTtable1').DataTable({
  //   "pageLength": 15,
  //   "dom": '<"search"><"top">rt<"bottom"p><"clear">'
  //   });
  // });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable1 tfoot th').each( function () {
        var title = $('#DTtable1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
  // ===============
  $(function () {
    $("#DTtable2").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  // $(document).ready( function () {
  //   var table = $('#DTtable2').DataTable({
  //   "pageLength": 15,
  //   "dom": '<"search"><"top">rt<"bottom"p><"clear">'
  //   });
  // });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable2 tfoot th').each( function () {
        var title = $('#DTtable2 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable2').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
  // ===============

  $(function () {
    $("#DTtable3").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  // $(document).ready( function () {
  //   var table = $('#DTtable3').DataTable({
  //   "pageLength": 10,
  //   "dom": '<"search"><"top">rt<"bottom"p><"clear">'
  //   });
  // });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable3 tfoot th').each( function () {
        var title = $('#DTtable3 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable3').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    $("#filter_date").on("change.datetimepicker", ({date}) => {
        var filter = $("#filter_date").find("input").val();
        let result = filter.replaceAll("/", "-");
        location.replace("{{ url('/prd/operator-performance/eff/view?date=')}}"+result) 
    })
  });
</script>

@endpush