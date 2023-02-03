@extends("layouts.app")
@section("title","Rating Program")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.RatingProgram.partials.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid RatingProgram pb-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="containers h-165" style="padding:1.6rem 2rem">
          <div class="judul">Overall Rating</div>
          <div class="containerRating">
            <img src="{{url('images/iconpack/feedback/rating1.svg')}}" class="rating1">
            <div class="rightSide">
              <input type="range" class="rating-star2" step="0.5" style="--value:{{$rating}}" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" disabled>
              <div class="number">{{$rating}}/5</div>
              <div class="sub-text mt-2">Average Rating</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="containers h-165" style="padding:1.6rem 2rem">
          <div class="judul">Overall Rating</div>
          <div class="containerRating">
            <img src="{{url('images/iconpack/feedback/rating2.svg')}}">
            <div class="rightSide">
              <div class="number">{{$sum_question}}</div>
              <div class="sub-text">Total Response</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers h-165">
          <div class="judul">Summary Survey</div>
            <div class="progress2 mt-3">
              @foreach($summary as $key4=>$value4)
              @if($value4['jawaban']=='Sangat Membantu')
              <div class="progressBar backgroundOne" role="progressbar" style="width: {{$value4['jumlah']}}%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">{{$value4['jumlah']}}%</div>
              </div> 
              @elseif($value4['jawaban']=='Membantu')
              <div class="progressBar backgroundTwo" role="progressbar" style="width: {{$value4['jumlah']}}%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">{{$value4['jumlah']}}%</div>
              </div>
              @elseif($value4['jawaban']=='Netral')
              <div class="progressBar backgroundThree" role="progressbar" style="width: {{$value4['jumlah']}}%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">{{$value4['jumlah']}}%</div>
              </div>
              @elseif($value4['jawaban']=='Tidak Membantu')
              <div class="progressBar backgroundFour" role="progressbar" style="width: {{$value4['jumlah']}}%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">{{$value4['jumlah']}}%</div>
              </div>
              @elseif($value4['jawaban']=='Sangat Tidak Membantu')
              <div class="progressBar backgroundFive" role="progressbar" style="width: {{$value4['jumlah']}}%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">{{$value4['jumlah']}}%</div>
              </div>
              @endif
            @endforeach
            </div>
            <div class="progressBarLegend">
              <div class="legend">
                <div class="shape"></div><div class="text">Sangat Membantu</div>
              </div>
              <div class="legend">
                <div class="shape2"></div><div class="text">Membantu</div>
              </div>
              <div class="legend">
                <div class="shape3"></div><div class="text">Netral</div>
              </div>
              <div class="legend">
                <div class="shape4"></div><div class="text">Tidak Membantu</div>
              </div>
              <div class="legend">
                <div class="shape5"></div><div class="text">Sangat Tidak Membantu</div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers">
          <div class="title-20-grey">User Feedback {{$title}}</div>
          <div class="borderlight my-2"></div>
          <div class="cards-scroll scrollY pr-2" id="scroll-bar-sm" style="max-height:340px">
          @foreach($answer as $key => $value)
              <div class="UserFeedback">
                <a href="" data-toggle="modal" data-target="#myModal{{$value['id']}}" class="tdModal">
                  <div class="justify-start">
                    <div class="title-14-dark2">{{$value['nama']}}</div>
                    <div class="title-14-dark mx-1">-</div>
                    <div class="title-14-dark">{{$value['sistem']}}</div>
                    <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:{{$value['rating']}}" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" disabled>
                  </div>
                  <div class="title-14-dark truncate">{{$value['saran']}}</div>
                </a>
              </div> 

              <div class="modal fade  " id="myModal{{$value['id']}}">
                <div class="modal-dialog d-flex justify-content-center" role="document">
                    <div class=" modal-content p-4" style="border-radius:10px; width : 1100px !important">
                        <div class="row">
                            <div class="col-12 justify-sb">
                                <div class="title-22">Detail Answer from {{$value['nama']}}</div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                            <div class="col-12">
                              <div class="borderRate mb-4"> 
                                @foreach($value['question'] as $key2 => $value2)
                                  @if($value2['question_type']=='Agreement')
                                  <div class="judul">{{$value2['question']}}</div>
                                    <div class="cards-scroll scrollX flex mt-2 mb-3" id="scroll-bar-sm" style="gap:.8rem">
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Sangat Setuju" class="radioBlue2" id="sangat_setuju" {{ $value2 ? ($value2['answer'] == 'Sangat Setuju' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="sangat_setuju" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Sangat Setuju</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Setuju" class="radioBlue2" id="setuju" {{ $value2 ? ($value2['answer'] == 'Setuju' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="setuju" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot2.svg')}}" class="mr-2">Setuju</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Netral" class="radioBlue2" id="netral"{{ $value2 ? ($value2['answer'] == 'Netral' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="netral" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot3.svg')}}" class="mr-2">Netral</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Tidak Setuju" class="radioBlue2" id="tidak_setuju" {{ $value2 ? ($value2['answer'] == 'Tidak Setuju' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="tidak_setuju" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">Tidak Setuju</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Sangat Tidak Setuju" class="radioBlue2" id="sangat_tidak_setuju" {{ $value2 ? ($value2['answer'] == 'Sangat Tidak Setuju' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="sangat_tidak_setuju" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot5.svg')}}" class="mr-2">Sangat Tidak Setuju</span>
                                        </label>
                                      </div>
                                    </div>
                                  @elseif($value2['question_type']=='Improvement')
                                  <div class="judul"> {{$value2['question']}}</div>
                                  
                                    <div class="cards-scroll scrollX flex mt-2 mb-3" id="scroll-bar-sm" style="gap:.8rem">
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Sangat Membantu" class="radioBlue2" id="sangat_membantu" {{ $value2 ? ($value2['answer'] == 'Sangat Membantu' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="sangat_membantu" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Sangat Membantu</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Membantu" class="radioBlue2" id="membantu" {{ $value2 ? ($value2['answer'] == 'Membantu' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="membantu" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot2.svg')}}" class="mr-2">Membantu</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Netral" class="radioBlue2" id="netral2" {{ $value2 ? ($value2['answer'] == 'Netral' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="netral2" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot3.svg')}}" class="mr-2">Netral</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Tidak Membantu" class="radioBlue2" id="tidak_membantu" {{ $value2 ? ($value2['answer'] == 'Tidak Membantu' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="tidak_membantu" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">Tidak Membantu</span>
                                        </label>
                                      </div>
                                      <div class="wrapperRadio">
                                        <input type="radio" name="{{$value['id']}}{{$key2}}" value="Sangat Tidak Membantu" class="radioBlue2" id="sangat_tidak_membantu" {{ $value2 ? ($value2['answer'] == 'Sangat Tidak Membantu' ? 'checked' : 'disabled') : 'disabled' }}>
                                        <label for="sangat_tidak_membantu" class="optionBlue2 check">
                                          <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot5.svg')}}" class="mr-2">Sangat Tidak Membantu</span>
                                        </label>
                                      </div>
                                    </div>
                                  @elseif($value2['question_type']=='Yes/ No')
                                  <div class="judul">{{$value2['question']}}</div>  
                                  <div class="cards-scroll scrollX flex mt-2 mb-3" id="scroll-bar-sm" style="gap:.8rem">
                                    <div class="wrapperRadio">
                                      <input type="radio" name="{{$value['id']}}{{$key2}}" value="Yes" class="radioBlue2" id="yes" {{ $value2 ? ($value2['answer'] == 'Yes' ? 'checked' : 'disabled') : 'disabled' }}>
                                      <label for="yes" class="optionBlue2 check">
                                        <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot1.svg')}}" class="mr-2">Yes</span>
                                      </label>
                                    </div>
                                    <div class="wrapperRadio">
                                      <input type="radio" name="{{$value['id']}}{{$key2}}" value="No" class="radioBlue2" id="no" {{ $value2 ? ($value2['answer'] == 'No' ? 'checked' : 'disabled') : 'disabled' }}>
                                      <label for="no" class="optionBlue2 check">
                                        <span class="descBlue2"><img src="{{url('images/iconpack/feedback/emot4.svg')}}" class="mr-2">No</span>
                                      </label>
                                    </div>
                                  </div>
                                  @elseif($value2['question_type']=='Essay')
                                  <div class="judul">{{$value2['question']}} </div>
                                  <p style="font-size : .9rem; color : #68717A">{{$value2['answer']}}<p>
                                  @endif
                                @endforeach
                              </div>
                              <div class="judul mb-1">Kritik & Saran</div>
                              <p style="font-size : .9rem; color : #68717A">{{$value['saran']}}<p>
                              <div class="judul ">Rating untuk keseluruhan program Ticketing Ini.</div>
                              <div class="d-flex align-items-end">
                                <input type="range" class="rating-star" step="0.5" style="--value:{{$value['rating']}}" value="0" name="rating" min="1" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" disabled>
                                <span class="mr-3 py-1 px-2 d-inline-block" style="font-size : 1rem; color : #f9b935;">{{$value['rating']}}/5</span>
                              </div>
                            </div>
                      </div>
                    </div>
                </div>
              </div>
              
          @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers-0">
          <div class="title-20-grey">All Module Rating</div>
          <div class="borderlight my-2"></div>
          <div class="row">
            @foreach($module as $key3=>$value3)
              <div class="moduleRating">
                <a href="{{route('rating.index.permodule',$value3['id'])}}">
                  <div class="mx-2">
                    <div class="title-14-dark2 text-truncate">{{$value3['sistem']}}</div>
                    <div class="justify-sb mt-1">
                      <input type="range" class="rating-star2" step="0.5" style="--value:{{$value3['rating']}}" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" disabled>
                      <div class="title-12-grey">{{$value3['rating']}}/5</div>
                    </div>
                    <div class="title-12-grey mt-1">{{$value3['responden']}} Response</div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")



@endpush        