@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

<style>

  .list-group-items {
    position: relative;
    display: block;
    padding: 0.75rem 1.25rem;
    background-color: #FDFFFF;
    border-radius: 6px;
    border: 2px solid #ddf2ff;
  }

  .md-tabs {
    position: relative; 
  }
  .md-tabs .nav-item-show {
    width: calc(100% / 3);
    text-align: center; 
  }
  .md-tabs .nav-item-show .nav-link.active ~ .slide {
    opacity: 1;
    -webkit-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out; 
  }
  .md-tabs .nav-item-show .nav-link ~ .slide {
    opacity: 8%;
    -webkit-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out; 
  }

  .md-tabs .nav-item-show a {
    padding: 20px 0 !important;
    color: #474747; 
  }

  .md-tabs .nav-item.open .nav-link,
  .md-tabs .nav-item.open .nav-link:focus,
  .md-tabs .nav-item.open .nav-link:hover,
  .md-tabs .nav-link.active,
  .md-tabs .nav-link.active:focus,
  .md-tabs .nav-link.active:hover {
    color: #71cbff;
    border: none;
    background-color: transparent;
    border-radius: 0;
  }

  .nav-tabs .slide {
    /* background: #4099ff; */
    background: #71cbff;
    width: calc(100% / 3);
    height: 5px;
    border-radius: 20px;
    position: absolute;
    -webkit-transition: left 0.3s ease-out;
    transition: left 0.3s ease-out;
    bottom: 0; 
  }

  @media only screen and (max-width: 1200px) {

    .md-tabs {
    display: initial; }
    .md-tabs .nav-item-show {
      width: calc(100% / 1);
      position: relative; }

    .nav-tabs .slide {
      width: calc(100% / 1); 
    }
  }

  @media only screen and (max-width: 1200px) {

    .card-group {
    width: calc(100% / 1);
    display: block; 
    position: relative; 
    }
  }
  
  .tabs-card {
    font-family: 'poppins', sans-serif;
  }

.show-photo {
    font-size:16px
}


</style>

