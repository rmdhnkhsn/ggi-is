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
                    <a href="{{ route('finali.header',[$data->F4801_DOCO])}}">
                      <span class="icon">
                        <i class="fas fa-user-tag"></i>
                      </span>
                      <span class="text">Header</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.photos',[$data->F4801_DOCO])}}">
                      <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                      </span>
                      <span class="text">Photos</span>
                    </a>
                  </li>
                  <li class="list active">
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
                        @if ($data->finalInspection && $data->finalInspection->inspection_level && $data->finalInspection->inspection_method  && $data->finalInspection->sample != NULL)
                          <td class="bg-tbody text-center">{{ $data->finalInspection->inspection_level }}</td>
                          <td class="bg-tbody text-center">{{ $data->finalInspection->inspection_method }}</td>
                          <td class="bg-tbody text-center">{{ $data->finalInspection->sample }}</td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                </div>

              
                @foreach ($data2 as $key => $value)
                  <div class="accordion__item mb-4 defect-menu" data-menu-id="{{ $value->id }}">
                    <header class="accordion__header">
                      <div class="row row-title1">
                        <div class="col-10">
                          <h3 class="accordion__title">{{ $value['nama_menu'] }}</h3>
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
                            @foreach ($value->defectSubMenu as $key2 => $value2)
                              <div class="card defect-sub-menu" data-sub-menu-id="{{ $value2->id }}">
                                <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1-{{ $value2['id'] }}" 
                                  aria-expanded="false" aria-controls="collapse1-{{ $value2['id'] }}">
                                  <div class="card-header" id="heading1">
                                    <div class="title-headers flex flex-row justify-between">
                                      <div class="acc-title">
                                        <i class="tablist-icon fas fa-tshirt"></i>
                                        {{ $value2['nama_submenu'] }}
                                      </div>
                                    </div>
                                  </div>
                                </a>
                                <div id="collapse1-{{ $value2['id'] }}" class="collapse" aria-labelledby="heading1" data-parent="#accordionGroup">
                                  <div class="card-body">
                                      <div class="cards tabs-card">
                                        <div class="card-block p-0">
                                          <ul class="nav nav-tabs md-tabs" role="tablist">
                                            <li class="nav-item-show">
                                              <a class="nav-link active" data-toggle="tab" href="#critical-{{ $value2['id'] }}" role="tab">
                                                <!-- <i class="tablist-icon-update far fa-clock"></i> -->
                                                <span class="title-update">CRITICAL</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                            <li class="nav-item-show">
                                              <a class="nav-link" data-toggle="tab" href="#major-{{ $value2['id'] }}" role="tab">
                                                <!-- <i class="tablist-icon-update far fa-clock"></i> -->
                                                <span class="title-update">MAJOR</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                            <li class="nav-item-show">
                                              <a class="nav-link" data-toggle="tab" href="#minor-{{ $value2['id'] }}" role="tab">
                                                <!-- <i class="tablist-icon-update far fa-clock"></i> -->
                                                <span class="title-update">MINOR</span>
                                              </a>
                                              <div class="slide"></div>
                                            </li>
                                          </ul>
                                          
                                          <div class="tab-content card-block">
                                            <div class="tab-pane active critical-tab" id="critical-{{ $value2['id'] }}" role="tabpanel" >
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-critical-{{ $value2['id'] }}">{{ $value2->critical }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>

                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$data->F4801_DOCO, $value->id, $value2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                 

                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      required>{{ $value2->comment }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <button type="submit" class="btn btn-defects mt-3 ml-2">
                                                      SAVE
                                                    </button>
                                                  </div>
                                                </form>
                                                <div class="row">
                                                  <div class="col-12">
                                                    <span class="Dfoto-name py-3">Input Photo</span>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-11">
                                                    <div class="input-file-container">
                                                      <div class="custom-file mb-2" style="box-sizing:border-box;">
                                                        <button class="custom-file-labels" type="button" data-toggle="modal" data-target="#modalphoto" title="Upload Photo"></button>
                                                      </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalphoto" tabindex="-1" role="dialog" aria-labelledby="modalphotoLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <form action="" class="modal-content" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalphotoLabel">Upload Photo</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <div class="row">
                                                                    <div class="col-lg-6 mr-auto ml-auto">
                                                                      <div class="file-upload">
                                                                        <button class="defect-upload-btn" type="button">Add Image</button>

                                                                        <div class="image-upload-wrap">
                                                                          <input class="defect-upload-input" type='file' id="" name="" value="" onchange="readURL(this);" accept="image/*" />
                                                                        </div>
                                                                        <div class="defect-upload-content">
                                                                          <img class="defect-upload-image mt-2" src="" alt=" Image Format Only" />
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
                                                  <div class="col-1">
                                                    <a href="{{ asset('images/noimg.jpg') }}" data-toggle="lightbox" data-title="" data-gallery="gallery" title="View Photo">
                                                      <div class="view-photos flex justify-center items-center ml-auto">
                                                        <i class="far fa-images"></i>
                                                      </div>
                                                    </a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane major-tab" id="major-{{ $value2['id'] }}" role="tabpanel">
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-major-{{ $value2['id'] }}">{{ $value2->major }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$data->F4801_DOCO, $value->id, $value2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                 
                                                  
                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      required>{{ $value2->comment }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <button type="submit" class="btn btn-defects mt-3 ml-2">
                                                      SAVE
                                                    </button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                            <div class="tab-pane minor-tab" id="minor-{{ $value2['id'] }}" role="tabpanel">
                                              <div class="last-update m-2">
                                                <div class="row mb-4">
                                                  <div class="col-5 text-right">
                                                    <button class="btn-minus" id="kurang">
                                                      <i class="icon-hitung fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <div class="col-2 text-center">
                                                    <span class="hasil-hitung" id="hasil-minor-{{ $value2['id'] }}">{{ $value2->minor }}</span>
                                                  </div>
                                                  <div class="col-5 text-left">
                                                    <button class="btn-plus" id="tambah">
                                                      <i class="icon-hitung fas fa-plus"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <form action="{{ route('finali.header.updateComment', [$data->F4801_DOCO, $value->id, $value2->id]) }}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                  
                                                  <div class="col-12">
                                                    <div class="message">
                                                      <textarea placeholder="Write your message" name="message"
                                                      required>{{ $value2->comment }}</textarea>
                                                      <i class="icon-comment far fa-comment-dots"></i>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <button type="submit" class="btn btn-defects mt-3 ml-2">
                                                      SAVE
                                                    </button>
                                                  </div>
                                                </form>
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
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

@if(Session::has('start'))
  <script>
    toastr.success("{!!Session::get('start')!!}");
  </script>
@endif

<script>
  $(document).ready(function() {
    
    $('#defect-container .defect-menu').each(function (idx, $el) {
      console.log('$el')
      console.log($($el).data().menuId)
      const menuId = $($el).data().menuId;
      $(this).children().find('div#accordionGroup').children().each(function (idx2, $el2) {
        const subMenuId = $($el2).data().subMenuId;

        // Critical
        $($el2).children().find('#critical-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for critical
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/decrement-critical-defects`, {
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
              console.error(err);
            })
          })

          //Give event click on increment button for critical
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/increment-critical-defects`, {
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
              console.error(err);
            })
          })
        })

        // Major
        $($el2).children().find('#major-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for major
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/decrement-major-defects`, {
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
              console.error(err);
            })
          })

          //Give event click on increment button for major
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/increment-major-defects`, {
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
              console.error(err);
            })
          })
        })
        
        // Minor
        $($el2).children().find('#minor-' + subMenuId).each(function(idx3, $el3) {
          //Give event click on decrement button for minor
          $($el3).find("#kurang").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/decrement-minor-defects`, {
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
              console.error(err);
            })
          })

          //Give event click on increment button for minor
          $($el3).find("#tambah").click(function() {
            fetch(`/QC/final-inspection/defects/{{ $data->F4801_DOCO }}/menu/${menuId}/sub-menu/${subMenuId}/increment-minor-defects`, {
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
              console.error(err);
            })
          })
        })

      })
      console.log('================')
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
  // var tambah = document.getElementById('tambah');
  // var kurang = document.getElementById('kurang');
  // var hasil = document.getElementById('hasil');
  // var no = 1;
  // tambah.onclick = function(){
  // hasil.innerHTML = no++;
  // };
  // kurang.onclick = function(){
  // hasil.innerHTML = no--;
  // };

</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-labels").addClass("selected").html(fileName);
});
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

<!-- <script>
  function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

        $('.defect-upload-image').attr('src', e.target.result);
        $('.defect-upload-content').show();
        };

        reader.readAsDataURL(input.files[0]);

    } 
  }
</script> -->

@include('qc.final-inspection.layouts.footer')