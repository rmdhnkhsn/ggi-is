@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

<!-- <style>
  input[type="file"] {
    display: none;
}
</style> -->

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-4 mb-2 mr-auto ml-auto">
          <div class="menu-bar">
            <div class="navigation">
              <ul>
                <li class="list">
                  <a href="{{ route('finali.header',[$data->F4801_DOCO])}}">
                    <span class="icon">
                      <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="text">Header</span>
                  </a>
                </li>
                <li class="list active">
                  <a href="{{ route('finali.photos',[$data->F4801_DOCO])}}">
                    <span class="icon">
                      <i class="fas fa-camera-retro"></i>
                    </span>
                    <span class="text">Photos</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.defects',[$data->F4801_DOCO])}}">
                    <span class="icon">
                      <i class="fas fa-ban"></i>
                    </span>
                    <span class="text">Defects</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.quality',[$data->F4801_DOCO])}}">
                    <span class="icon">
                      <i class="fas fa-cogs"></i>
                    </span>
                    <span class="text">Quality</span>
                  </a>
                </li>
                <li class="list">
                  <a href="{{ route('finali.conclusion',[$data->F4801_DOCO])}}">
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
    <!-- <div class="card-accordion">
      <div class="wrapper-accordion"> -->

        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-12">
              <h2 class="main-title-photos">PACKING, PACKAGING & LABELING</h2>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-xl-4 col-md-6 mb-4"><!-- PACKED CARTON -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        PACKED CARTON
                      </div>
                    </div>
                    <div class="col-2">
                       <a href="{{ asset('storage/'. $data->finalInspection->packed_carton)  }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFPC" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFPC" tabindex="-1" role="dialog" aria-labelledby="modalPDFPCLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="{{ route('finali.header.updatePhoto', ['inspection' => $data['F4801_DOCO']]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFPCLabel">Upload Photo Packed Carton</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto-btn-custom"  name="packed_carton" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input" type='file' id="foto-btn-custom" name="packed_carton" value="" onchange="readURL(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content">
                                          <img class="file-upload-image mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- PACKED INTO CARTON -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        PACKED INTO CARTON
                      </div>
                    </div>
                    <div class="col-2 text-right">
                         <a href="{{ asset('storage/'.$data->finalInspection->packed_into_carton) }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFPIC" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFPIC" tabindex="-1" role="dialog" aria-labelledby="modalPDFPICLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="{{ route('finali.header.updatePhotoPacakedIntoCarton', ['inspection' => $data['F4801_DOCO']]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFPICLabel">Upload Photo Packed Into Carton</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="packed_into_carton" name="packed_into_carton" onclick="$('.file-upload-input2').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input2" type='file' id="packed_into_carton" name="packed_into_carton" value="" onchange="readURL2(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content2">
                                          <img class="file-upload-image2 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- SILICA GEL -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        SILICA GEL
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{ asset('storage/'.$data->finalInspection->slica_gel) }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFSG" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFSG" tabindex="-1" role="dialog" aria-labelledby="modalPDFSGLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="{{ route('finali.header.updatePhotoSlicaGel', ['inspection' => $data['F4801_DOCO']]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFSGLabel">Upload Photo Silica Gel</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="slica_gel" onclick="$('.file-upload-input3').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input3" type='file' id="slica_gel" name="slica_gel" value="" onchange="readURL3(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content3">
                                          <img class="file-upload-image3 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- SAMPLING CARTON -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        SAMPLING CARTON
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{ asset('storage/'.$data->finalInspection->sampling_carton) }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFSC" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFSC" tabindex="-1" role="dialog" aria-labelledby="modalPDFSCLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="{{ route('finali.header.updatePhotoSamplingCarton', ['inspection' => $data['F4801_DOCO']]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFSCLabel">Upload Photo Sampling Carton</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="sampling_carton" name="sampling_carton" onclick="$('.file-upload-input4').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input4" type='file' id="sampling_carton" name="sampling_carton" value="" onchange="readURL4(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content4">
                                          <img class="file-upload-image4 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- PACKING LIST -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        PACKING LIST
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFPL" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFPL" tabindex="-1" role="dialog" aria-labelledby="modalPDFPLLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFPLLabel">Upload Photo Packing List</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="sampling_carton" onclick="$('.file-upload-input5').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input5" type='file' id="sampling_carton" name="sampling_carton" value="" onchange="readURL5(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content5">
                                          <img class="file-upload-image5 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- HANG TAG -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        HANG TAG
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFHT" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFHT" tabindex="-1" role="dialog" aria-labelledby="modalPDFHTLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFHTLabel">Upload Photo Hang Tag</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto"  onclick="$('.file-upload-input6').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input6" type='file' id="pacaked_carton" name="image" value="" onchange="readURL6(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content6">
                                          <img class="file-upload-image6 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- SHIPPING MARK -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        SHIPPING MARK
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFSM" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFSM" tabindex="-1" role="dialog" aria-labelledby="modalPDFSMLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFSMLabel">Upload Photo Shipping Mark</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input7').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input7" type='file' id="foto" name="foto" value="" onchange="readURL7(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content7">
                                          <img class="file-upload-image7 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- POLYBAG PACKED -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        POLYBAG PACKED
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFPP" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFPP" tabindex="-1" role="dialog" aria-labelledby="modalPDFPPLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFPPLabel">Upload Photo Polybag Packed</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input8').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input8" type='file' id="foto" name="foto" value="" onchange="readURL8(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content8">
                                          <img class="file-upload-image8 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- MAIN LABEL – SIZE LABEL -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        MAIN LABEL – SIZE LABEL
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFML" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFML" tabindex="-1" role="dialog" aria-labelledby="modalPDFMLLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFMLLabel">Upload Photo Main Label - Size Label</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input9').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input9" type='file' id="foto" name="foto" value="" onchange="readURL9(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content9">
                                          <img class="file-upload-image9 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- CARE LABEL FRONT SIDE -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        CARE LABEL FRONT SIDE
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFCLFS" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFCLFS" tabindex="-1" role="dialog" aria-labelledby="modalPDFCLFSLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFCLFSLabel">Upload Photo Care Label Front Side</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input10').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input10" type='file' id="foto" name="foto" value="" onchange="readURL10(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content10">
                                          <img class="file-upload-image10 mt-2" src="#" alt=" Image Format Only" />
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

            <div class="col-xl-4 col-md-6 mb-4"><!-- CARE LABEL BACK SIDE -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        CARE LABEL BACK SIDE
                      </div>
                    </div>
                    <div class="col-2 text-right">
                      <a href="{{url('images/images.jpg')}}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <div class="upload-modal">
                        <button class="icon-photos2" type="button" data-toggle="modal" data-target="#modalPDFCLBS" title="Upload Photo Packed">
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="modalPDFCLBS" tabindex="-1" role="dialog" aria-labelledby="modalPDFCLBSLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalPDFCLBSLabel">Upload Photo Care Label Back Side</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mr-auto ml-auto">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input11').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                          <input class="file-upload-input11" type='file' id="foto" name="foto" value="" onchange="readURL11(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content11">
                                          <img class="file-upload-image11 mt-2" src="#" alt=" Image Format Only" />
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

        <!-- =========================================================================== -->


        <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-12">
              <h2 class="main-title-photos">LAB ANALYSIS & TESTING</h2>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-xl-4 col-md-6 mb-4"><!-- IMAGE 1 -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        IMAGE 1
                      </div>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- =========================================================================== -->

        <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-12">
              <h2 class="main-title-photos">PRODUCT</h2>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-xl-4 col-md-6 mb-4"><!-- PRODUCT VIEW -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        PRODUCT VIEW
                      </div>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4"><!-- SHADING VIEW -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        SHADING VIEW
                      </div>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4"><!-- COMPARE SAMPLE VS ACTUAL -->
              <div class="card-photos">
                <div class="container-fluid">
                  <div class="row py-3 px-2">
                    <div class="col-8">
                      <div class="title-photos">
                        COMPARE SAMPLE VS ACTUAL
                      </div>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- =========================================================================== -->

        <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-12">
              <h2 class="main-title-photos">MEASUREMENTS</h2>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      
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
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
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
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
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
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
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
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
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
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center ml-auto">
                          <i class="far fa-images"></i>
                        </div>
                      </a>
                    </div>
                    <div class="col-2">
                      <a href="">
                        <div class="icon-photos flex justify-center items-center mr-auto">
                          <i class="fas fa-camera"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        
      <!-- </div>
    </div> -->

  </section>


</div>

<script src="{{asset('assets/js/script.js')}}"></script>

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
  $(document).ready(function() {
    console.log($('#foto-input-file'))
    console.log($('#foto-btn-custom'))
    $('#foto-btn-custom').click(() => $('#foto-input-file').trigger('click'));

    $('#foto-input-file').change(function() {
      const photo = this.files[0];

      if (!photo) return;
      const reader = new FileReader();
      reader.onload = (e) => {
        console.log($('.img-preview'))
        $('.img-preview').css({'background-image': `url('${e.target.result}')`})
      };

      reader.readAsDataURL(photo);
    })
  });


  // function readURL(input) {
  //   if (input.files && input.files[0]) {
  //       var reader = new FileReader();
  //       reader.onload = function(e) {
  //       $('.image-upload-wrap').hide();
  //       $('.file-upload-image').attr('src', e.target.result);
  //       $('.file-upload-content').show();
  //       $('.image-title').html(input.files[0]);
  //       // $('.image-title').html(input.files[0].name);
  //       };
  //       reader.readAsDataURL(input.files[0]);
  //   } else {
  //       removeUpload();
  //   }
  // }

  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
  });
</script>

@include('qc.final-inspection.layouts.footer')