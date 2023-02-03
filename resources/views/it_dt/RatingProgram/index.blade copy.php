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
              <input type="range" class="rating-star2" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
              <div class="number">4.5/5</div>
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
              <div class="number">500</div>
              <div class="sub-text">Total Response</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers h-165">
          <div class="judul">Summary Survey</div>
            <div class="progress2 mt-3">
              <div class="progressBar backgroundOne" role="progressbar" style="width: 70%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">70%</div>
              </div> 
              <div class="progressBar backgroundTwo" role="progressbar" style="width: 4%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">4%</div>
              </div>
              <div class="progressBar backgroundThree" role="progressbar" style="width: 14%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">14%</div>
              </div>
              <div class="progressBar backgroundFour" role="progressbar" style="width: 6%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">6%</div>
              </div>
              <div class="progressBar backgroundFive" role="progressbar" style="width: 6%" aria-valuemin="0" aria-valuemax="100">
                <div class="percent">6%</div>
              </div>
            </div>
            <div class="progressBarLegend">
              <div class="legend">
                <div class="shape"></div><div class="text">Sangat Baik</div>
              </div>
              <div class="legend">
                <div class="shape2"></div><div class="text">Baik</div>
              </div>
              <div class="legend">
                <div class="shape3"></div><div class="text">Netral</div>
              </div>
              <div class="legend">
                <div class="shape4"></div><div class="text">Buruk</div>
              </div>
              <div class="legend">
                <div class="shape5"></div><div class="text">Sangat Buruk</div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers">
          <div class="title-20-grey">User Feedback</div>
          <div class="borderlight my-2"></div>
          <div class="cards-scroll scrollY pr-2" id="scroll-bar-sm" style="max-height:340px">
          @foreach($userfeedback as $key => $value)
            <?php
            $user = collect($value)->groupby('users_feedback_id');
            dd($user);
            ?>
            @foreach($user as $key2 => $value2)
              <?php
              $rating = collect($value2)->where('nik', $key2)->first();
              ?>
              <div class="UserFeedback">
                <!-- {{$value->sistem}} -->
                <a href="">
                  <div class="justify-start">
                    <div class="title-14-dark2">{{$rating->nama}}</div>
                    <div class="title-14-dark mx-1">-</div>
                    <div class="title-14-dark">{{$value->sistem}}</div>
                    <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:{{$rating->rating}}" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                  </div>
                  <div class="title-14-dark truncate">{{$rating->saran}}</div>
                </a>
              </div> 
              <table>
                @foreach($value2 as $key3 => $value3)
                <?php 
                $soal = collect($value->question)->where('id',$value3->users_feedback_question_id)->first();
                ?>
                <tr>
                  <td>{{$soal->question}}</td>
                  <td>{{$value3->answer}}</td>
                </tr>
                @endforeach
              </table>
            @endforeach
          @endforeach
            <!-- <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Kathryn Murphy</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Programnya bagus, cuman perlu ada fitur tambahan search data. </div>
              </a>
            </div>
            <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Marc Zeus</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:3" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Selalu error saat filter data berdasarkan tanggal, harap di perbaiki. </div>
              </a>
            </div>
            <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Bambang</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:2.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Programnya sulit digunakan, saya tidak mengerti cara kerja program ini.</div>
              </a>
            </div>
            <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Hendra Sugandi</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque inventore at mollitia ipsa cumque architecto reprehenderit harum dicta autem perferendis sed, a iusto magnam dolores omnis adipisci earum commodi repellendus saepe placeat! Totam molestias modi tenetur asperiores repellat dolores.</div>
              </a>
            </div>
            <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Hendra Sugandi</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque inventore at mollitia ipsa cumque architecto reprehenderit harum dicta autem perferendis sed, a iusto magnam dolores omnis adipisci earum commodi repellendus saepe placeat! Totam molestias modi tenetur asperiores repellat dolores.</div>
              </a>
            </div>
            <div class="UserFeedback">
              <a href="">
                <div class="justify-start">
                  <div class="title-14-dark2">Hendra Sugandi</div>
                  <div class="title-14-dark mx-1">-</div>
                  <div class="title-14-dark">IT Ticketing</div>
                  <input type="range" class="rating-star2 marginRate" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                </div>
                <div class="title-14-dark truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque inventore at mollitia ipsa cumque architecto reprehenderit harum dicta autem perferendis sed, a iusto magnam dolores omnis adipisci earum commodi repellendus saepe placeat! Totam molestias modi tenetur asperiores repellat dolores.</div>
              </a>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="containers-0">
          <div class="title-20-grey">All Module Rating</div>
          <div class="borderlight my-2"></div>
          <div class="row">
            @foreach($module as $key4=>$value4)
              <div class="moduleRating">
                <a href="">
                  <div class="mx-2">
                    <div class="title-14-dark2 text-truncate">{{$value4['sistem']}}</div>
                    <div class="justify-sb mt-1">
                      <input type="range" class="rating-star2" step="0.5" style="--value:{{$value4['rating']}}" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                      <div class="title-12-grey">{{$value4['rating']}}/5</div>
                    </div>
                    <div class="title-12-grey mt-1">{{$value4['responden']}} Response</div>
                  </div>
                </a>
              </div>
            @endforeach

            <!-- <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Safety Complience </div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4/5</div>
                  </div>
                  <div class="title-12-grey mt-1">46 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Form Monitoring COVID</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">56 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Ticketing</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4.5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">60 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Safety Complience </div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4/5</div>
                  </div>
                  <div class="title-12-grey mt-1">46 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Form Monitoring COVID</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">56 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Ticketing</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4.5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">60 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Safety Complience </div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4/5</div>
                  </div>
                  <div class="title-12-grey mt-1">46 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Form Monitoring COVID</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">56 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Ticketing</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:4.5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">4.5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">60 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Safety Complience </div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:2" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">2/5</div>
                  </div>
                  <div class="title-12-grey mt-1">46 Response</div>
                </div>
              </a>
            </div>
            <div class="moduleRating">
              <a href="">
                <div class="mx-2">
                  <div class="title-14-dark2 text-truncate">Form Monitoring COVID</div>
                  <div class="justify-sb mt-1">
                    <input type="range" class="rating-star2" step="0.5" style="--value:5" value="" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)">
                    <div class="title-12-grey">5/5</div>
                  </div>
                  <div class="title-12-grey mt-1">56 Response</div>
                </div>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")



@endpush        