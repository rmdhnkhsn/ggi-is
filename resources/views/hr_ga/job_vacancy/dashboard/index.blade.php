@extends("layouts.app")
@section("title","Sample Request")
@push("styles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
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
    <div class="row">
      <a href="{{ route('dashboard-index')}}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('employee-tracking')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="desc">Job Aplicant</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-5">
      <div class="col-lg-8 jobVacancy">
         <div class="cards-18 p-4 mb-5"> <!--style="min-height:895px" -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="justify-sb" style="gap:1rem">
                        <div class="title-14 no-wrap">All Data</div>
                        <div class="container-form" style="margin-right:-2px">
                            <input type="text" id="SearchText" class="searchText" placeholder="Search..." required>
                            <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable2" class="table tbl-content-left no-wrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Job Position</th>
                                    <th>Telphone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mamat Sugandi</td>
                                    <td>Programmer</td>
                                    <td>0856645825</td>
                                    <td>mamat.sugandi@gmail.com</td>
                                    <td>Skill Test</td>
                                    <td>
                                        <div class="container-tbl-btn flex" style="gap:.3rem">
                                            <a href="" class="btn-simple-info" style="width:37px;height:37px;margin-left:1px"><img src="{{url('images/iconpack/info.svg')}}"> </a>
                                            <a href="" class="btn-simple-delete deleteFile" style="width:37px;height:37px"><i class="fs-18 fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hendra Sugandi</td>
                                    <td>Programmer</td>
                                    <td>0856645825</td>
                                    <td>hendra.sugandi@gmail.com</td>
                                    <td>Psychotest</td>
                                    <td>
                                        <div class="container-tbl-btn flex" style="gap:.3rem">
                                            <a href="" class="btn-simple-info" style="width:37px;height:37px;margin-left:1px"><img src="{{url('images/iconpack/info.svg')}}"> </a>
                                            <a href="" class="btn-simple-delete deleteFile" style="width:37px;height:37px"><i class="fs-18 fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Andri Sugandi</td>
                                    <td>Programmer</td>
                                    <td>0856645825</td>
                                    <td>andri.sugandi@gmail.com</td>
                                    <td>Skill Test</td>
                                    <td>
                                        <div class="container-tbl-btn flex" style="gap:.3rem">
                                            <a href="" class="btn-simple-info" style="width:37px;height:37px;margin-left:1px"><img src="{{url('images/iconpack/info.svg')}}"> </a>
                                            <a href="" class="btn-simple-delete deleteFile" style="width:37px;height:37px"><i class="fs-18 fas fa-trash"></i></a>
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
      <div class="col-lg-4 sr-notification">
        <div class="cards-18 p-3"><!--  style="height:895px" -->
          <div class="row mb-2">
            <div class="col-12 mb-3">
                <div class="cardStatusEmploye">
                    <div class="logo">
                        <img src="{{url('images/iconpack/gistex.svg')}}">
                    </div>
                    <div class="employeeCount">
                        <div class="count">2345
                            <span class="name">Employee</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
              <div class="color-card bg-biru">
                <div class="icons"><i class="rotate180 c-biru fas fa-eject"></i></div>
                <div class="jumlah">100</div>
                <div class="request">Request</div>
                <div class="desc">REQUEST</div>
              </div>
            </div>
            <div class="col-4">
              <div class="color-card bg-kuning">
                <div class="icons"><img src="{{url('images/iconpack/person-gather-yellow.svg')}}"> </div>
                <div class="jumlah">20</div>
                <div class="request">Request</div>
                <div class="desc">APPLICANT</div>
              </div>
            </div>
            <div class="col-4">
              <div class="color-card bg-red">
                <div class="icons"><img src="{{url('images/iconpack/person-walking-red.svg')}}"> </div>
                <div class="jumlah">30</div>
                <div class="request">Request</div>
                <div class="desc">PROBATION</div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="title-16" style="font-weight:500">Recent Job Applicant</div>
              <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar" style="max-height:265px">
                <div class="due-soon"><!-- Foreach -->
                  <div class="due-icon">
                    <img src="{{url('images/iconpack/person-gather.svg')}}"> 
                  </div>
                  <div class="due-desc">
                    <div class="name">Hendra Sugandi</div>
                    <div class="subName text-truncate">Apply for Programmer</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="title-16" style="font-weight:500">Notification</div>
              <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar" style="max-height:265px">
                <div class="notification"><!-- Foreach -->
                  <div class="notification-icon">
                    <img src="{{url('images/iconpack/person-walking.svg')}}"> 
                  </div>
                  <div class="notification-desc">
                    <div class="name">Fahlu Sutisna</div> 
                    <div class="subName text-truncate">Probation periode is over, Take a action</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4 mb-1">	
              <a href="" class="btn-blue-md">See All Details </a>
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
    $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This candidate will be permanantly deleted!',
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
    "pageLength": 16,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    "pageLength": 16,
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