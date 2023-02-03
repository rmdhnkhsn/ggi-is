@include('Guide.layouts.header')
@include('Guide.layouts.navbar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css">
<link rel="stylesheet" href="{{asset('/common/css/Guide/playlist-plugin.css')}}">

  <div class="content-wrapper">
    <div class="content-header">
    </div>
    <section class="content margin-guide px-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mb-mins">
            <div class="row">
              <div class="col-12 justify-sb">
                <a href="{{ route('guide-home') }}" class="gd-back-home2">
                  <div class="icon-back"><i class="fas fa-arrow-left"></i></div>
                  <div class="desc-back">Back to home</div>
                </a>
                <div class="container-form-playlist">
                  <form method="get" action="" class="form">
                    <input type="text" class="search-playlist" placeholder="Search..." required>
                    <button type="submit" class="btn-guide-submit"><i class="icon-search2 fas fa-search"></i></button>
                  </form>
                </div>
              </div>
                <div class="col-12 mt-2">
                  <div class="video mb-min video-path">
                    {{-- <video width="100%" height="460" controls preload="none">
                      <source src="{{asset('/videos/naruto.mp4')}}" type="video/mp4">
                    </video>  --}}
                      
                  </div>
                </div>
                <div class="col-12">
                  <div class="card-desc minH-400 p-4">
                    <div class="row">
                      <div class="col-12">
                        <span class="title-22-grey title-current-video"></span>
                      </div>
                      <div class="col-12 mt-2">
                        <span class="gd-desc">Description</span>
                      </div>
                      <div class="col-12 mt-2">
                        <div class="gd-sub-desc desc-current-video">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          <div class="col-lg-4 margin-guide-mins">
            <div class="card-side pt-5 h-full">
              <div class="row py-2 px-3">
                <div class="col-12 mb-2">
                  <span class="playlist-step1">Playlist </span><span class="playlist-step2">- Step by Step</span>
                </div>
                <div class="col-12 mb-3">
                  <div class="card-scroll mh-232 scrollY playlist-video" id="scroll-bar">

                  </div>
                </div>
                <div class="col-12 mb-2">
                  <span class="playlist-step2">More Tutorials</span>
                </div>
                <div class="col-12 mb-3">
                  <div class="card-scroll pr-1 mh-570 scrollY more-video" id="scroll-bar">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js"></script>
  <script src="{{asset('common/js/skip-back.js')}}"></script>
  <script src="{{asset('common/js/jump-forward.js')}}"></script>
  <script src="{{asset('common/js/speed.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

  <script>
    var id_video = "{{ collect(request()->segments())->last() }}"
    $.ajax({
      data: {
        id_video:id_video
      },
      url: '{{ route("show-playlist-video") }}',           
      type: "get",
      dataType: 'json',            
      success: function (data) {
        html = ``
        for (let i = 0; i < data.playlist_video.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.playlist_video[i].id+`" class="flex mb-3">
              <div class="gd-image-step">
                <img src="{{ asset('`+data.playlist_video[i].thumb_path+`') }}" class="images-thumbnail">
              </div>
              <div class="gd-playlist-step pl-3">
                <div class="title-steps truncate">
                  `+data.playlist_video[i].title+`
                </div>
                <div class="desc-steps truncate3 mt-1">
                  `+data.playlist_video[i].desc+`
                </div>
              </div>
            </a>`
        }
        $('.playlist-video').html(html)

        more_video = ``
        for (let i = 0; i < data.more_video.length; i++) {
          more_video += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.more_video[i].id+`" class="flex mb-3">
              <div class="gd-image-step">
                <img src="{{ asset('`+data.more_video[i].thumb_path+`') }}" class="images-thumbnail">
              </div>
              <div class="gd-playlist-step pl-3">
                <div class="title-steps truncate">
                  `+data.more_video[i].title+`
                </div>
                <div class="desc-steps truncate3 mt-1">
                  `+data.more_video[i].desc+`
                </div>
              </div>
            </a>`
        }
        $('.more-video').html(more_video)

        $('.title-current-video').html(data.current_video.title)
        $('.desc-current-video').html(data.current_video.desc)

        var video_path = 
          `<iframe width="100%" height="480" src="{{ url("`+data.current_video.video_path+`") }}"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          </iframe>`

        $('.video-path').html(video_path)
      },
      error: function (xhr, status, error) {
          alert(xhr.responseText);
          location.replace("{{ url('/guide/guide-home') }}")        
      }
    });
  </script>

  <script>
    var mediaElements = document.querySelectorAll('video, audio');
    for (var i = 0, total = mediaElements.length; i < total; i++) {

      var features = ['playpause', 'current', 'progress', 'duration', 'volume', 'skipback', 'jumpforward', 'speed', 'fullscreen'];

      new MediaElementPlayer(mediaElements[i], {
          autoRewind: false,
          features: features,
      });
    }
  </script>


@include('Guide.layouts.footer')