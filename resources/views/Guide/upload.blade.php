@include('Guide.layouts.header')
@include('Guide.layouts.navbar')

  <div class="content-wrapper">
    <div class="content-header">
    </div>
    <section class="content mt-5 mb-4 px-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-5">
            <a href="{{ route('guide-home') }}" class="gd-back-home">
              <div class="icon-back"><i class="fas fa-arrow-left"></i></div>
              <div class="desc-back">Back to home</div>
            </a>
            <div class="title-36">Upload Videos</div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <form id="form-video" action="{{ route('guide.video.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <h6>Pesan Error:</h6>
                  <ul class="mb-0 pl-4">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif              
              <div class="card pd-card">
                <div class="row">
                  <div class="col-12">
                    <span class="title-24">Details</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-9 mb-3">
                    <div class="row">
                      <div class="col-12">
                        <span class="title-14-sm">Title</span>
                        <div class="message mt-1">
                          <textarea name="title" id="title" placeholder="Add Title..." style="height:82px"></textarea>
                        </div>
                      </div>
                      <div class="col-12 mt-2">
                        <span class="title-14-sm">Description</span>
                        <div class="message mt-1">
                          <textarea class="@error('desc') is-invalid @enderror"name="desc" id="desc" placeholder="Add Description..." style="height:110px">{{ old('desc') }}</textarea>
                          {{-- <textarea class="ckeditor form-control" name="description"></textarea> --}}
                          {{-- <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea> --}}
                        </div>
                      </div>
                      <div class="col-12 mt-2">
                        <span class="title-14-sm">Category</span>
                        <div class="input-group mt-1">
                          <div class="input-group-prepend">
                            <span class="group-left" for="Category">Category</span>
                          </div>
                          <select class="form-control js-example-basic-single border-input" id="category" name="category">
                           <option disabled selected>Select Category</option>
                              @foreach($category as $key => $value)
                                  <option value="{{$key}}">{{$value['nama']}}</option>    
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-12 mt-3">
                        <span class="title-14-sm">Playlist</span>
                        <div class="input-group mt-1">
                          <div class="input-group-prepend">
                            <span class="group-left" for="">Playlist</span>
                          </div>
                          <select class="form-control  border-inputjs-example-basic-single js-states form-control" id="id_label_single" name="playlist_id" style="border-radius:0 5px 5px 0">
                            <option selected>Select Playlist </option>
                              @foreach($playlist as $key => $value)
                                  <option value="{{$value['id']}}">{{$value['nama']}}</option>    
                              @endforeach
                            {{-- <option value="3">Tutorial Instal JDE</option>
                            <option value="4">Tutorial membuka JDE</option>
                            <option value="2">Tutorial Membuat IT ticket</option> --}}
                          </select>
                          <div class="input-group-prepend">
                            <a class="add-playlist" data-toggle="modal" data-target="#playlist"><i class="fs-20 fas fa-plus"></i></a>
                            @include('Guide.partials.add-playlist')
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-12">
                        <span class="title-14-sm">Video & Thumbnail</span>
                      </div>
                      <div class="col-12 mt-1">
                        <div class="input-file-container">  
                            <input class="input-file" id="video_path" name="video_path" type="file" accept="video/*"> 
                            <label tabindex="0" class="input-file-trigger"><span class="select-drag">Select or drag video</span></label>
                        </div>
                        <div class="file-return truncate"></div>
                      </div>
                      <div class="col-12 mt-min">
                        <div class="file-upload-ws">
                          <div class="image-upload-wrap-packing1">
                            <i class="icon-upload-packing1 fas fa-upload"></i>
                            <button class="file-upload-btn-packing1" type="button" onclick="$('.file-upload-input-packing1').trigger( 'click' )">Thumbnail</button>
                            <input class="file-upload-input-packing1" type='file' id="thumb_path" name="thumb_path" accept="image/jpeg,jpg,png" onchange="readURL_packing1(this);" />
                            <div class="drag-text-packing1">
                              <h5>Or drop thumbnail here</h5>
                            </div>
                          </div>
                          <div class="file-upload-content-packing1">
                            <img class="file-upload-image-packing1" src="" alt=" Image Format Only" data-toggle="lightbox" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload_packing1()" class="remove-image-ws2">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 justify-start mt-4">
                    <button type="submit" id="submit-video" class="btn-blue store-video">Publish <i class="ml-2 fas fa-upload"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal" id="loadingModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="spinner-grow text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <p>Please Wait...</p>
        </div>
      </div>
    </div>
  </div>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  {{-- <script src="{{asset('common/js/ckeditor.js')}}"></script> --}}
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'desc' );
</script>
<script>
  $('.js-example-basic-single').select2({
  placeholder: 'Select an option'
});
</script>
<script>

  $('body').on('click', '.store-video', function () {
    jQuery('#loadingModal').modal({
			show: true,
			backdrop: 'static'
		});
  })
    
  document.querySelector("html");

  const fileInput  = document.querySelector( ".input-file" );
  const button     = document.querySelector( ".input-file-trigger" );
  const the_return = document.querySelector(".file-return");
        
  button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
  });
  button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
  });  
  fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.files[0].name;  
  });

  function readURL_packing1(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      $('.image-upload-wrap-packing1').hide();

      reader.onload = function (e) {
        $(".file-upload-image-packing1").attr("src", e.target.result);
        $(".file-upload-content-packing1").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);
      $("#frmPacking").submit();
    } else {
        removeUpload_packing1();
    }
  }

  document.getElementById("submit-video").onclick = (e) => {
    document.getElementById("form-video").submit()
  }

  function removeUpload_packing1() {
    $('.file-upload-input-packing1').replaceWith($('.file-upload-input-packing1').clone());
    $('.file-upload-content-packing1').hide();
    $('.image-upload-wrap-packing1').show();
  }
  $('.image-upload-wrap-packing1').bind('dragover', function () {
      $('.image-upload-wrap-packing1').addClass('image-dropping');
  });
  $('.image-upload-wrap-packing1').bind('dragleave', function () {
      $('.image-upload-wrap-packing1').removeClass('image-dropping');
  });
</script>


@include('Guide.layouts.footer')