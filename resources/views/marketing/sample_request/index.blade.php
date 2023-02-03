@extends("layouts.app")
@section("title","Sample Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/dataTablesRight.css')}}">
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
    <div class="row pb-5">
      <div class="col-12">
          <div class="cards p-4">
            <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#request" role="tab"></i>
                        <i class="icon-tabs1 fas fa-eject"></i>
                        <div class="f-14">Request</div>
                        <span class="tabs-badge">{{ $dataSampleSum }}</span>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#Onprogress" role="tab"></i>
                        <i class="fs-28 fas fa-spinner"></i>
                        <div class="f-14">On Progress</div>
                        <span class="tabs-badge">{{ $OnProgress }}</span>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#Doneprogress" role="tab"></i>
                        <i class="fs-28 fas fa-check-square"></i>
                        <div class="f-14">Done Progress</div>
                        <span class="tabs-badge">{{ $doneProgress }}</span>
                    </a>
                    <div class="sch-slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block">
                <div class="tab-pane active" id="request" role="tabpanel">
                    @include('marketing.sample_request.partials.request.tabs_request')
                </div>
                <div class="tab-pane" id="Onprogress" role="tabpanel">
                    @include('marketing.sample_request.partials.onProgress.tabs_onProgress')
                </div>
                <div class="tab-pane" id="Doneprogress" role="tabpanel">
                    @include('marketing.sample_request.partials.doneProgress.tabs_doneProgress')
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
    var table = $('#DTtable').DataTable({
      // order:[[2,"asc"]]
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
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

  $('#DueDate').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: true
  })

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

  
</script>

<script>
	$(document).ready(function(){
	  $('[data-toggle="popover"]').popover();
	});
</script>

@endpush