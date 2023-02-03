@extends("more_program.covid.layouts.app")
@section("title","Question Weekly")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/covid.min.css')}}">

@endpush

@section("content")
<section class="content questionCovid">
    <div class="header">
        <img src="{{url('images/iconpack/covid_quest/circle-left.svg')}}" class="circleLeft">
        <img src="{{url('images/iconpack/covid_quest/circle-right.svg')}}" class="circleRight">
        <div class="justify-start" style="gap:.8rem">
            <div class="containerBack">
                <button class="previous-tab" data-direction="previous" data-target="#myTab"><i class="fas fa-arrow-left"></i></button>
            </div>
            <div class="name">Hi, {{auth()->user()->nama}}</div>
            <img src="{{url('images/iconpack/covid_quest/hello.svg')}}">
        </div>
        <div class="caption">
            <div class="title">Form Monitoring COVID</div>
            <div class="sub-title">Silahkan isi form monitoring covid-mingguan dimulai pukul <span class="fw-6">16.00 sd 18.30</span></div> 
        </div>
    </div>
    <div class="cardQ">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#questOne" aria-controls="questOne" role="tab" data-toggle="tab">1</a>
            </li>
            <li role="presentation">
                <a href="#questTwo" aria-controls="questTwo" role="tab" data-toggle="tab">2</a>
            </li>
            <li role="presentation">
                <a href="#questThree" aria-controls="questThree" role="tab" data-toggle="tab">3</a>
            </li>
            <li role="presentation">
                <a href="#questFour" aria-controls="questFour" role="tab" data-toggle="tab">4</a>
            </li>
            <li role="presentation">
                <a href="#questFive" aria-controls="questFive" role="tab" data-toggle="tab">5</a>
            </li>
            <li role="presentation">
                <a href="#questSix" aria-controls="questSix" role="tab" data-toggle="tab">6</a>
            </li>
            <li role="presentation">
                <a href="#questSeven" aria-controls="questSeven" role="tab" data-toggle="tab">7</a>
            </li>
            <li role="presentation">
                <a href="#questEight" aria-controls="questEight" role="tab" data-toggle="tab">8</a>
            </li>
        </ul>
        <form action="{{route('store-question')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="nik" id="nik" value="{{auth()->user()->nik}}">
            <div class="tab-content" id="tab-content">
                <div class="tab-pane active" id="questOne" role="tabpanel">
                    @include('more_program.covid.partials.quest1')
                </div>
                <div class="tab-pane" id="questTwo" role="tabpanel">
                    @include('more_program.covid.partials.quest2')
                </div>
                <div class="tab-pane" id="questThree" role="tabpanel">
                    @include('more_program.covid.partials.quest3')
                </div>
                <div class="tab-pane" id="questFour" role="tabpanel">
                    @include('more_program.covid.partials.quest4')
                </div>
                <div class="tab-pane" id="questFive" role="tabpanel">
                    @include('more_program.covid.partials.quest5')
                </div>
                <div class="tab-pane" id="questSix" role="tabpanel">
                    @include('more_program.covid.partials.quest6')
                </div>
                <div class="tab-pane" id="questSeven" role="tabpanel">
                    @include('more_program.covid.partials.quest7')
                </div>
                <div class="tab-pane" id="questEight" role="tabpanel">
                    @include('more_program.covid.partials.quest8')
                </div>
            </div>
        </form>
        <img src="{{url('images/iconpack/covid_quest/grass.svg')}}" class="grassImg">
    </div>
</section>
@endsection
@push("scripts")

<script src="{{asset('common/js/questCovid/jquery.2.2.0.js')}}"></script>
<script src="{{asset('common/js/questCovid/bootstrap.3.3.7.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
@if(Session::has('tidak_lengkap'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Data tidak lengkap, silahkan periksa kembali!'
      })
    }
  </script>
@endif
<script>
    $('body').on('click','.next-tab', function(){
        var next = $('.nav-tabs > .active').next('li');
        if(next.length){
            next.find('a').trigger('click');
            setTimeout(1000);
        }else{
            $('#myTabs a:first').tab('show');
        }
    });

    $('body').on('click','.next-tab-answer1', function(){
        var next = $('.nav-tabs > .active').next('li');
        if(next.length){
            $('#myTabs a[href="#questThree"]').tab('show');
            document.getElementById("jawabankedua").value = "Tidak Berpergian";
            setTimeout(1000);
        }else{
            $('#myTabs a:first').tab('show');
        }
    });
        let tombol = 0;

    $('body').on('click','.next-tab-answer7', function(){
        var next = $('.nav-tabs > .active').next('li');
        tombol++;
        if(next.length){
            if ( tombol == 1 ) {
                $("#simpantujuh").append(`
                <button type="submit" class="btn-orange-md" style="margin-top:2.8rem;position:relative;z-index:20;display:block;width:100%">Selesai</button>`);
                document.getElementById("jawabanketujuh").value = "Tidak Ada";
                setTimeout(1000);
            }
        }else{
            $('#myTabs a:first').tab('show');
        }
    });

    $('body').on('click','.previous-tab', function(){
        var prev = $('.nav-tabs > .active').prev('li')
        if(prev.length){
            prev.find('a').trigger('click');
        }else{
            $('#myTabs a:last').tab('show');
        }
    });
</script>

@endpush        