<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
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
                  <li class="list active">
                    <a href="{{ route('finali.defects',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-ban"></i>
                      </span>
                      <span class="text">Defects</span>
                    </a>
                  </li>
                  <li class="list">
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
    <section class="content" id="defect-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">    
            <div class="card-accordion">
              <div class="wrapper-accordion">
                <div class="head-defects mb-4 mt-2">
                  <table class="tables conclusion-content box-shadow">
                    <thead>
                      <tr>
                        <th width="30%" class="fw-5 bg-thead text-center">Sample Level</th>
                        <th width="31%" class="fw-5 bg-thead text-center">Sampling Method</th>
                        <th width="30%" class="fw-5 bg-thead text-center">Sample Size</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr>
                          <td class="bg-tbody text-center">{{ $finalInspection->inspection_level }}</td>
                          <td class="bg-tbody text-center">{{ $finalInspection->inspection_method }}</td>
                          <td class="bg-tbody text-center">{{ $records['sample']}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                @foreach ($data2 as $key => $item)
                  <div class="accordion__item mb-4 defect-menu" data-menu-id="{{ $item->first()->menu_final_id }}">
                    <header class="accordion__header">
                      <div class="row row-title1">
                        <div class="col-10">
                          <h3 class="accordion__title">{{ $item->first()->menu->nama_menu }}</h3>
                        </div>
                        <div class="col-2 text-right">
                          <i class='fas fa-plus accordion__icon'></i>
                        </div>  
                      </div>
                    </header>
                    <div class="accordion__content">
                      <div class="row">
                        <div class="col-10 ml-auto mr-auto">
                          <div class="accordion" id="accordionGroup">
                            @foreach ($item as $key2 => $item2)
                              <div class="card defect-sub-menu" data-final-inspection-defect-id="{{ $item2->id }}" data-sub-menu-id="{{ $item2->final_submenu_id }}">
                                <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1-{{ $item2->final_submenu_id }}" 
                                  aria-expanded="false" aria-controls="collapse1-{{ $item2->final_submenu_id }}">
                                  <div class="card-header" id="heading1">
                                    <div class="title-headers flex flex-row justify-between">
                                      <div class="acc-title">
                                        <i class="tablist-icon fas  fa-tshirt"></i>
                                        {{ $item2->subMenu->nama_submenu }}
                                      </div>
                                    </div>
                                  </div>
                                </a>
                                <div id="collapse1-{{ $item2->final_submenu_id }}" class="collapse" aria-labelledby="heading1" data-parent="#accordionGroup">
                                  <div class="card-body">
                                      <div class="cards tabs-card">
                                        <div class="card-block p-0">
                                          <ul class="nav nav-tabs md-tabs" role="tablist">
                                            <li class="nav-item-show">
                                              <a class="nav-link active" data-toggle="tab" href="#critical-{{ $item2->final_submenu_id }}" role="tab">
                                                <i class="tablist-icon-update far fa-clock"></i>
                                                <span class="title-update">Critical</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                            <li class="nav-item-show">
                                              <a class="nav-link" data-toggle="tab" href="#major-{{ $item2->final_submenu_id }}" role="tab">
                                                <i class="tablist-icon-update far fa-clock"></i>
                                                <span class="title-update">Major</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                            <li class="nav-item-show">
                                              <a class="nav-link" data-toggle="tab" href="#minor-{{ $item2->final_submenu_id }}" role="tab">
                                                <i class="tablist-icon-update far fa-clock"></i>
                                                <span class="title-update">Minor</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                          </ul>
                                          {{-- critical --}}
                                          <div class="tab-content card-block">
                                            <div class="tab-pane active critical-tab" id="critical-{{ $item2->final_submenu_id }}" role="tabpanel">
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-critical-{{ $item2->final_submenu_id }}">{{ $item2->critical }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      >{{ $item2->message }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-3 mt-3 ml-2 mr-auto">
                                                      <button type="submit" class="btn btn-defects">
                                                        SAVE
                                                      </button>
                                                    </div>
                                                    </form>
                                                  <div class="col-3 mt-3 ml-2 ml-auto text-right">
                                                    {{-- <span class="Dfoto-name py-3">Input Photo</span> --}}
                                                    <button type="button" class="btn btn-defects" data-toggle="modal" data-target="#modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                    <i class="fas fa-camera mr-3"></i>
                                                      Input Photo
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" tabindex="-1" aria-labelledby="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <form action="{{ route('finali.header.updatePhotoHole', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" 
                                                          method="post" class="modal-content" enctype="multipart/form-data"
                                                        >
                                                          @csrf
                                                          @method('PUT')
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label">INPUT PHOTO</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="row">
                                                              <div class="col-lg-6 mr-auto ml-auto">
                                                                <div class="file-upload">
                                                                  <button class="file-upload-btn mb-3" type="button" onclick="$('.file-upload-input{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').trigger('click')">
                                                                    Add Image
                                                                  </button>

                                                                  <div class="image-upload-wrap">
                                                                    <input class="file-upload-input{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" type="file" id="foto_hole" name="foto_hole" style="display:none;" onchange="readURL1{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}(this);" accept="image/*" />
                                                                  </div>
                                                                  <div class="file-upload-content{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                                    <center>
                                                                    <img class="file-upload-image{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" src="" width="200px" />
                                                                    </center>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                                    <script>
                                                      function readURL1{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}(input) {
                                                        if (input.files && input.files[0]) {
                                                          var reader = new FileReader();
                                                          reader.onload = function(e) {
                                                            $('.file-upload-image{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').attr('src', e.target.result);
                                                            $('.file-upload-content{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').show();
                                                          };

                                                          reader.readAsDataURL(input.files[0]);
                                                        } 
                                                      }
                                                    </script>
                                                  </div>
                                                  <div class="col-3 mt-3 ml-2">
                                                    @if ($item2->foto_hole != NULL)
                                                      <a href="{{ asset('storage/'.$item2->foto_hole)}}"data-toggle="lightbox" data-title=""data-gallery="gallery" title="View Photo">
                                                        <div class="btn-defects show-photo">
                                                          <i class="far fa-images mr-2"></i>
                                                          Show Photo
                                                        </div>
                                                      </a>
                                                     @else
                                                  @endif
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                   
                                            {{-- major --}}
                                            <div class="tab-pane major-tab" id="major-{{ $item2->final_submenu_id }}" role="tabpanel">
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-major-{{ $item2->final_submenu_id }}">{{ $item2->major }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                  
                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      >{{ $item2->message }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                <div class="row">
                                                  <div class="col-3 mt-3 ml-2 mr-auto">
                                                    <button type="submit" class="btn btn-defects">
                                                      SAVE
                                                    </button>
                                                  </div>
                                                  </form>
                                                   <div class="col-3 mt-3 ml-2 ml-auto text-right">
                                                    {{-- <span class="Dfoto-name py-3">Input Photo</span> --}}
                                                    <button type="button" class="btn btn-defects" data-toggle="modal" data-target="#modalInputPhotoMajor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                    <i class="fas fa-camera mr-3"></i>
                                                      Input Photo
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalInputPhotoMajor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" tabindex="-1" aria-labelledby="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <form action="{{ route('finali.header.updatePhotoHoleMajor', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" 
                                                          method="post" class="modal-content" enctype="multipart/form-data"
                                                        >
                                                          @csrf
                                                          @method('PUT')
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label">INPUT PHOTO</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="row">
                                                              <div class="col-lg-6 mr-auto ml-auto">
                                                                <div class="file-upload">
                                                                  <button class="file-upload-btn mb-3" type="button" onclick="$('.file-upload-input{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').trigger('click')">
                                                                    Add Image
                                                                  </button>

                                                                  <div class="image-upload-wrap-Major">
                                                                    <input class="file-upload-input-Major{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" type="file" id="foto_hole" name="foto_hole" style="display:none;" onchange="readURL1{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}(this);" accept="image/*" />
                                                                  </div>
                                                                  <div class="file-upload-content{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                                    <center>
                                                                    <img class="file-upload-image{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" src="" width="200px" />
                                                                    </center>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                           
                                                  </div>
                                                  <div class="col-3 mt-3 ml-2">
                                                    @if ($item2->foto_hole != NULL)
                                                      <a href="{{ asset('storage/'.$item2->foto_hole)}}" data-toggle="lightbox" data-title=""data-gallery="gallery" title="View Photo">
                                                        <div class="btn-defects show-photo">
                                                          <i class="far fa-images mr-2"></i>
                                                          Show Photo
                                                        </div>
                                                      </a>
                                                     @else
                                                  @endif
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            

                                              {{-- minor--}}
                                            <div class="tab-pane minor-tab" id="minor-{{ $item2->final_submenu_id }}" role="tabpanel">
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-minor-{{ $item2->final_submenu_id }}">{{ $item2->minor }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                  
                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      >{{ $item2->message }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                <div class="row">
                                                  <div class="col-3 mt-3 ml-2 mr-auto">
                                                    <button type="submit" class="btn btn-defects">
                                                      SAVE
                                                    </button>
                                                  </div>
                                                </form>
                                                 <div class="col-3 mt-3 ml-2 ml-auto text-right">
                                                    {{-- <span class="Dfoto-name py-3">Input Photo</span> --}}
                                                    <button type="button" class="btn btn-defects" data-toggle="modal" data-target="#modalInputPhotoMinor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                    <i class="fas fa-camera mr-3"></i>
                                                      Input Photo
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalInputPhotoMinor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" tabindex="-1" aria-labelledby="modalInputPhotoCritical{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <form action="{{ route('finali.header.updatePhotoHole', [$inspection->F4801_DOCO, $finalInspection->id, $item2->id]) }}" 
                                                          method="post" class="modal-content" enctype="multipart/form-data"
                                                        >
                                                          @csrf
                                                          @method('PUT')
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modalInputPhotoMinor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}Label">INPUT PHOTO</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="row">
                                                              <div class="col-lg-6 mr-auto ml-auto">
                                                                <div class="file-upload">
                                                                  <button class="file-upload-btn mb-3" type="button" onclick="$('.file-upload-input{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').trigger('click')">
                                                                    Add Image
                                                                  </button>

                                                                  <div class="image-upload-wrap-Minor">
                                                                    <input class="file-upload-input-Minor{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" type="file" id="foto_hole" name="foto_hole" style="display:none;" onchange="readURL1{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}(this);" accept="image/*" />
                                                                  </div>
                                                                  <div class="file-upload-content{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}">
                                                                    <center>
                                                                    <img class="file-upload-image{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}" src="" width="200px" />
                                                                    </center>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                          </div>
                                                      </form>
                                                      </div>
                                                    </div>
                                                    <script>
                                                      function readURL3{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}(input) {
                                                        if (input.files && input.files[0]) {
                                                          var reader = new FileReader();
                                                          reader.onload = function(e) {
                                                            $('.file-upload-image{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').attr('src', e.target.result);
                                                            $('.file-upload-content{{ "_{$item2->final_submenu_id}_{$item2->menu_final_id}" }}').show();
                                                          };

                                                          reader.readAsDataURL(input.files[0]);
                                                        } 
                                                      }
                                                    </script>
                                                  </div>
                                                  <div class="col-3 mt-3 ml-2">
                                                    @if ($item2->foto_minor != NULL)
                                                      <a href="{{ asset('storage/'.$item2->foto_minor)}}"data-toggle="lightbox"     data-title=""data-gallery="gallery" title="View Photo">
                                                        <div class="btn-defects show-photo">
                                                          <i class="far fa-images mr-2"></i>
                                                          Show Photo
                                                        </div>
                                                      </a>
                                                     @else
                                                  @endif
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </form>
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
                    </div>
                  </div>    
                @endforeach
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@if(Session::has('start'))
  <script>
    toastr.success("{!!Session::get('start')!!}");
  </script>
@endif
<script src="{{asset('assets/js/script.js')}}"></script>
<script>
  $(document).ready(function() {
    
    $('#defect-container .defect-menu').each(function (idx, $el) {
      console.log($($el).data().menuId)
      const menuId = $($el).data().menuId;
      $(this).children().find('div#accordionGroup').children().each(function (idx2, $el2) {
        const subMenuId = $($el2).data().subMenuId;
        const finalInspectionDefectId = $($el2).data().finalInspectionDefectId;

        // Critical
        $($el2).children().find('#critical-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for critical
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/decrement-critical-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-critical-' + subMenuId).html(response.sub_menu.critical)
            })
            .catch(err => {
              console.error("Kurang Critical");
              console.error(err);
            })
          })

          //Give event click on increment button for critical
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/increment-critical-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-critical-' + subMenuId).html(response.sub_menu.critical)
            })
            .catch(err => {
              console.error("Tambah Critical");
              console.error(err);
            })
          })
        })

        // Major
        $($el2).children().find('#major-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for major
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/decrement-major-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-major-' + subMenuId).html(response.sub_menu.major)
            })
            .catch(err => {
              console.error("Kurang Major");
              console.error(err);
            })
          })

          //Give event click on increment button for major
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/increment-major-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-major-' + subMenuId).html(response.sub_menu.major)
            })
            .catch(err => {
              console.error("Tambah Major");
              console.error(err);
            })
          })
        })
        
        // Minor
        $($el2).children().find('#minor-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for minor
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/decrement-minor-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-minor-' + subMenuId).html(response.sub_menu.minor)
            })
            .catch(err => {
              console.error("Kurang Minor");
              console.error(err);
            })
          })

          //Give event click on increment button for minor
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $inspection->F4801_DOCO }}/final/{{ $finalInspection->id }}/inspection-defect/${finalInspectionDefectId}/increment-minor-defects`, {
              method: 'POST',
              mode: 'cors', // no-cors, *cors, same-origin
              cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
              credentials: 'same-origin', // include, *same-origin, omit
              headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
              },
              redirect: 'follow', // manual, *follow, error
              referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
              body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
              }) // body data type must match "Content-Type" header
            })
            .then(response => response.json())
            .then(response => {
              console.log(response);
              $($el3).find('#hasil-minor-' + subMenuId).html(response.sub_menu.minor)
            })
            .catch(err => {
              console.error("Tambah Minor");
              console.error(err);
            })
          })
        })

      })
    });
  });


  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) => {
      item.classList.remove('active')
    });
    this.classList.add('active');
  }

  list.forEach((item) => {
    item.addEventListener('click',activeLink)
  });
</script>


<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion__header')

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
          // accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>


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



@include('qc.final-inspection.layouts.footer')