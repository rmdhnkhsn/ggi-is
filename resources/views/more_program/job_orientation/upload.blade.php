@extends("layouts.app")
@section("title","Upload")
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
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row JobOri" style="padding-bottom:8rem">
            <div class="col-md-7 mx-auto">
                <div class="cards" style="padding:20px 28px">
                    <div class="title-24 text-center my-4" style="font-weight:600">Upload Documents</div>
                    <!-- <div class="col-12 justify-start">
                        <input type="checkbox" id="public" class="check1">
                        <label for="public">Set to Public</label>
                    </div> -->
                    <div class="col-12 my-3">
                        <span class="title-sm">Select Document Category</span>
                        <div class="row mt-2">
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#link">
                                    <img src="{{url('images/iconpack/job_orientation/link.svg')}}" style="width:23px">
                                    <span class="name">Link</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#video">
                                    <img src="{{url('images/iconpack/job_orientation/video.svg')}}" style="width:23px">
                                    <span class="name">Video</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#jpg">
                                    <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}" style="width:23px">
                                    <span class="name">Image</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#pdf">
                                    <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}" style="width:23px">
                                    <span class="name">Pdf</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#excel">
                                    <img src="{{url('images/iconpack/job_orientation/excel.svg')}}" style="width:23px">
                                    <span class="name">Excel</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#word">
                                    <img src="{{url('images/iconpack/job_orientation/word.svg')}}" style="width:23px">
                                    <span class="name">Doc</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#ppt">
                                    <img src="{{url('images/iconpack/job_orientation/pp.svg')}}" style="width:23px">
                                    <span class="name">Power Point</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#rar">
                                    <img src="{{url('images/iconpack/job_orientation/rar.svg')}}" style="width:23px">
                                    <span class="name">Archive</span>
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button class="btnModalJob" data-toggle="modal" data-target="#sc">
                                    <img src="{{url('images/iconpack/job_orientation/code.svg')}}" style="width:23px">
                                    <span class="name">Source Code</span>
                                </button>
                            </div>
                        </div>
                        @include('more_program.job_orientation.partials.modal-upload')
                        @include('more_program.job_orientation.partials.modal-video')
                        @include('more_program.job_orientation.partials.modal-image')
                        @include('more_program.job_orientation.partials.modal-pdf')
                        @include('more_program.job_orientation.partials.modal-excel')
                        @include('more_program.job_orientation.partials.modal-word')
                        @include('more_program.job_orientation.partials.modal-ppt')
                        @include('more_program.job_orientation.partials.modal-rar')
                        @include('more_program.job_orientation.partials.modal-sc')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script>
  document.getElementById('saveLink').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('saveVideo').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('saveImage').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('savepdf').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('saveExcel').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('saveWord').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('simpanppt').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('simpanrar').addEventListener('submit', function() {
    showLoading();
  });
  document.getElementById('simpansc').addEventListener('submit', function() {
    showLoading();
  });
  function showLoading(){
    let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 1000)
            },
            willClose: () => {
                clearInterval(timerInterval)
                showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
                
            }
        })
    }
</script>

<script>
    $(".customFileInput").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });
    // Buat LINK 
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52').select2({
        theme: 'bootstrap4'
    })
    // Buat Video 
    $('.select2bs4_video').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_video').select2({
        theme: 'bootstrap4'
    })
    // Buat Image 
    $('.select2bs4_image').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_image').select2({
        theme: 'bootstrap4'
    })

    // Buat PDF 
    $('.select2bs4_pdf').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_pdf').select2({
        theme: 'bootstrap4'
    })

    // Buat Excel 
    $('.select2bs4_excel').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_excel').select2({
        theme: 'bootstrap4'
    })

    // Buat Word 
    $('.select2bs4_word').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_word').select2({
        theme: 'bootstrap4'
    })

    // Buat PPT 
    $('.select2bs4_ppt').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_ppt').select2({
        theme: 'bootstrap4'
    })

    // Buat RAR 
    $('.select2bs4_rar').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_rar').select2({
        theme: 'bootstrap4'
    })

    // Buat Source Code 
    $('.select2bs4_sc').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs52_sc').select2({
        theme: 'bootstrap4'
    })
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.imageUploadWrap').hide();

            reader.onload = function (e) {
                $(".fileUploadImg").attr("src", e.target.result);
                $(".fileUploadContent").show();
            };
            reader.readAsDataURL(input.files[0]);
            // $("#frmSubmit").submit();

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.fileUploadInput').replaceWith($('.fileUploadInput').clone());
        $('.fileUploadContent').hide();
        $('.imageUploadWrap').show();
    }
    $('.imageUploadWrap').bind('dragover', function () {
        $('.imageUploadWrap').addClass('image-dropping');
    });
    $('.imageUploadWrap').bind('dragleave', function () {
        $('.imageUploadWrap').removeClass('image-dropping');
    });
</script>

<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    });

    // Buat Link
    $('#departemen').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian").empty();
                $("#bagian").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian").empty();
            }
            }
        });
    }else{
        $("#bagian").empty();
    }      
    });

    // Buat Video
    $('#departemen_video').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_video").empty();
                $("#bagian_video").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_video").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_video").empty();
            }
            }
        });
    }else{
        $("#bagian_video").empty();
    }      
    });

    // Buat Image
    $('#departemen_image').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_image").empty();
                $("#bagian_image").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_image").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_image").empty();
            }
            }
        });
    }else{
        $("#bagian_image").empty();
    }      
    });

    // Buat PDF
    $('#departemen_pdf').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_pdf").empty();
                $("#bagian_pdf").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_pdf").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_pdf").empty();
            }
            }
        });
    }else{
        $("#bagian_pdf").empty();
    }      
    });

    // Buat EXCEL
    $('#departemen_excel').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_excel").empty();
                $("#bagian_excel").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_excel").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_excel").empty();
            }
            }
        });
    }else{
        $("#bagian_excel").empty();
    }      
    });

    // Buat Word
    $('#departemen_word').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_word").empty();
                $("#bagian_word").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_word").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_word").empty();
            }
            }
        });
    }else{
        $("#bagian_word").empty();
    }      
    });

     // Buat PPT
     $('#departemen_ppt').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_ppt").empty();
                $("#bagian_ppt").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_ppt").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_ppt").empty();
            }
            }
        });
    }else{
        $("#bagian_ppt").empty();
    }      
    });

     // Buat RAR
     $('#departemen_rar').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_rar").empty();
                $("#bagian_rar").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_rar").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_rar").empty();
            }
            }
        });
    }else{
        $("#bagian_rar").empty();
    }      
    });

     // Buat Source Code
     $('#departemen_sc').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job.bagian") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){             
            if(res){
                $("#bagian_sc").empty();
                $("#bagian_sc").append('');
                i=0;
                $.each(res,function(){
                    console.log(res[i].branch);
                    $("#bagian_sc").append('<option value="'+res[i].departemensubsub+'">'+res[i].departemensubsub+'</option>');
                    i+=1;
                });
            }else{
                $("#bagian_sc").empty();
            }
            }
        });
    }else{
        $("#bagian_sc").empty();
    }      
    });
</script>

@endpush