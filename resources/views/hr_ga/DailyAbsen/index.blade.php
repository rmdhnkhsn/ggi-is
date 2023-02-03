@extends("layouts.app")
@section("title","Daily Absen")
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
    <div class="row turnOver pb-5">
        <div class="col-12">
            <div class="cards-18 p-4">
            <!-- <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#session1" role="tab"></i>
                        <i class="fs-28 fas fa-clock"></i>
                        <div class="f-14">08.00 - 17.00</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#session2" role="tab"></i>
                        <i class="fs-28 fas fa-clock"></i>
                        <div class="f-14">15.15 - 12.00</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
            </ul> -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="session1" role="tabpanel">
                    @include('hr_ga.DailyAbsen.partials.session1')
                </div>
                <div class="tab-pane" id="session2" role="tabpanel">
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>  

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      "pageLength": 12,
      "buttons": [ "csv" ],
      "dom": '<"search"B><"top">rt<"bottom"p><"clear">',
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn").click();
    }
  });

  $('.exportCSV').click(function(){
      $(".buttons-csv").click();
  })

  //   ==================

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    //   scrollX : '100%',
      "pageLength": 12,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">',
    });
    $('#SearchBtn2').on( 'keyup click', function () {
      table.search($('#SearchText2').val()).draw();
    });
  });
  var input = document.getElementById("SearchText2");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn2").click();
    }
  });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>
@endpush