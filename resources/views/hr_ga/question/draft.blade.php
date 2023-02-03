@extends("layouts.app")
@section("title","Draft Question")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid pb-5">
        <div class="row question">
            <div class="col-12 justify-center mb-4" style="gap:1.5rem">
                <div class="title-20-grey no-wrap">Recent Drafts</div>
                <div class="borderlight"></div>
            </div>

            <div class="col-12">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($enam_terakhir as $key => $value)
                        <?php 
                        $pertama = collect($enam_terakhir)->first();
                        ?>
                        @if($value->id == $pertama->id)
                        <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                        @endif
                            <div class="col-lg-2 col-md-4">
                                @if($value->departemen != 'All Departemen')
                                <a href="" class="btnQuest2">
                                    <div class="white">
                                        <img src="{{url('images/iconpack/job_orientation/all_draft.svg')}}">
                                    </div>
                                    <div style="width:100%">
                                        <div class="title">{{$value->judul}} ({{$value->departemen}})</div>
                                    </div>
                                </a>
                                @else
                                <a href="" class="btnQuest2">
                                    <div class="blue">
                                        <img src="{{url('images/iconpack/job_orientation/public_draft.svg')}}">
                                    </div>
                                    <div style="width:100%">
                                        <div class="title">{{$value->judul}} (Public Question)</div>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carouselPrev" href="#recipeCarousel" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="carouselNext" href="#recipeCarousel" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-12 justify-center my-4" style="gap:1.5rem">
                <div class="title-20-grey no-wrap">All Drafts Questions</div>
                <div class="borderlight"></div>
            </div>
            <div class="col-lg-2 col-md-4">
                <a href="" class="btnQuest1" data-toggle="modal" data-target="#create">
                    <div class="white">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div style="width:100%">
                        <div class="newQuest">New Question</div>
                    </div>
                </a>
                @include('hr_ga.question.partials.quest-modal')
            </div>
            @foreach($modul as $key => $value)
            <div class="col-lg-2 col-md-4">
                <a href="{{ route('question.index', $value->id)}}" class="btnQuest2">
                    @if($value->departemen != 'All Departemen')
                    <div class="white">
                        <img src="{{url('images/iconpack/job_orientation/all_draft.svg')}}">
                    </div>
                    <div style="width:100%">
                        <div class="title">{{$value->judul}} ({{$value->departemen}})</div>
                    </div>
                    @else
                    <div class="blue">
                        <img src="{{url('images/iconpack/job_orientation/public_draft.svg')}}">
                    </div>
                    <div style="width:100%">
                        <div class="title">{{$value->judul}} (Public Question)</div>
                    </div>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script type="text/javascript" src="{{asset('/common/js/slick.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

@if(Session::has('data_terdaftar'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Modul dengan judul dan departemen tersebut telah dibuat!'
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
        text: 'Data Berhasil Tersimpan!',
        buttons: false,
        timer: 1500
      })
    };
  </script>
@endif
<!-- Select2_BS4  -->
<script>
  $('.select2bs4_dept').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $('.select2bs4_sub').select2({
    theme: 'bootstrap4'
  })
</script>
<!-- End  -->

<!-- Dropdown Departement  -->
<script>
$(document).ready(function () {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
});
$('#departemen').change(function(){
    var ID = $(this).val();    
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("job_orientation.departemen") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){              
                // console.log(res); 
                var result = Object.values(res);
                // console.log(result);
                if(result){
                    $("#departemensubsub").empty();
                    $("#departemensubsub").append('');
                    i=0;
                    $.each(result,function(){
                        // console.log(result[i].departemensubsub);
                        $("#departemensubsub").append('<option value="'+result[i].departemensubsub+'">'+result[i].departemensubsub+'</option>');
                        i+=1;
                    });
                }else{
                    $("#departemensubsub").empty();
                }
            }
        });
    }else{
        $("#departemensubsub").empty();

    }      
});
</script>
<!-- End dropdown  -->

<script>
$('#recipeCarousel').carousel({
  interval: 3500
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 5;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});
</script>

@endpush