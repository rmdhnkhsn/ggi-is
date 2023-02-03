@include('production.layouts.header')
@include('production.layouts.navbar3')

<style>

    .md-tabs {
      position: relative; 
    }
    .md-tabs .nav-item-show {
      width: calc(100% / 6);
      text-align: center; 
    }
    .md-tabs .nav-item-show .nav-link.active ~ .slide {
      opacity: 1;
      -webkit-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out; 
    }
    .md-tabs .nav-item-show .nav-link ~ .slide {
      opacity: 10%;
      -webkit-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out; 
    }

    .md-tabs .nav-item-show a {
      padding: 20px 0 !important;
      color: #474747; 
    }

    .nav-tabs .slide {
      background: #4099ff;
      width: calc(100% / 6);
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
  </section>
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-lg-6 ml-auto">
          <div id="containers-card">
            <div class="product-image">
              <img src="{{ Storage::url($data->foto) }}" class="image-card" alt="">
              <div class="info">
                <h2 class="info1">GGI</h2>
              </div>
            </div>
            <div class="product-details">
              <h1 class="h6 mb-3">List Upload Document</h1>
              <ul class="mt-2">
                @if($data->smv != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document SMV / AP</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3 mb-2"></i>Document SMV / AP</li>
                @endif

                @if($data->ppm != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document PPM</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3 mb-2"></i>Document PPM</li>
                @endif

                @if($data->work != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document Worksheet</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3 mb-2"></i>Document Worksheet</li>
                @endif

                @if($data->trimcard != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document Trimcard</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3 mb-2"></i>Document Trimcard</li>
                @endif

                @if($data->techspech != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document Techpack</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3"></i>Document Techpack</li>
                @endif
              </ul>

            </div>
          </div>

        </div>
        <div class="col-lg-4 mr-auto">
          <!-- carts -->
          <div class="flex flex-col">

            <div class="row">
              <div class="col-lg-12 col-12 mt-3">
                <div class="card-detail">
                    <div class="py-3 px-4 flex flex-row justify-between">
                        <h1 class="styles">
                            <span class="style_">STYLE</span>
                            <p class="style__">{{ $data->style }}</p>
                        </h1>

                        <div class="icon-circle w-10 h-10 flex justify-center items-center">
                          <i class="fas fa-tshirt"></i>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-12 mt-3">
                <div class="card-detail">
                    <div class="py-3 px-4 flex flex-row justify-between">
                        <h1 class="buyers">
                            <span class="buyer_">BUYER</span>
                            <p class="buyer__">{{ $data->buyer }}</p>
                        </h1>

                        <div class="icon-circle w-10 h-10 flex justify-center items-center">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
          <!-- end charts -->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card tabs-card">
            <div class="card-block p-0">
              <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link active" data-toggle="tab" href="#smv" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Update SMV/AP</span></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#ppm" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Update PPM</span></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#worksheet" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Update Worksheet</span></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#trimcard" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Update Trimcard</span></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#tech" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Update Techpack</span></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link" data-toggle="tab" href="#all" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">All Update</span></a>
                    <div class="slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="smv" role="tabpanel">
                  <div class="last-update m-2">
                    <li class="list-group-item justify-content-between align-items-start">
                      @foreach ($data->qrcode_update_history->where('type','smv') as $item)
                      <div class="row mb-3">
                        <div class="col-12">
                          <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                            {{ $loop->iteration}}
                          </div>
                          <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                          <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_smv']) }}</span><br>
                          <b>{{$item->created_by}}</b><br>
                          <span class="remark_">Remark :</span><br>
                          <span>{{ $item->remark }}</span>
                        </div>
                      </div>
                      @endforeach
                    </li>
                  </div>
                </div>
                <div class="tab-pane" id="ppm" role="tabpanel">
                  <div class="last-update m-2">
                    <li class="list-group-item justify-content-between align-items-start">
                      @foreach ($data->qrcode_update_history->where('type','ppm') as $item)
                      <div class="row mb-3">
                        <div class="col-12">
                          <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                            {{ $loop->iteration}}
                          </div>
                          <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                          <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_ppm']) }}</span><br>
                          <b>{{$item->created_by}}</b><br>
                          <span class="remark_">Remark :</span><br>
                          <span>{{ $item->remark }}</span>
                        </div>
                      </div>
                      @endforeach
                    </li>
                  </div>
                </div>
                <div class="tab-pane" id="worksheet" role="tabpanel">
                  <div class="last-update">
                    <ol class="list-group list-group-numbered">
                      @foreach ($data->qrcode_update_history->where('type','work') as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">
                              <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span>
                              {{ \Carbon\Carbon::parse($item->updated_at,['remark_work']) }}
                            </div>
                            <b>{{$item->created_by}}</b>
                            <span>{{ $item->remark }}</span>
                          </div>
                        </li>
                      @endforeach
                    </ol>
                  </div>
                </div>
                <div class="tab-pane" id="trimcard" role="tabpanel">
                  trimcard
                </div>
                <div class="tab-pane" id="tech" role="tabpanel">
                  <div class="last-update m-2">
                    <li class="list-group-item justify-content-between align-items-start">
                      @foreach ($data->qrcode_update_history->where('type','techspech') as $item)
                      <div class="row mb-3">
                        <div class="col-12">
                          <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                            {{ $loop->iteration}}
                          </div>
                          <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                          <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_techspech']) }}</span><br>
                          <b>{{$item->created_by}}</b><br>
                          <span class="remark_">Remark :</span><br>
                          <span>{{ $item->remark }}</span>
                        </div>
                      </div>
                      @endforeach
                    </li>
                  </div>
                </div>
                <div class="tab-pane" id="all" role="tabpanel">

                  <div class="last-update m-2">
                    <li class="list-group-item justify-content-between align-items-start">
                      @foreach ($data->qrcode_update_history as $item)
                      <div class="row mb-3">
                        <div class="col-12">
                          <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                            {{ $loop->iteration}}
                          </div>
                          <b>{{$item->created_by}}</b><br>
                          <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}</span><br>
                          <span class="remark_">Remark :</span><br>
                          <span>{{ $item->remark }}</span>
                        </div>
                      </div>
                      @endforeach
                    </li>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion" id="accordionGroup">
        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div class="card-header accordion-effect" id="headingOne">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon fas fa-user-clock"></i>SMV / AP</div>
                <div class="last-update">
                  @if($data->smv != NULL)
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($item->updated_at,['remark_smv']) }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->smv != NULL)
                <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->smv) }}" width="100%" height="750"></iframe>
                @else
                <div class="alert alert-danger" role="alert">
                  Data Kosong!
                </div>
                @endif
            </div>
          </div>
        </div>

        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <div class="card-header accordion-effect" id="headingTwo">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon fas fa-users"></i></i>PPM</div>
                <div class="last-update">
                  @if($data->ppm != NULL)
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_ppm)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->ppm != NULL)
                <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->ppm) }}" width="100%" height="750"></iframe>
                @else
                <div class="alert alert-danger" role="alert">
                  Data Kosong!
                </div>
                @endif
            </div>
          </div>
        </div>

        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <div class="card-header accordion-effect" id="headingThree">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon3 fas fa-copy"></i>WORKSHEET</div>
                <div class="last-update">
                  @if($data->work != NULL)
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_work)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionGroup">
            <div class="card-body">
                @if($data->work != NULL)
                <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->work) }}" width="100%" height="750"></iframe>
                @else
                <div class="alert alert-danger" role="alert">
                  Data Kosong!
                </div>
                @endif
            </div>
          </div>
        </div>

        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <div class="card-header accordion-effect" id="headingFour">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon fas fa-credit-card"></i>TRIMCARD</div>
                <div class="last-update">
                @if($data->trimcard != NULL)
                <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_trimcard)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
                @else
                @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->trimcard != NULL)
              <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->trimcard) }}" width="100%" height="750"></iframe>
              @else
              <div class="alert alert-danger" role="alert">
                Data Kosong!
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
            <div class="card-header accordion-effect" id="headingfive">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon fas fa-pencil-ruler"></i>TECHPACK</div>
                <div class="last-update">
                @if($data->techspech != NULL)
                <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_techspech)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
                @else
                @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->techspech != NULL)
                <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->techspech) }}" width="100%" height="750"></iframe>
                @else
                <div class="alert alert-danger" role="alert">
                  Data Kosong!
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div> <!-- con-flu -->
  </section>
  <div class="row"></div>
</div>
@include('production.layouts.footer')
