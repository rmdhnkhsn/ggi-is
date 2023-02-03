@extends("layouts.app")
@section("title","Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards-18" style="padding:2rem">
          <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link relative active" bagian="request" data-toggle="tab" href="#list" role="tab"></i>
                <i class="fs-28 fas fa-archive"></i>
                <div class="f-14">Packing List</div>
                <span class="tabs-badge">{{ $jumlahData }}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link relative" data-toggle="tab" href="#daily" role="tab"></i>
                <i class="fs-28 fas fa-book"></i>
                <div class="f-14">Daily Target PL</div>
                <span class="tabs-badge">9</span>
              </a>
              <div class="sch-slide"></div>
            </li>
          </ul>
          <div class="tab-content card-block">
            <div class="tab-pane active" id="list" role="tabpanel">
                @include('warehouse.expedition.packing_list.partials.packing_list')
            </div>
            <div class="tab-pane" id="daily" role="tabpanel">
                @include('warehouse.expedition.packing_list.partials.daily_target')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 100,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 100,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });

  $(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush