@extends("layouts.app")
@section("title","Gistube Leaderboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<!-- <link rel="stylesheet" href="{{asset('/common/css/Guide/guide.css')}}"> -->
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
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/lead.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Your Ranking</div>
                                <div class="justify-sb">
                                    <div class="desc-count rank"></div>
                                    <div class="desc2"><span class="rank"></span> of <span class="runner"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/coin.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Points</div>
                                <div class="justify-sb">
                                    <div class="desc-count total_point"></div>
                                    <div class="desc2">Point</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/like.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Like</div>
                                <div class="justify-sb">
                                    <div class="desc-count total_like"></div>
                                    <div class="desc2">Like</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/gistube.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Videos</div>
                                <div class="justify-sb">
                                    <div class="desc-count total_video"></div>
                                    <div class="desc2">Video</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/views.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Views</div>
                                <div class="justify-sb">
                                    <div class="desc-count total_view"></div>
                                    <div class="desc2">View</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box-shadow">
                            <div class="card-lead">
                                <img src="{{ asset('/images/iconpack/leaderboard/share.svg') }}">
                            </div>
                            <div class="card-lead2">
                                <div class="desc1 text-truncate">Total Share</div>
                                <div class="justify-sb">
                                    <div class="desc-count total_share"></div>
                                    <div class="desc2">Share</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lead-2">
            <div class="cards2 p-4">
                <div class="cards-scroll pr-1 mb-3 scrollY" id="scroll-bar" style="max-height:785px">
                    <div class="row">
                        <div class="col-12 sticky-top">
                            <div class="title-24 bg-white">Leaderboard</div>
                        </div>
                        <div class="col-12 mt-2 leaderboard">
                        </div>
                    </div>
                </div>
                <a href="{{ route('guide-home') }}" class="btn-blue-sm">See All Videos</a>
            </div>
        </div>
        <div class="lead-2">
            <div class="cards2 p-4" style="max-height:674px">
                <div class="row">
                    <div class="col-12 justify-sb mb-3">
                        <div class="title-vid">
                            <img src="{{ asset('/images/iconpack/leaderboard/vid.svg') }}" class="mb-1">
                            <span class="titl ml-1">Your Videos</span>
                        </div>
                        <a href="{{ route('guide-upload') }}" class="btn-blue">New Video<i class="ml-2 fs-20 fas fa-plus"></i></a>
                    </div>
                    @foreach ($dataVideo as $key  =>$value)
                    <a href="{{ route('guide-playlist',$value['id']) }}" class="col-md-4">
                        <div class="card-vid" style="height:165px">
                            <div class="hover-play relative">
                                <img src="{{ url("/".$value['thumb_path']) }}" class="img-your-vid">
                                <div class="hover-btn">
                                    <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                                </div>
                            </div>
                            <div class="desc-your-vid">
                                <div class="like-vid">
                                    <img src="{{ asset('/images/iconpack/leaderboard/love.svg') }}">
                                    <span class="ml-1">{{ $value["like"] }} Like</span>
                                </div>
                                <div class="views-vid">
                                    {{ $value["view"] }}x Views
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script href="{{asset('/common/js/jquery.min.js')}}"></script>
<script>
    showDashboardAchievement()
    function showDashboardAchievement(){
        $.ajax({
            url: '{{ route("gistube.show-dashboard-achievement") }}',           
            type: "get",
            dataType: 'json',            
            success: function (data) {
                $('.total_point').html(data.total_point)
                $('.total_like').html(data.total_like)
                $('.total_video').html(data.total_video)
                $('.total_share').html(data.total_share)
                $('.total_view').html(data.total_view)
                $('.rank').html(data.rank)
                $('.runner').html(data.runner)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    showLeaderboard()
    function showLeaderboard(){
        $.ajax({
            url: '{{ route("gistube.show-leaderboard") }}',           
            type: "get",
            dataType: 'json',            
            success: function (data) {
                html = ``
                for (let i = 0; i < data.length; i++) {
                    var rank = i+1
                    var trophy = ``
                    if (rank == 1) {
                        var trophy = `<img src="{{ asset('/images/iconpack/leaderboard/trophy.svg') }}" class="img-trophy">`
                    }
                    html += 
                        `<div class="box-shadow">
                            <div class="card-champ">
                                <span class="three-top">`+rank+`</span>
                            </div>
                            <div class="card-champ2">
                                <div class="names">`+data[i].main_name+`</div>
                                <div class="video-point">`+data[i].total_video+` video `+data[i].total_point+` points `+data[i].total_like+` likes</div>
                                `+trophy+`
                            </div>
                        </div>`
                }
                $('.leaderboard').html(html)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
</script>



@endpush        