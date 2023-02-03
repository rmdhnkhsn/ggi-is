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
                                <a href="{{ route('start-test-orientation', auth()->user()->nik) }}" class="btn-blue no-wrap">Start Test<i class="ml-2 fs-18 fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="tab-content">
                                <ul class="list-group list-group-flush">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active cobacoba" coba_atribut="" id="" role="tabpanel">
                                            <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                                @foreach($jobs as $key3 => $value3)
                                                    <li class="listGroup cobaanwe" id="" atribut_we="">
                                                        <div class="justify-sb marginMinY">
                                                            <!-- Filter ICON -->
                                                            <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                                                @if($value3->kategori == 'IMAGE')
                                                                <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                                                @elseif($value3->kategori == 'VIDEO')
                                                                <img src="{{url('images/iconpack/job_orientation/video.svg')}}">
                                                                @elseif($value3->kategori == 'LINK')
                                                                <img src="{{url('images/iconpack/job_orientation/link.svg')}}">
                                                                @elseif($value3->kategori == 'PDF')
                                                                <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}">
                                                                @elseif($value3->kategori == 'EXCEL')
                                                                <img src="{{url('images/iconpack/job_orientation/excel.svg')}}">
                                                                @elseif($value3->kategori == 'WORD')
                                                                <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                                                @elseif($value3->kategori == 'PPT')
                                                                <img src="{{url('images/iconpack/job_orientation/pp.svg')}}">
                                                                @elseif($value3->kategori == 'RAR')
                                                                <img src="{{url('images/iconpack/job_orientation/rar.svg')}}">
                                                                @elseif($value3->kategori == 'SC')
                                                                <img src="{{url('images/iconpack/job_orientation/code.svg')}}">
                                                                @endif
                                                                <div class="title-14 nama_dokumen text-truncate" style="font-weight:500">{{$value3->nama_dokumen}}</div>
                                                            </div>
                                                            <div class="btn-group dropJob">
                                                                <?php
                                                                     $cek = collect($value3->cek_viewers)->where('nik', auth()->user()->nik)->count('id');
                                                                ?>
                                                                @if($cek != 0)
                                                                <!-- Jumlah Verif  -->
                                                                <div class="btnSee">
                                                                    <i class="fas fa-eye" style="color:#00db76;"></i>
                                                                </div>
                                                                @else
                                                                <div class="btnSee lihatlah{{$value3->id}}">
                                                                    <i class="fas fa-eye belumdilihat{{$value3->id}}"></i>
                                                                </div>
                                                                @endif
                                                                <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <!-- Preview  -->
                                                                    @if($value3->kategori == 'LINK')
                                                                    <a class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                                    @elseif($value3->kategori == 'IMAGE')
                                                                    <a class="dropdown-item submit_btnqq previewImageBawah{{$value3->id}}" onclick="imageBawah(this.id)" id="{{$value3->id}}" pic-url="{{ asset('storage/job_orientation/image/'.$value3->dokumen) }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                                    @elseif($value3->kategori == 'VIDEO')
                                                                    <!-- <a class="dropdown-item submit_media previewVideoAtas{{$value3->id}}" id="{{$value3->id}}" onclick="videoAtas(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a> -->
                                                                    <a class="dropdown-item submit_btnqq previewVideoBawah{{$value3->id}}" id="{{$value3->id}}" onclick="videoBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                                    @elseif($value3->kategori == 'PDF')
                                                                    <a class="dropdown-item submit_btnqq previewPDFBawah{{$value3->id}}" id="{{$value3->id}}" onclick="pdfBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                                    @else
                                                                    <a href="{{route('job.download', $value3->id)}}" class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                                    @endif
                                                                    <!-- Modal Detail  -->
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesBagian-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if($value3->kategori == 'IMAGE')
                                                    @include('more_program.job_orientation.preview.image-sub')
                                                    @elseif($value3->kategori == 'VIDEO')
                                                    @include('more_program.job_orientation.preview.video-sub')
                                                    @elseif($value3->kategori == 'PDF')
                                                    @include('more_program.job_orientation.preview.pdf-sub')
                                                    @endif
                                                    @include('more_program.job_orientation.partials.modal-detail-bagian')
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
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
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script src="{{asset('common/js/guide/moment.min.js')}}"></script>
@if(Session::has('tiga_kali'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Anda tidak lulus test sebanyak 3x / Anda tidak di izinkan untuk mengerjakan test ini kembali. Silahkan menghubungi atasan anda!'
      })
    }
  </script>
