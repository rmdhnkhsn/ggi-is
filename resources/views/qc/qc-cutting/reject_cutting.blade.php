@extends("layouts.app")
@section("title","Reject Cutting")
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
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('qc-cutting')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-file-signature"></i>
              <div class="desc">Cek Marker</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-cutting-daily')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-cut"></i>
              <div class="desc">Cutting Daily</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-reject-cutting')}}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-window-close"></i>
              <div class="desc-active">Reject Cutting</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-embro-print')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-tags"></i>
              <div class="desc">Embro & Print </div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-report')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-book"></i>
              <div class="desc">Report</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb">
              <div class="title-20 title-hide">Reject Cutting</div>
              <div class="flexx" style="gap:.6rem">
                <div class="input-group flex">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue px-3" for=""><i class="fs-18 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control border-input-10" style="height:38px">
                </div>
                <div class="containerFormAll">
                  <input type="text" id="SearchText" class="searchTextAll" placeholder="search..." required>
                  <button type="button" id="SearchBtn" class="iconSearchAll"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <div class="col-12 mt-2 pb-5">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content-left no-wrap">
                  <thead>
                    <tr>
                      <th>NO</th> 
                      <th>Form ID</th>
                      <th>Date</th>
                      <th>Total Reject</th>
                      <th>WO List</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>220791</td>
                      <td>21/12/2022</td>
                      <td>3.500</td>
                      <td>17546786, 12546513, 3546532, 35135432, 436543</td>
                      <td>
                        <div class="tbl-btn-container flex" style="gap:.4rem">
                          <a href="{{ route('qc-details')}}" class="btn-simple-info"><i class="fs-18 fas fa-info"></i></a>
                          <a href="" class="btn-simple-edit" data-toggle="modal" data-target="#editData"><i class="fs-18 fas fa-pencil-alt"></i></a>
                          <a href="" class="btn-simple-delete delete"><i class="fs-18 fas fa-trash"></i></a>
                          @include('qc.qc-cutting.partials.reject-cutting.edit')
                        </div>
                      </td>
                    </tr>
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready(
    function () {
        $('#multipleSelectExample').select2();
    }
  );
</script>

<script>
  $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      order:[[3,"desc"]],
      "pageLength": 10,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">'
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
</script>
@endpush 
