@extends("more_program.job_orientation.layouts.app")
@section("title","Result")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cards resultTest">
                    <div class="row" style="height:100%">
                        <div class="imgContainer">
                            <img src="{{url('images/iconpack/job_orientation/completed.svg')}}" class="imgCompleted">
                        </div>
                        <div class="descContainer">
                            <div class="judul">Congratulations you<br/> have completed this test</div>
                            <div class="score">
                                <div class="yourScore">
                                    <div class="text">Your Score</div>
                                    <div class="number">{{$data->final_score}}</div>
                                </div>
                                <div class="result">
                                    <img src="{{url('images/iconpack/job_orientation/result_lulus.svg')}}" class="relative">
                                        <div class="btnHome">
                                            <a href="{{route('start-modul-probation', $data->nik)}}" class="btn-orange-md px-4 flex no-wrap" style="gap:.6rem">
                                                <div class="fw-5">Back To Home</div>
                                                <img src="{{url('images/iconpack/job_orientation/home-icon.svg')}}">
                                            </a> 
                                        </div>
                                    </img>
                                </div>
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

@endpush