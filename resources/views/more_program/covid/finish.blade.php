@extends("more_program.covid.layouts.app")
@section("title","Finish Question Weekly")
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
                <button class="previous-tab" data-direction="previous" data-target="#myTab"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="name">Hi, {{auth()->user()->nama}}</div>
            <img src="{{url('images/iconpack/covid_quest/hello.svg')}}">
        </div>
        <div class="caption">
            <div class="title">Evaluasi Aktifitas Mingguan</div>
        </div>
    </div>
    <div class="cardQ" style="margin-top:-4.5rem">
        <div class="titleFinish">Jawabanmu <br/> sudah di simpan</div>
        <div class="justify-center my-5">
            <img src="{{url('images/iconpack/covid_quest/finish.svg')}}">
        </div>
        <a href="{{ url('logout') }}" class="btn-orange-md" style="margin-top:3rem;position:relative;z-index:20">Log Out</a>
        <img src="{{url('images/iconpack/covid_quest/grass.svg')}}" class="grassImg">
    </div>

</section>
@endsection
@push("scripts")

<script>
    $('body').on('click','.next-tab', function(){
        var next = $('.nav-tabs > .active').next('li');
        if(next.length){
            next.find('a').trigger('click');
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