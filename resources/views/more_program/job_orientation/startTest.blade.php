@extends("layouts.app")
@section("title","Orientation Question")
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
        <div class="row question">
            <div class="col-12">
                <div class="judul">Comprehension Test</div>
                <div class="sub-judul">Answer some questions to test your knowledge</div>
            </div>
            <div class="col-12 mb-4">
                <div class="borderlight"></div>
            </div>
            <?php
                $soal_pertama = collect($index_soal)->first();
                $id_selanjutnya = $soal_pertama['id']+1;
                $soal_terakhir = collect($index_soal)->last();
            ?>
            <div class="col-md-4">
                <div class="cards" style="padding:18px 14px">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="judul2">Question Page</div>
                            <div class="sub-judul">Select the question & answere</div>
                        </div>
                        @foreach($index_soal as $key => $value)
                        @if($value['jawaban_user'] != null)
                        <a href="{{ route('next-test-orientation', $value['id']) }}" class="columnTracking" style="background-color: #007BFF;color: #fff;">
                        @else
                        <a href="{{ route('next-test-orientation', $value['id']) }}" class="columnTracking">
                        @endif
                            @if($value['id'] == $soal_pertama['id'])
                            <div class="tracking focus">{{$value['urutan_soal']}}</div>
                            @else
                            <div class="tracking">{{$value['urutan_soal']}}</div>
                            @endif
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="cards" style="padding:26px 18px">
                    <div class="cardBlue" style="padding:34px 28px">
                        <div class="row">
                            <div class="col-12 mb-2 justify-start">
                                <div class="badge-blue px-3" style="font-weight:400">Question {{$soal_pertama['urutan_soal']}}</div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="quest">{{$soal_pertama['question']}}</div>
                            </div>
                            <div class="col-12">
                                <input type="radio" name="jawaban_user" value="A" {{ ($soal_pertama['jawaban_user'] == 'A' ) ? "checked" : "" }} class="quest-radio" id="1-quest1">
                                <label for="1-quest1" class="containerChoice choice-active">
                                    <div class="choice">A</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$soal_pertama['option1']}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <input type="radio" name="jawaban_user" value="B" {{ ($soal_pertama['jawaban_user'] == 'B' ) ? "checked" : "" }} class="quest-radio" id="1-quest2">
                                <label for="1-quest2" class="containerChoice choice-active">
                                    <div class="choice">B</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$soal_pertama['option2']}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <input type="radio" name="jawaban_user" value="C" {{ ($soal_pertama['jawaban_user'] == 'C' ) ? "checked" : "" }} class="quest-radio" id="1-quest3">
                                <label for="1-quest3" class="containerChoice choice-active">
                                    <div class="choice">C</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$soal_pertama['option3']}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <input type="radio" name="jawaban_user" value="D" {{ ($soal_pertama['jawaban_user'] == 'D' ) ? "checked" : "" }} class="quest-radio" id="1-quest4">
                                <label for="1-quest4" class="containerChoice choice-active">
                                    <div class="choice">D</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$soal_pertama['option4']}}</div> 
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="justify-end">
                        <a href="{{ route('next-test-orientation', $id_selanjutnya) }}" class="btn-blue next_btn_soal" id="{{$soal_pertama['id']}}" viewers_na="{{$soal_pertama['id']}}" atribut_we="{{$soal_pertama['id']}}">Next<i class="ml-3 fs-18 fas fa-chevron-right"></i></a>
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
    $(function() {
      $('.tracking').click(function() {
        $('.tracking').removeClass('focus');
        $(this).addClass('focus');             
      });
    });
</script>

<script>
  $('.next').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'Save and next question?',
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $(".next_btn_soal").click('#btn-reqq',function(f){
            f.preventDefault(); 
            const viewers = f.target.getAttribute('viewers_na');
            const jawaban_user = $("input[type='radio'][name='jawaban_user']:checked").val();
            var id = f.target.getAttribute('atribut_we');
            var data = {
                'id' :id,
                'jawaban_user' : jawaban_user
            }
            $.ajax({
                type: "PUT",
                url: '{{ route("question.answer_update") }}',           
                data: data,
                dataType: 'json',
                success: function (response) {
                location.href = f.target.getAttribute('href');
                }
            })
        })
    })
</script>
@endpush