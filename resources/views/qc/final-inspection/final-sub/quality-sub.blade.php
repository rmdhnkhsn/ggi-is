@extends("layouts.app")
@section("title","Final-Inspection")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-inspection.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
@endpush



@push("sidebar")
  @include('qc.final-inspection.layouts.navbar2')
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-4 mb-2 mr-auto ml-auto">
          <div class="menu-bar">
            <div class="navigation">
              <ul>
                <li class="list">
                  <a href="{{ route('finali.header',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                    <span class="icon">
                      <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="text">Header</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.photos',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                    <span class="icon">
                      <i class="fas fa-camera-retro"></i>
                    </span>
                    <span class="text">Photos</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.defects',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                    <span class="icon">
                      <i class="fas fa-ban"></i>
                    </span>
                    <span class="text">Defects</span>
                  </a>
                </li>
                <li class="list active">
                  <a href="{{ route('finali.quality',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                    <span class="icon">
                      <i class="fas fa-cogs"></i>
                    </span>
                    <span class="text">Quality</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.conclusion',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                    <span class="icon">
                      <i class="fas fa-comments"></i>
                    </span>
                    <span class="text">Conclusion</span>
                  </a>
                </li>
                <div class="indicator"></div>
              </ul>
            </div>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


    <!-- /.content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card-quality">
            <div class="wrapper-quality">
              <div class="row ml-3 mr-3">
                <h2 class="main-title-qty">Measurement</h2>
                  </div>
               <div class="container-fluid">
                <div class="row mt-3">
                  <div class="col-xl-4 col-md-6 mb-4"><!-- MEASUREMENT 1 -->
                    <div class="card-photos">
                      <div class="container-fluid">
                        <div class="row py-3 px-2">
                          <div class="col-8">
                            <div class="title-photos">
                              MEASUREMENT 1
                            </div>
                          </div>
                          <div class="col-2 text-right">
                            @if ($finalInspection && $finalInspection->measurement1 != NULL)
                            <a href="{{ asset('storage/'.$finalInspection->measurement1) }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                              <div class="icon-photos flex justify-center items-center ml-auto">
                                <i class="far fa-images mt-2"></i>
                              </div>
                            </a>
                            @else
                            @endif
                          </div>
                          <div class="col-2">
                            <div class="upload-modal">
                              <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFM1" title="Upload Photo Packed">
                                <i class="fas fa-camera"></i>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPDFM1" tabindex="-1" role="dialog" aria-labelledby="modalPDFM1Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('updatePhotoM1', [$inspection['F4801_DOCO'], $finalInspection->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPDFM1Label">Upload Photo Measurement 1</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-6 mr-auto ml-auto">
                                          <div class="file-upload">
                                              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input16').trigger( 'click' )">Add Image</button>

                                              <div class="image-upload-wrap">
                                                <input class="file-upload-input16" type='file' id="measurement1" name="measurement1" value="" onchange="readURL16(this);" accept="image/*" />
                                              </div>
                                              <div class="file-upload-content16">
                                                <img class="file-upload-image16 mt-2" src="#" alt=" Image Format Only" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-submitmodal">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4"><!-- MEASUREMENT 2 -->
                    <div class="card-photos">
                      <div class="container-fluid">
                        <div class="row py-3 px-2">
                          <div class="col-8">
                            <div class="title-photos">
                              MEASUREMENT 2
                            </div>
                          </div>
                          <div class="col-2 text-right">
                            @if ($finalInspection && $finalInspection->measurement2 != NULL)
                            <a href="{{ asset('storage/'.$finalInspection->measurement2) }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                              <div class="icon-photos flex justify-center items-center ml-auto">
                                <i class="far fa-images mt-2"></i>
                              </div>
                            </a>
                            @else
                            @endif
                          </div>
                          <div class="col-2">
                            <div class="upload-modal">
                              <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFM2" title="Upload Photo Packed">
                                <i class="fas fa-camera"></i>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPDFM2" tabindex="-1" role="dialog" aria-labelledby="modalPDFM2Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('updatePhotoM2', [$inspection['F4801_DOCO'], $finalInspection->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPDFM2Label">Upload Photo Measurement 2</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-6 mr-auto ml-auto">
                                          <div class="file-upload">
                                              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input17').trigger( 'click' )">Add Image</button>

                                              <div class="image-upload-wrap">
                                                <input class="file-upload-input17" type='file' id="measurement2" name="measurement2" value="" onchange="readURL17(this);" accept="image/*" />
                                              </div>
                                              <div class="file-upload-content17">
                                                <img class="file-upload-image17 mt-2" src="#" alt=" Image Format Only" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-submitmodal">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4"><!-- MEASUREMENT 3 -->
                    <div class="card-photos">
                      <div class="container-fluid">
                        <div class="row py-3 px-2">
                          <div class="col-8">
                            <div class="title-photos">
                              MEASUREMENT 3
                            </div>
                          </div>
                          <div class="col-2 text-right">
                            @if ($finalInspection && $finalInspection->measurement3 != NULL)
                            <a href="{{ asset('storage/'.$finalInspection->measurement3) }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                              <div class="icon-photos flex justify-center items-center ml-auto">
                                <i class="far fa-images mt-2"></i>
                              </div>
                            </a>
                            @else
                            @endif
                          </div>
                          <div class="col-2">
                            <div class="upload-modal">
                              <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFM3" title="Upload Photo Packed">
                                <i class="fas fa-camera"></i>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPDFM3" tabindex="-1" role="dialog" aria-labelledby="modalPDFM3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('updatePhotoM3', [$inspection['F4801_DOCO'], $finalInspection->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPDFM3Label">Upload Photo Measurement 3</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-6 mr-auto ml-auto">
                                          <div class="file-upload">
                                              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input18').trigger( 'click' )">Add Image</button>

                                              <div class="image-upload-wrap">
                                                <input class="file-upload-input18" type='file' id="measurement3" name="measurement3" value="" onchange="readURL18(this);" accept="image/*" />
                                              </div>
                                              <div class="file-upload-content18">
                                                <img class="file-upload-image18 mt-2" src="#" alt=" Image Format Only" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-submitmodal">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4"><!-- MEASUREMENT 4 -->
                    <div class="card-photos">
                      <div class="container-fluid">
                        <div class="row py-3 px-2">
                          <div class="col-8">
                            <div class="title-photos">
                              MEASUREMENT 4
                            </div>
                          </div>
                          <div class="col-2 text-right">
                            @if ($finalInspection && $finalInspection->measurement4 != NULL)
                            <a href="{{ asset('storage/'.$finalInspection->measurement4) }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                              <div class="icon-photos flex justify-center items-center ml-auto">
                                <i class="far fa-images mt-2"></i>
                              </div>
                            </a>
                            @else
                            @endif
                          </div>
                          <div class="col-2">
                            <div class="upload-modal">
                              <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFM4" title="Upload Photo Packed">
                                <i class="fas fa-camera"></i>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPDFM4" tabindex="-1" role="dialog" aria-labelledby="modalPDFM4Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('updatePhotoM4', [$inspection['F4801_DOCO'], $finalInspection->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPDFM4Label">Upload Photo Measurement 4</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-6 mr-auto ml-auto">
                                          <div class="file-upload">
                                              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input19').trigger( 'click' )">Add Image</button>

                                              <div class="image-upload-wrap">
                                                <input class="file-upload-input19" type='file' id="measurement4" name="measurement4" value="" onchange="readURL19(this);" accept="image/*" />
                                              </div>
                                              <div class="file-upload-content19">
                                                <img class="file-upload-image19 mt-2" src="#" alt=" Image Format Only" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-submitmodal">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4"><!-- MEASUREMENT 5 -->
                    <div class="card-photos">
                      <div class="container-fluid">
                        <div class="row py-3 px-2">
                          <div class="col-8">
                            <div class="title-photos">
                              MEASUREMENT 5
                            </div>
                          </div>
                          <div class="col-2 text-right">
                            @if ($finalInspection && $finalInspection->measurement5 != NULL)
                            <a href="{{ asset('storage/'.$finalInspection->measurement5) }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                              <div class="icon-photos flex justify-center items-center ml-auto">
                                <i class="far fa-images mt-2"></i>
                              </div>
                            </a>
                            @else
                            @endif
                          </div>
                          <div class="col-2">
                            <div class="upload-modal">
                              <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFM5" title="Upload Photo Packed">
                                <i class="fas fa-camera"></i>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPDFM5" tabindex="-1" role="dialog" aria-labelledby="modalPDFM5Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('updatePhotoM5', [$inspection['F4801_DOCO'], $finalInspection->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPDFM5Label">Upload Photo Measurement 5</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-6 mr-auto ml-auto">
                                          <div class="file-upload">
                                              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input20').trigger( 'click' )">Add Image</button>

                                              <div class="image-upload-wrap">
                                                <input class="file-upload-input20" type='file' id="measurement5" name="measurement5" value="" onchange="readURL20(this);" accept="image/*" />
                                              </div>
                                              <div class="file-upload-content20">
                                                <img class="file-upload-image20 mt-2" src="#" alt=" Image Format Only" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-submitmodal">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
              <form action="{{ route('finali.header.updateQualityPlan', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                id="start-inspection-form" method="post"
              >
                @csrf
                @method('PUT')

                <div class="row ml-3 mr-3">
                  <div class="col-md-6 mt-2">
                    <div class="wrapper-radio">
                      <input type="radio" name="measurement" value="PASS" class="conform-radio" id="conform-radio-measurement" 
                      {{ $finalInspection ? ($finalInspection->measurement == 'PASS' ? 'checked' : '') : '' }}>
                      <label for="conform-radio-measurement" class="option option-1">
                        <i class="icon-qty fas fa-check-circle"></i>
                        <span class="qty-title">PASS</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6 mt-2">
                    <div class="wrapper-radio"> 
                      <input type="radio" name="measurement" value="FAIL" class="nonConform-radio" id="nonConform-radio-measurement" 
                      {{ $finalInspection ? ($finalInspection->measurement == 'FAIL' ? 'checked' : '') : '' }}>
                      <label for="nonConform-radio-measurement" class="option option-2">
                        <i class="icon-qty fas fa-times-circle"></i>
                        <span class="qty-title">FAIL</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row m-3">
                  <div class="col-12">
                    @if ($finalInspection && $finalInspection->remark != NULL)
                      <div class="qty-message">
                        <textarea  name="remark" id="remark" value="">{{  $finalInspection->remark }}</textarea>
                        <i class="qty-comment far fa-comment-dots"></i>
                      </div>
                         
                  @else
                  <div class="qty-message">
                    <textarea placeholder="Write Your Massage" name="remark" id="remark" value=""></textarea>
                    <i class="qty-comment far fa-comment-dots"></i>
                  </div>
                @endif
              </div>
              @if ($finalInspection && $finalInspection->remark != NULL)
                  
              <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-qty mt-3 mb-2 ml-2" id="start-inspect">EDIT
                </button>
              </div>
                @else
                  <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-qty mt-3 mb-2 ml-2" id="start-inspect">SAVE
                    </button>
                  </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <div class="row"></div>
@endsection

@push("scripts")
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

@if(Session::has('start'))
  <script>
    toastr.success("{!!Session::get('start')!!}");
  </script>
@endif

<script>
  $(function () {
    $(document).on('click', '[ data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
</script>

<script>

  function readURL16(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.file-upload-image16').attr('src', e.target.result);
        $('.file-upload-content16').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }
  function readURL17(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.file-upload-image17').attr('src', e.target.result);
        $('.file-upload-content17').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }
  function readURL18(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.file-upload-image18').attr('src', e.target.result);
        $('.file-upload-content18').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }
  function readURL19(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.file-upload-image19').attr('src', e.target.result);
        $('.file-upload-content19').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }
  function readURL20(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.file-upload-image20').attr('src', e.target.result);
        $('.file-upload-content20').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }

</script>
@endpush
