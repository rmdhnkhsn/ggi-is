@extends("layouts.app")
@section("title","Gistube Leaderboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid gistube-leaderboard pb-4">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title-24">Dashboard</div>
        </div>
    </div>
    <div class="lead-row">
        <div class="lead-2">
            <div class="cards2 px-4 pt-4 pb-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/coin.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Points</div>
                                <div class="justify-sb">
                                    <div class="desc-count">5000</div>
                                    <div class="desc2">Point</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/gistube.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Videos</div>
                                <div class="justify-sb">
                                    <div class="desc-count">20</div>
                                    <div class="desc2">Video</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/like.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Like</div>
                                <div class="justify-sb">
                                    <div class="desc-count">1235</div>
                                    <div class="desc2">Like</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/lead.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Your Ranking</div>
                                <div class="justify-sb">
                                    <div class="desc-count">2</div>
                                    <div class="desc2">2 of 10</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lead-2">
            <div class="cards2 p-4">
                <div class="cards-scroll pr-1 mb-3 scrollY" id="scroll-bar" style="max-height:706px">
                    <div class="row">
                        <div class="col-12 sticky-top">
                            <div class="title-24 bg-white">Leaderboard</div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="box-shadow"> <!-- 3Besar -->
                                <div class="card-champ">
                                    <span class="three-top">1</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">Rama</div>
                                    <div class="video-point">10 video 15 points</div>
                                    <img src="{{ asset('/images/iconpack/leaderboard/trophy.svg') }}" class="img-trophy">
                                </div>
                            </div>
                            <div class="box-shadow"> <!-- 3Besar -->
                                <div class="card-champ">
                                    <span class="three-top">2</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">Jhon</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow"> <!-- 3Besar -->
                                <div class="card-champ">
                                    <span class="three-top">3</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">4</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">5</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">6</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">7</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">8</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">9</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">10</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">11</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">12</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">13</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                            <div class="box-shadow">
                                <div class="card-champ">
                                    <span class="four-down">14</span>
                                </div>
                                <div class="card-champ2">
                                    <div class="names">James</div>
                                    <div class="video-point">10 video 15 points</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn-blue-sm">See All Videos</a>
            </div>
        </div>
        <div class="lead-2">
            <div class="cards2 p-4">
                <div class="row">
                    <div class="col-12 justify-sb mb-3">
                        <div class="title-vid">
                            <img src="{{ asset('/images/iconpack/leaderboard/vid.svg') }}" class="mb-1">
                            <span class="titl ml-1">Your Videos</span>
                        </div>
                        <a href="#" class="btn-blue">New Video<i class="ml-2 fs-20 fas fa-plus"></i></a>
                    </div>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <img src="{{ asset('/images/tes.jpg') }}" class="img-your-vid">
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">150 Like</span>
                                </div>
                                <div class="views-vid">
                                    13.000x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="col-12 text-center">
                        <a href="#" class="btn-leadMore">Lead More...</a>
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