@extends("layouts.app")
@section("title","Scheduling")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('sample-request') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample Request</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-scheduling') }}" class="column-2">
        <div class="cards nav-card bg-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-calendar-alt"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Scheduling</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-dashboard') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-user') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-users"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample User</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link relative active" data-toggle="tab" href="#pattern" role="tab"></i>
                <i class="fs-28 fas fa-desktop"></i>
                <div class="f-14">Pattern</div>
                <span class="tabs-badge">{{ $pattern }}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link relative" data-toggle="tab" href="#cutting" role="tab"></i>
                <i class="fs-28 fas fa-cut"></i>
                <div class="f-14">Cutting</div>
                <span class="tabs-badge">{{ $cutting }}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link relative" data-toggle="tab" href="#sewing" role="tab"></i>
                <i class="fs-28 fas fa-tshirt"></i>
                <div class="f-14">Sewing</div>
                <span class="tabs-badge">{{ $sewing }}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
          </ul>
          <div class="tab-content card-block">
              <div class="tab-pane active" id="pattern" role="tabpanel">
                @include('sample_room.status_sample.partials.scheduling.pattern')
              </div>
              <div class="tab-pane" id="cutting" role="tabpanel">
                @include('sample_room.status_sample.partials.scheduling.cutting')
              </div>
              <div class="tab-pane" id="sewing" role="tabpanel">
                @include('sample_room.status_sample.partials.scheduling.sewing')
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready( function () {
    var table = $('#DTtable_scheduling').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_scheduling2').DataTable({
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_scheduling3').DataTable({
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });

</script>

<script>
  $('#Date').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date2').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date3').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date4').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>

@endpush