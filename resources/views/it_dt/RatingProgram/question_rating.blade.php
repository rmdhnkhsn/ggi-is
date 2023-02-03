@extends("layouts.app")
@section("title","Question Rating")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<form action="{{route('userfeedback.store.questions')}}" id="frmUserfeedback" method="post" enctype="multipart/form-data">
@csrf
  <section class="content">
    <div class="container-fluid RatingProgram pb-4">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="cards-20" style="padding: 2.8rem 1.8rem">
            <div class="title-24-dark mb-2">Rating Program {{$data_module->sistem}}</div>
            <div class="title-14-dark">Kami mengundang untuk membantu meningkatkan kualitas GCC untuk masa depan, Masukan kamu akan berperan penting untuk meningkatkan fitur yang membantu mempermudah pekerjaan kamu.</div>
            <div class="borderRate mb-4"> 
            <input type="hidden" class="form-control" name="users_feedback_id" value="{{$data_module->id}}" required>

            @foreach($data_question as $key=>$value)
            <input type="hidden" class="form-control" name="users_feedback_question_id[]" value="{{$value->id}}" required>
            <input type="hidden" class="form-control" name="question[]" value="{{$value->question}}" required>
            <input type="hidden" class="form-control" name="question_type[]" value="{{$value->question_type}}" required>
            <input type="hidden" class="form-control" name="key_answer" value="{{$key+1}}" required>
              @if($value->question_type=='Agreement')
              <div class="judul"> <span class="fw-500"></span> {{$value->question}}</div>
                <div class="cards-scroll scrollX flex mt-2 mb-3 iniradio" id="scroll-bar-sm" style="gap:.8rem">
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Sangat Setuju" class="radioBlue2" id="sangat_setuju{{$key}}">
                    <label for="sangat_setuju{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Sangat Setuju</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Setuju" class="radioBlue2" id="setuju{{$key}}">
                    <label for="setuju{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot2.svg')}}" class="mr-2">Setuju</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Netral" class="radioBlue2" id="netral{{$key}}">
                    <label for="netral{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot3.svg')}}" class="mr-2">Netral</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Tidak Setuju" class="radioBlue2" id="tidak_setuju{{$key}}">
                    <label for="tidak_setuju{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">Tidak Setuju</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Sangat Tidak Setuju" class="radioBlue2" id="sangat_tidak_setuju{{$key}}">
                    <label for="sangat_tidak_setuju{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot5.svg')}}" class="mr-2">Sangat Tidak Setuju</span>
                    </label>
                  </div>
                </div>
              @elseif($value->question_type=='Improvement')
              <div class="judul"><span class="fw-500"></span> {{$value->question}}</div>
              
                <div class="cards-scroll scrollX flex mt-2 mb-3 iniradio" id="scroll-bar-sm" style="gap:.8rem">
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Sangat Membantu" class="radioBlue2" id="sangat_membantu{{$key}}">
                    <label for="sangat_membantu{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Sangat Membantu</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Membantu" class="radioBlue2" id="membantu{{$key}}">
                    <label for="membantu{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot2.svg')}}" class="mr-2">Membantu</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Netral" class="radioBlue2" id="netral2{{$key}}">
                    <label for="netral2{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot3.svg')}}" class="mr-2">Netral</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Tidak Membantu" class="radioBlue2" id="tidak_membantu{{$key}}">
                    <label for="tidak_membantu{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">Tidak Membantu</span>
                    </label>
                  </div>
                  <div class="wrapperRadio">
                    <input type="radio" name="{{$key}}" value="Sangat Tidak Membantu" class="radioBlue2" id="sangat_tidak_membantu{{$key}}">
                    <label for="sangat_tidak_membantu{{$key}}" class="optionBlue2 check">
                      <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot5.svg')}}" class="mr-2">Sangat Tidak Membantu</span>
                    </label>
                  </div>
                </div>
              @elseif($value->question_type=='Yes/ No')
              <div class="judul"> <span class="fw-500"></span> {{$value->question}}</div>  
              <div class="cards-scroll scrollX flex mt-2 mb-3 iniradio" id="scroll-bar-sm" style="gap:.8rem">
                <div class="wrapperRadio">
                  <input type="radio" name="{{$key}}" value="Yes" class="radioBlue2" id="yes{{$key}}">
                  <label for="yes{{$key}}" class="optionBlue2 check">
                    <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Yes</span>
                  </label>
                </div>
                <div class="wrapperRadio">
                  <input type="radio" name="{{$key}}" value="No" class="radioBlue2" id="no{{$key}}">
                  <label for="no{{$key}}" class="optionBlue2 check">
                    <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">No</span>
                  </label>
                </div>
              </div>
              @elseif($value->question_type=='Essay')
              <div class="judul">{{$value->question}} </div>
              <input type="text" class="form-control border-input-10 my-2 iniessay" id="" name="{{$key}}" placeholder="Input something" required>
              @endif
            @endforeach
            </div>
            <div class="judul">Kritik & Saran</div>
            <textarea class="form-control borderInput py-2 mt-2 mb-3 iniessay" name="saran" id="" maxlength="250" placeholder="Tulis kritik & Saran Kamu untuk program ini"></textarea>
            <div class="judul">Rating untuk keseluruhan program {{$data_module->sistem}}.</div>
            <input type="range" id="inirating" class="rating-star " step="0.5" style="--value:0" value="0" name="rating" min="0" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="actionRate">
    <div class="innerAction">
  <button type="button" onclick="cekemot()" class="btn-blue-sm w-100 kirimkan">Kirimkan</button>
</form>
<form action="{{route('userfeedback.store.questions')}}" class="w-100" id="frmUserfeedback" method="post" enctype="multipart/form-data">
@csrf
  <input type="hidden" class="form-control" name="users_feedback_id" value="{{$data_module->id}}" required>
  <input type="hidden" name='skip' value='1'>
  <button type="submit"  class="btn-outline-blue-sm w-100">Tanyakan Lagi Nanti</button>
</form>
  </div>
</div>
@endsection
@push("scripts")
<!-- <script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script> -->
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

<!-- <script>
  $('.kirimkan').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Jawaban Disimpan',
      text: 'Terimakasih, dengan mengisi jawaban ini, Kamu telah ikut serta dalam Membangun kualitas sistem yang lebih baik kedepannya.',
      buttons: false,
      timer: 2000
    })
  });
</script> -->

<script>

  const rating = document.getElementById('inirating');
  rating.addEventListener('change', function(){
  })

  const cekemot = ()=> {
    const radio = document.getElementsByClassName('iniradio'); 
    let jawaban = [];
    Array.from(radio).forEach(function(element) {
      let arrayy = []; 
      Array.from(element.getElementsByTagName('input')).forEach(function(b) {
        arrayy.push(b.checked);
      })
        jawaban.push(arrayy.includes(true))
    })

    const essay = document.getElementsByClassName('iniessay'); 
    let jawabanwssay = []; 
    Array.from(essay).forEach(function(andri) {
      jawabanwssay.push(andri.value); 
    })

    if( jawabanwssay.includes('')) {
        Swal.fire({
        icon: 'error',
        title: 'Periksa Kembali',
        text: 'Harap isi form dengan lengkap.'
      })
    }  else if(jawaban.includes(false) || rating.value==0 ) {
          Swal.fire({
          icon: 'error',
          title: 'Periksa Kembali',
          text: 'Harap isi form dengan lengkap.',
        })
      } else {
        document.getElementById('frmUserfeedback').submit();
      }

  }

</script>

@endpush        