@extends("layouts.app")
@section("title","Rekapitulasi Subkon")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('subkon.monitoring',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-desktop"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">MONITORING</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('subkon.rekapitulasi',$no_kontrak)}}" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-book"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">REKAPITULASI</div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('subkon.rekapDetail',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">REKAP DETAIL</div>
            </div>
          </div>
        </div>
      </a>
      @endif
    </div>

    <div class="row">
      <div class="col-12 justify-center">
        <div class="title-24">REKAPITULASI SUBKONTRAK KE PT. GISTEX GARMEN INDONESIA</div>
      </div>
    </div>
    @include('MatDoc.subkon.partials.rekapitulasi.card-flat')
    <div class="row mt-4">
      <div class="col-12 px-2">
        <ul class="nav nav-tabs sb-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#S1" role="tab"></i>SUBKON 261</a>
                <div class="sb-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#S2" role="tab"></i>SUBKON 262</a>
                <div class="sb-slide"></div>
            </li>
        </ul>
        <div class="tab-content card-block">
            <div class="tab-pane active" id="S1" role="tabpanel">
              @include('MatDoc.subkon.partials.rekapitulasi.subkon_261')
            </div>
            <div class="tab-pane" id="S2" role="tabpanel">
              @include('MatDoc.subkon.partials.rekapitulasi.subkon_262')
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<!-- <script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script> -->
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $('.deletePartial').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    console.log(url);
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["cancel", "yes"],
      }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
      });
  });

  $('.deletePartialReceive').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    console.log(url);
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["cancel", "yes"],
      }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
      });
  });
</script>

<script>
  $(function () {
    $("#DTtable").DataTable({
      dom: 'frtp',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="borderInput px-2" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
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
  $(function () {
    $("#DTtable2").DataTable({
      dom: 'frtp',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable2 tfoot th').each( function () {
        var title = $('#DTtable2 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="borderInput px-2" placeholder="search..." />' );
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
</script>


@endpush