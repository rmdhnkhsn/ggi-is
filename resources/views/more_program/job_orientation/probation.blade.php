@extends("layouts.app")
@section("title","Probation")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row JobOri">
        <div class="col-md-9 mx-auto">
            <div class="cards p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="title-24 text-center mb-3 mt-4" style="font-weight:600">Search Documents</div>
                        <div class="justify-center" style="gap:.7rem !important">
                            <div class="relative" style="width:60%">
                                <input type="text" class="searchText search" placeholder="Search..." required>
                                <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
                            </div>
                            <a href="{{ route('start-test') }}" class="btn-blue">Start Test<i class="ml-2 fs-18 fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="tab-content">
                            <ul class="list-group list-group-flush">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active cobacoba" coba_atribut="" id="" role="tabpanel">
                                        <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                            <li class="listGroup cobaanwe" id="" atribut_we="">
                                                <div class="justify-sb marginMinY">
                                                    <!-- Filter ICON -->
                                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                                        <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                                        <!-- <img src="{{url('images/iconpack/job_orientation/video.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/link.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/excel.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/pp.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/rar.svg')}}">
                                                        <img src="{{url('images/iconpack/job_orientation/code.svg')}}"> -->
                                                        <div class="title-14 nama_dokumen text-truncate" style="font-weight:500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, sunt!</div>
                                                    </div>
                                                    <div class="btn-group dropJob">
                                                        <!-- Jumlah Verif  -->
                                                        <div class="popVerify">
                                                            <div class="icon check">
                                                                <div class="tooltip no-wrap">
                                                                    Verified 3 People
                                                                </div>
                                                                <i class="fas fa-check-circle"></i>
                                                            </div>
                                                        </div>

                                                        <!-- Viewers  -->
                                                        <div class="btnSee">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="seeCount" id="">9</div>
                                                        </div>
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <!-- Preview  -->
                                                            <a class="dropdown-item submit_media" id="image" atribut_we="" viewers_na="" href="#" data-toggle="modal" data-target="#previewImages"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            <!-- Modal Detail  -->
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesAll"><i class="fs-18 fas fa-info-circle" style="margin-right:7px;margin-left:-2px"></i>Detail Files</a>
                                                            
                                                            <!-- Modal Edit  -->
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit"><i class="fs-18 fas fa-pencil-alt" style="margin-right:5px"></i>Edit Document</a>

                                                            <!-- Modal Verif  -->
                                                            <button type="submit" class="dropdown-item" onclick="return confirm('Verify this document?');" style="color:#0CAE63"><i class="fs-18 fas fa-check-circle" style="margin-left:-2px;margin-right:7px"></i>Verify</button>

                                                            <!-- Delete  -->
                                                            <a class="dropdown-item deleteFile" style="color:#FB5B5B" href=""><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12 text-center mt-4">
                                    <a href="#" class="btn-leadMore">Lead More...</a>
                                </div> -->
                            </ul>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/guide/moment.min.js')}}"></script>

@if(Session::has('error'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Tidak diperbolehkan untuk upload lebih dari satu tanggal produksi.'
      })
    }
  </script>
@endif

@if(Session::has('success'))
  <script>
    // toastr.success("{!!Session::get('success')!!}");
    window.onload = function() {
      swal({
        position: 'center',
        icon: 'success',
        title: 'Success',
        text: 'Data Berhasil Tersimpan',
        buttons: false,
        timer: 1500
      })
    };
  </script>
@endif
<script>
$(".customFileInput").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
});
</script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>
@endpush