@endif
@if(Session::has('tidak_di_izinkan'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Anda tidak diberikan izin untuk mengerjakan test ini kembali!'
      })
    }
  </script>
@endif
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).ready(function() {
    $(".download_submit").click('#btn-moreqq',function(e){
        e.preventDefault(); 
        const nik = e.target.getAttribute('nik');
        const nama = e.target.getAttribute('nama');
        const loop = 1;
        var id = e.target.getAttribute('atribut_we');
        var data = {
            'id' :id,
            'nik' : nik,
            'nama' : nama,
        }
        $.ajax({
            type: "POST",
            url: '{{ route("job.store_viewers") }}',           
            data: data,
            dataType: 'json',
            success: function (response) {
                var mata_ijo = '<i class="fas fa-eye" style="color:#00db76;"></i>';
                $('.belumdilihat'+id).hide();
                $('.lihatlah'+id).html(mata_ijo);
                location.href = e.target.getAttribute('href');
            }
        })
    })
  })
 $(document).ready(function() {
    $(".submit_btnqq").click('#btn-moreqq',function(f){
        f.preventDefault(); 
        const nik = f.target.getAttribute('nik');
        const nama = f.target.getAttribute('nama');
        const loop = 1;
        var id = f.target.getAttribute('atribut_we');
        var data = {
        'id' :id,
        'nik' : nik,
        'nama' : nama,
        }
        $.ajax({
            type: "POST",
            url: '{{ route("job.store_viewers") }}',           
            data: data,
            dataType: 'json',
            success: function (response) {
                var mata_ijo = '<i class="fas fa-eye" style="color:#00db76;"></i>';
                $('.belumdilihat'+id).hide();
                $('.lihatlah'+id).html(mata_ijo);
            }
        })
    })
  })
</script>
<!-- untuk image 2  -->
<script>
  function imageBawah(clicked_id) {
    console.log(clicked_id);
    $('#previewImagesSub'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewImageBawah"+clicked_id);
    let dv = 'priviewImageBawah'+clicked_id;
    let ur=$(classnya).attr("pic-url");
    document.getElementById(dv).src=ur;
  }
</script>
<!-- untuk pdf bawah  -->
<script>
  function pdfBawah(clicked_id) {
    // console.log(clicked_id);
      $('#previewPdfSub'+clicked_id).modal('show');
      const classnya = document.getElementsByClassName("previewPDFBawah"+clicked_id);
      let ur=$(classnya).attr("pic-url");
      // console.log(ur);
      $("#Dicobasaja"+clicked_id).append(`
        <div class="col-12">
            <iframe id="pdf-js-viewer" src="{{ asset('storage/job_orientation/pdf/`+ur+`') }}" width="100%" height="530"></iframe>
        </div>
      `);

      $('#previewPdfSub'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("Dicobasaja"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>
<!-- untuk video bawah  -->
<script>
  function videoBawah(clicked_id) {
    console.log(clicked_id);
    $('#previewVideoSub'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewVideoBawah"+clicked_id);
    let ur=$(classnya).attr("pic-url");
    // // // console.log(ur);
    $("#siVideoBawah"+clicked_id).append(`
      <div class="col-12">
          <video width="100%" controls>
              <source src="{{ asset('storage/job_orientation/video/`+ur+`') }}">
          </video>
      </div>
    `);
    $('#previewVideoSub'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("siVideoBawah"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>
@endpush