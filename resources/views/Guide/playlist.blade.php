@include('Guide.layouts.header')
@include('Guide.layouts.navbar')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/Guide/playlist-plugin.css')}}">
<link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
    
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
                  <input type="text" class="search-playlist search" placeholder="Search..." required>
                  <button type="button" class="button-search"><i class="icon-search2 fas fa-search"></i></button>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="video mb-min video-path"></div>
              </div>
              <div class="col-12">
                <div class="card-desc relative minH-400 p-4">
                  <div class="row">
                    <div class="col-12">
                      <div id="love-content">
                        <div class="love-container justify-center">
                          <input type="checkbox" id="checkbox" class="store-like " />
                          <label for="checkbox">
                            <svg id="heart-svg" viewBox="467 392 58 57">
                              <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                                <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAA"/>
                                
                                <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>
                                <g id="grp7" opacity="0" transform="translate(7 6)">
                                  <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
                                  <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
                                </g>
  
                                <g id="grp6" opacity="0" transform="translate(0 28)">
                                  <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
                                  <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
                                </g>
  
                                <g id="grp3" opacity="0" transform="translate(52 28)">
                                  <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
                                  <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
                                </g>
  
                                <g id="grp2" opacity="0" transform="translate(44 6)">
                                  <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
                                  <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
                                </g>
  
                                <g id="grp5" opacity="0" transform="translate(14 50)">
                                  <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
                                  <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
                                </g>
  
                                <g id="grp4" opacity="0" transform="translate(35 50)">
                                  <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
                                  <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
                                </g>
  
                                <g id="grp1" opacity="0" transform="translate(24)">
                                  <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
                                  <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
                                </g>
                              </g>
                            </svg>
                            
                          </label>
                        </div>
                        
                        <div class="like-count likes"><span class="like_value"></span> likes</div>
                        <div class="views-count"><span class="view_value"></span>x Views</div>
                        {{-- <div class="coins">
                          <i class="icon-coin fas fa-coins"></i>
                          <span class="point_value"></span> 
                        </div> --}}
                        {{-- <div class="points-count poin ml-5">
                          <span class="point_value poin"></span> Points Pada video ini</div> --}}
                        <a href="#" data-toggle="modal" data-target="#share" class="ml-auto justify-center">
                          <img src="{{ asset('/images/iconpack/share.svg') }}">
                          <span class="share-desc">Share</span>
                        </a>
                        @include('Guide.partials.share')
                      </div>
                    </div>
                    <div class="col-12 mt-3">
                      <span class="title-22-grey title-current-video"></span>
                    </div>
                    <div class="col-12 mt-2">
                      <span class="gd-desc">Description</span>
                      <div class="border-desc"></div>
                    </div>
                    <div class="col-12 mt-2">
                      <div class="gd-sub-desc desc-current-video">
                      </div>
                      <div class="border-current-video"></div>
                    </div>
                    <div class="col-12 mt-4">
                      <div class="list-comment">

                      </div>
                    </div>
                  </div>


                  <!-- <div id="accordion" class="list-comment">
                    
                  </div> -->
                  <form id="formStoreComment">
                    <div class="inputComment">
                      <input type="text" class="formComment" name="description" placeholder="Write your comments.."></input>
                      <button type="submit" class="iconSubmit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                  </form>
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
  <div class="modal fade" id="modalStoreReply"  tabindex="-1" role="dialog" aria-labelledby="modelHeading" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:500px">
      <form id="formStoreReply" class="form-horizontal">    
        <div class="modal-content" style="border-radius:10px">
          <div class="row p-3">
            <div class="col-12">
              <span class="title-16">Input Reply Comment</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="border-bottom-grey"></div>
            </div>
            <div class="col-12">
              <div class="cards-0 px-2 py-4 my-3">
                <input type="hidden" name="id_parent" class="id_parent">
                <textarea class="form-control border-input mb-3" name="description" style="height: 120px" required></textarea>
                <button type="submit" class="btn-blue btn-block">Reply<i class="ml-2 fas fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  


  <script src="{{asset('common/js/skip-back.js')}}"></script>
  <script src="{{asset('common/js/jump-forward.js')}}"></script>
  <script src="{{asset('common/js/speed.js')}}"></script>
  <script src="{{asset('common/js/jquery.min.js')}}"></script>
  <script src="{{asset('common/js//moment.min.js')}}"></script>
  <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
  <script src="videojs-hlsjs-plugin.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  <script>
    var reference_nik = "{{ request()->query('reference_nik') }}"
    var id_video = "{{ collect(request()->segments())->last() }}"
    $.ajax({
      data: {
        id_video:id_video,
        reference_nik:reference_nik
      },
      url: '{{ route("show-playlist-video") }}',           
      type: "get",
      dataType: 'json',            
      success: function (data) {
        html = ``
        for (let i = 0; i < data.playlist_video.length; i++) {
          if (data.playlist_video[i].is_current_playlist == 1) {
            var color = '#EEEEEE'
          }else{
            var color = ''
          }

          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.playlist_video[i].id+`" class="flex py-2 store-view" data-id_video="`+data.playlist_video[i].id+`" style="background-color: `+color+`">
              <video onloadedmetadata="showDuration('vid_`+data.playlist_video[i].id+`')" id="vid_`+data.playlist_video[i].id+`" controls hidden>
                <source src="{{ url("`+data.playlist_video[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.playlist_video[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="gd-image-step about my-auto">
                <img src="{{ asset('`+data.playlist_video[i].thumb_path+`') }}" class="images-thumbnail">
              </div>
              <div class="gd-playlist-step pl-3">
                <div class="title-steps truncate">
                  `+data.playlist_video[i].title+`
                </div>
                <div class="desc-steps truncate3 mt-1">
                  `+data.playlist_video[i].desc+`
                </div>
                <br>
                <div class="minute-count"><span class="duration_vid_`+data.playlist_video[i].id+`"></span> Minute</div>
              </div>
            </a>`
        }
        $('.playlist-video').html(html)

        more_video = ``
        for (let i = 0; i < data.more_video.length; i++) {
          more_video += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.more_video[i].id+`" class="flex py-2 store-view" data-id_video="`+data.more_video[i].id+`">
              <video onloadedmetadata="showDurationMore('vid_`+data.more_video[i].id+`')" id="vid_`+data.more_video[i].id+`" controls hidden>
                <source src="{{ url("`+data.more_video[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.more_video[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
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
                <br>
                <div class="minute-count"><span class="duration_more_vid_`+data.more_video[i].id+`"></span> Minute</div>
              </div>
            </a>`
        }
        $('.more-video').html(more_video)

        $('.title-current-video').html(data.current_video.title)
        $('.desc-current-video').html(data.current_video.desc)

        var video_path = 
          // `<iframe width="100%" height="480" src="{{ url("`+data.current_video.video_path+`") }}"
          //   allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          // </iframe>`
          `<video width="100%" controls>
            <source src="{{ url("`+data.current_video.video_path+`") }}" type="video/mp4">
          </video>`

        $('.video-path').html(video_path)
      },
      error: function (xhr, status, error) {
          alert(xhr.responseText);
          location.replace("{{ url('/guide/guide-home') }}")        
      }
    });

    function showDuration(id_video){
      var video_duration = document.getElementById(id_video).duration
      var video_duration = (video_duration/60).toFixed(0)
      $('.duration_'+id_video).html(video_duration)
    }

    function showDurationMore(id_video){
      var video_duration = document.getElementById(id_video).duration
      var video_duration = (video_duration/60).toFixed(0)
      $('.duration_more_'+id_video).html(video_duration)
    }

  </script>

  <script>
    $('body').on('click', '.button-search', function () {  
      var title = $('.search').val()
      console.log(title)
      location.replace("{{ url('guide/guide-home?search=') }}"+title)
    })
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

  <script>
    jQuery(document).ready(function($) {

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      }); 
      
      var i = 0
      $('body').on('click', '.store-like', function () { 
        console.log(i)
        if (i > 0) {
          storeLike() 
        }
        i++
        console.log(i)
      })
      
      function storeLike() {
        $.ajax({
          data:{
            id_video: id_video,
          },
          url: '{{ route("store-like") }}',           
          type: "post",
          dataType: 'json',            
          success: function (data) {
            showLog()
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
        });
      }

      showLog()
      function showLog() {
        $.ajax({
          data:{
            id_video: id_video,
          },
          url: '{{ route("show-log") }}',           
          type: "get",
          dataType: 'json',            
          success: function (data) {

            if (data.is_liked == 1 && i == 0) {
              $('.store-like').trigger('click');
            }
            i++

            $('.like_value').html(data.like)
            $('.view_value').html(data.view)
            $('.point_value').html(data.point)
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
        });
      }

      $('body').on('click', '.store-view', function () {  
        var id_video = $(this).data("id_video")

        $.ajax({
          data: {
            id_video:id_video,
          },
          url: '{{ route("store-view") }}',           
          type: "post",
          dataType: 'json',            
          success: function (data) {
            console.log('success')
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
        })
        
      })

      showComment()
      function showComment(){
        $.ajax({
          data: {
            id_video:id_video,
          },
          url: '{{ route("show-comment") }}',           
          type: "get",
          dataType: 'json',            
          success: function (data) {
            html = ``
            for (let i = 0; i < data.length; i++) {
              var reply = ``
              for (let j = 0; j < data[i].reply.length; j++) {
                reply += 
                  `<li><b>`+data[i].reply[j].created_by+`</b><br> `+data[i].reply[j].description+`</li>`
              }

              var difference = data[i].difference.split(':')
              var hour = difference[0]
              var minute = difference[1]

              if (hour > 24) {
                var difference = (hour/24).toFixed(0)+" hari yang lalu"
              }else if(minute > 60){
                var difference = (minute/60).toFixed(0)+" jam yang lalu"
              }else{
                var difference = minute+" menit yang lalu"
              }

              var id = 'btnControl'+data[i].id
              html += 
                 `<span class="LCname showDurationMinute">`+data[i].created_by+`</span> <span class="LCduration">
                  `+difference+`
                  </span>
                  <div class="LCcommentDesc">
                    `+data[i].description+`
                  </div>

                  <div class="accordion__item" id="accordion">
                    <div class="my-1" id="HeadingOne">
                      <a href="javascript:void(0)" class="replyComment store-reply" data-id_parent="`+data[i].id_comment+`">REPLY</a>
                      <input type="checkbox" id="btnControl`+[i]+`" style="display:none"/>
                      <label for="btnControl`+[i]+`" data-toggle="collapse" data-target="#`+data[i].id_comment+`" aria-expanded="true" aria-controls="`+data[i].id_comment+`">
                        <i class="fas fa-angle-right accordion__icon"></i>
                        <span class="accordion__title">See All Replies...</span>
                      </label>
                    </div>

                    <div id="`+data[i].id_comment+`" class="collapse" aria-labelledby="HeadingOne" data-parent="#accordion">
                      <div class="contentComment ml-3 mb-3">
                        <div class="LCcommentDesc">
                          `+reply+`
                        </div>
                      </div>
                    </div>
                  </div>`
            }

            $('.list-comment').html(html)
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
        })
      }

      $("#formStoreComment").validate({        
        submitHandler: function(form) {
          $.ajax({
            data: $('#formStoreComment').serialize()+'&id_video='+id_video,
            url: '{{ route("store-comment") }}',           
            type: "post",
            dataType: 'json',            
            success: function (data) {
              showComment()
              showLog()
              $('#formStoreComment').trigger("reset");
            },
            error: function (xhr, status, error) {
              alert(xhr.responseText);
            }
          });
        }        
      });

      $('body').on('click', '.store-reply', function () {  
        var id_parent = $(this).data("id_parent")
        $('.id_parent').val(id_parent)
        jQuery('#modalStoreReply').modal('show');   
      })

      $("#formStoreReply").validate({        
        submitHandler: function(form) {
          $.ajax({
            data: $('#formStoreReply').serialize()+'&id_video='+id_video,
            url: '{{ route("store-reply") }}',           
            type: "post",
            dataType: 'json',            
            success: function (data) {
              showComment()
              jQuery('#modalStoreReply').modal('hide');   
              $('#formStoreReply').trigger("reset");
            },
            error: function (xhr, status, error) {
              alert(xhr.responseText);
            }
          });
        }        
      });

      console.log("{{ auth()->user()->nik }}")

    })

    function showDurationMinute(id_comment){
      var times = document.getElementById(id_comment).minute
      var times = (times/60).toFixed(0)
      $('.minute_'+id_comment).html(times)
    }

  </script>

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion__title')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

@include('Guide.layouts.footer')