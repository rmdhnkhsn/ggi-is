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
        <div class="row">
            <div class="col-12 question">
                <div class="cards" style="padding:34px">
                    <div class="justify-sb">
                        <div class="judul">{{$data->judul}}</div>
                        <div class="operation flex" style="gap:.8rem">
                            <a href="" class="btn-blue" data-toggle="modal" data-target="#addQuest">Add Question <i class="ml-2 fs-18 fas fa-plus"></i></a>
                            <a href="{{route('job_orientation.delete_all-soal', $data->id)}}" class="btn-merah">Delete All <i class="ml-2 fs-18 fas fa-trash"></i></a>
                        </div>
                        @include('hr_ga.question.partials.modals')
                    </div>
                    <div class="sub-judul mb-4">Create & Update Question for {{$data->judul}}</div>
                    <?php $no=1;?>
                    @foreach($data->soal as $key => $value)
                    <div class="cardBlue" style="padding:34px 28px">
                        <div class="buttons">
                            <a href="" class="btn-simple-edit" data-toggle="modal" data-target="#updateQuest-{{$value->id}}"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('job_orientation.delete-soal',$value->id)}}" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            @include('hr_ga.question.partials.modals-edit')
                        </div>
                        <div class="title" scope="row">Question {{$no++}}</div>
                        <div class="quest">{{$value->question}}</div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="radio" name="quest1-{{$value->id}}" value="A" class="quest-radio" id="1-quest1-{{$value->id}}">
                                @if($value->answer == 'A')
                                <label for="1-quest1-{{$value->id}}" class="containerChoice rightAnswere">
                                @else
                                <label for="1-quest1-{{$value->id}}" class="containerChoice">
                                @endif
                                    <div class="choice">A</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$value->option1}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="quest1-{{$value->id}}" value="B" class="quest-radio" id="1-quest2-{{$value->id}}">
                                @if($value->answer == 'B')
                                <label for="1-quest2-{{$value->id}}" class="containerChoice rightAnswere">
                                @else
                                <label for="1-quest2-{{$value->id}}" class="containerChoice">
                                @endif
                                    <div class="choice">B</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$value->option2}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="quest1-{{$value->id}}" value="C" class="quest-radio" id="1-quest3-{{$value->id}}">
                                @if($value->answer == 'C')
                                <label for="1-quest3-{{$value->id}}" class="containerChoice rightAnswere">
                                @else
                                <label for="1-quest3-{{$value->id}}" class="containerChoice">
                                @endif
                                    <div class="choice">C</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$value->option3}}</div> 
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="quest1-{{$value->id}}" value="D" class="quest-radio" id="1-quest4-{{$value->id}}">
                                @if($value->answer == 'D')
                                <label for="1-quest4-{{$value->id}}" class="containerChoice rightAnswere">
                                @else
                                <label for="1-quest4-{{$value->id}}" class="containerChoice">
                                @endif
                                    <div class="choice">D</div>
                                    <div class="subChoice">
                                        <div class="text-truncate">{{$value->option4}}</div> 
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="justify-start">
                        <a href="" class="btn-blue sendAnswere">Save Changes<i class="ml-3 fs-18 fas fa-download"></i></a>
                    </div> -->
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
<script>
  $('.sendAnswere').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Save Question?',
        // text: 'This record and it`s details will be permanantly deleted!',
        icon: 'success',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });

  $('.deleteAll').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are You Sure?',
        text: 'This all questions will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });

  $('.deleteQuest').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Delete Question?',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });

  $('.saveQuest').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Your Question Has been Saved',
      buttons: false,
      timer: 1500
    })
  });

  $('.updateQuest').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Your Question Has been Updated',
      buttons: false,
      timer: 1500
    })
  });
</script>

@endpush