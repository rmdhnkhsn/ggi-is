@include('Guide.layouts.header')
@include('Guide.layouts.navbar')

<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-12 justify-center">
            <div class="title-36">Want To Know About What</div>
          </div>
          <div class="col-12 justify-center mt-1">
            <div class="title-18-400"> 
              Cari video tutorial seputar <span class="text-biru">JDE, GCC, Dll disini</span>
            </div>
          </div>
          <div class="col-12">
            <div class="input-group justify-center py-2">
              <div class="input-group-prepend">
                <div class="container-form">
                  <form method="get" action="">
                    <input type="text" class="search-guide search" placeholder="Search..." required>
                    <button type="button" class="btn-guide-submit button-search"><i class="icon-search fas fa-search"></i></button>
                  </form>
                </div>
              </div>
              <a href="{{ route('guide-upload') }}" class="btn-upload"><i class="mb-1 fas fa-upload"></i></a>
            </div>

            
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12 px-5">
            <ul class="nav nav-tabs hr-md-tabs mb-4" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link active" data-toggle="tab" href="#All_Videos" role="tab"></i>All Videos</a>
                    <div class="hr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#JDE" role="tab"></i>JDE</a>
                    <div class="hr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#GCC" role="tab"></i>GCC</a>
                    <div class="hr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#IT" role="tab"></i>IT & DT</a>
                    <div class="hr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#QC" role="tab"></i>QC</a>
                    <div class="hr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#MKT" role="tab"></i>MARKETING</a>
                    <div class="hr-slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block">
                <div class="tab-pane active" id="All_Videos" role="tabpanel">
                  @include('Guide.partials.all-videos')
                </div>
                <div class="tab-pane" id="JDE" role="tabpanel">
                  @include('Guide.partials.jde')
                </div>
                <div class="tab-pane" id="GCC" role="tabpanel">
                  @include('Guide.partials.gcc')
                </div>
                <div class="tab-pane" id="IT" role="tabpanel">
                  @include('Guide.partials.it')
                </div>
                <div class="tab-pane" id="QC" role="tabpanel">
                  @include('Guide.partials.qc')
                </div>
                <div class="tab-pane" id="MKT" role="tabpanel">
                  @include('Guide.partials.mkt')
                </div>
            </div>
          </div>
          <!-- <div class="col-12 justify-center my-4">
            <a href="#" class="btn-seeMore">See More Videos...</a>
          </div> -->
        </div>
      </div>
    </section>
  </div>

@include('Guide.layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}

<script src="{{asset('common/js/guide/moment.min.js')}}"></script>



<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); 

  showVideo(null)
  function showVideo(title){
    $.ajax({
      data: {
        title:title,
      },
      url: '{{ route("show-list-video") }}',           
      type: "get",
      dataType: 'json',            
      success: function (data) {
        html = ``
        for (let i = 0; i < data.all_video.length; i++) {
          html += 
          ` <a href="{{ url('/guide/guide-playlist') }}/`+data.all_video[i].id+`" class="col-md-3 store-view" data-id_video="`+data.all_video[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.all_video[i].id+`')" id="vid_`+data.all_video[i].id+`" controls hidden>
                <source src="{{ url("`+data.all_video[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.all_video[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.all_video[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.all_video[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.all_video[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.all_video[i].id+`"></span> Minute</div>
                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-all-video').html(html)

        html = ``
        for (let i = 0; i < data.jde.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.jde[i].id+`" class="col-md-3 store-view" data-id_video="`+data.jde[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.jde[i].id+`')" id="vid_`+data.jde[i].id+`" controls hidden>
                <source src="{{ url("`+data.jde[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.jde[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.jde[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.jde[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.jde[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.jde[i].id+`"></span> Minute</div>
                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-jde-video').html(html)

        html = ``
        for (let i = 0; i < data.qc.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.qc[i].id+`" class="col-md-3 store-view" data-id_video="`+data.qc[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.qc[i].id+`')" id="vid_`+data.qc[i].id+`" controls hidden>
                <source src="{{ url("`+data.qc[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.qc[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.qc[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.qc[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.qc[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.qc[i].id+`"></span> Minute</div>
                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-qc-video').html(html)

        html = ``
        for (let i = 0; i < data.it_dt.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.it_dt[i].id+`" class="col-md-3 store-view" data-id_video="`+data.it_dt[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.it_dt[i].id+`')" id="vid_`+data.it_dt[i].id+`" controls hidden>
                <source src="{{ url("`+data.it_dt[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.it_dt[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.it_dt[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.it_dt[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.it_dt[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.it_dt[i].id+`"></span> Minute</div>
                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-it-video').html(html)

        html = ``
        for (let i = 0; i < data.mkt.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.mkt[i].id+`" class="col-md-3 store-view" data-id_video="`+data.mkt[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.mkt[i].id+`')" id="vid_`+data.mkt[i].id+`" controls hidden>
                <source src="{{ url("`+data.mkt[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.mkt[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.mkt[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.mkt[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.mkt[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.mkt[i].id+`"></span> Minute</div>
                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-mkt-video').html(html)

        html = ``
        for (let i = 0; i < data.gcc.length; i++) {
          html += 
          `<a href="{{ url('/guide/guide-playlist') }}/`+data.gcc[i].id+`" class="col-md-3 store-view" data-id_video="`+data.gcc[i].id+`">
              <video onloadedmetadata="showDuration('vid_`+data.gcc[i].id+`')" id="vid_`+data.gcc[i].id+`" controls hidden>
                <source src="{{ url("`+data.gcc[i].video_path+`") }}" type="video/mp4">
                <source src="{{ url("`+data.gcc[i].video_path+`") }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
              <div class="cards">
                <div class="row pd-img">
                  <div class="col-12 hover-play">
                      <img class="image-thumbnail" src="{{url('`+data.gcc[i].thumb_path+`')}}">
                      <div class="hover-btn">
                          <button type="submit" class="btn-play"><i class="ml-play fas fa-play"></i></button>
                      </div>
                  </div>
                  <div class="col-12 title-thumbnail mt-2">
                      <div class="truncate">
                        `+data.gcc[i].title+`
                      </div>
                  </div>
                  <div class="col-12 justify-sb mt-3">
                      <div class="badge-count">`+data.gcc[i].count_playlist+` Step</div>
                      <div class="minute-count"><span class="duration_vid_`+data.gcc[i].id+`"></span> Minute</div>

                  </div>
                </div>
              </div>
            </a>`
        }
        $('.list-gcc-video').html(html)
      },
      error: function (xhr, status, error) {
          alert(xhr.responseText);
      }
    });
  }

  $('body').on('keyup', '.search', function () {       
    var title = $(this).val()
    showVideo(title)
  });

  $('body').on('click', '.button-search', function () {  
    var title = $('.search').val()
    showVideo(title)
  })

  function showDuration(id_video){
    var video_duration = document.getElementById(id_video).duration
    var video_duration = (video_duration/60).toFixed(0)
    $('.duration_'+id_video).html(video_duration)
  }

  var search = "{{ request()->query('') }}"
  if (search) {
    showVideo(search)
    console.log(search)
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

</script>
