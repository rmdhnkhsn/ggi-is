@extends("layouts.app")
@section("title","QR-code")
@push("styles")
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style2.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style-form.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/poppins.css') }}">
<link rel="stylesheet" href="/path/to/mediaelementplayer.min.css">
<link rel="stylesheet" href="/path/to/dist/speed/speed.min.css">
@endpush

@push("sidebar")
  @include('production.layouts.navbar3')

@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-lg-6 ml-auto">
          <div id="containers-card">
            <div class="product-image">
              <img src="{{ asset('storage/'.$data->foto) }}" class="image-card" alt="">
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
                @if($data->ppm != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> Document PPM</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3 mb-2"></i>Document PPM</li>
                @endif
                @if($data->ppm_date != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i>&nbsp;{{ $data->ppm_date }}</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3"></i>Due Date</li>
                @endif
                @if($data->ppm_videos != NULL)
                <li class="text-true font-light"><i class="fas fa-check mr-2 mb-2"></i> PPM Videos</li>
                @else
                <li class="text-false font-light"><i class="fas fa-times mr-3"></i>PPM Videos</li>
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

      <details class="accord-update">
        <summary class="fw-6">Last Update Document</summary>
        <div class="cards-scroll p-3">
          <ul class="nav nav-tabs qr-md-tabs" role="tablist">
            <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#smv" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">SMV/AP</span></a>
                <div class="qr-slide"></div>
            </li>              
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#worksheet" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Worksheet</span></a>
                <div class="qr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#trimcard" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Trimcard</span></a>
                <div class="qr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#tech" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">Techpack</span></a>
                <div class="qr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#ppm" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">PPM</span></a>
                <div class="qr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#ppm_videos" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">PPM Videos</span></a>
                <div class="qr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#all" role="tab"><i class="tablist-icon-update far fa-clock"></i><span class="title-update">All Update</span></a>
                <div class="qr-slide"></div>
            </li>
            
          </ul>
          <div class="tab-content card-block">
            <div class="tab-pane active" id="smv" role="tabpanel">
              <div class="last-update m-2">
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','smv') as $item)
                  <div class="row  mb-3 mr-3">
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
            <div class="tab-pane" id="worksheet" role="tabpanel">
              <div class="last-update m-2">
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','worksheet') as $item)
                  <div class="row  mb-3 mr-3">
                    <div class="col-12">
                      <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                        {{ $loop->iteration}}
                      </div>
                      <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                      <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_work']) }}</span><br>
                      <b>{{$item->created_by}}</b><br>
                      <span class="remark_">Remark :</span><br>
                      <span>{{ $item->remark }}</span>
                    </div>
                  </div>
                  @endforeach
                </li>
              </div>
            </div>
            <div class="tab-pane" id="trimcard" role="tabpanel">
              <div class="last-update m-2">
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','trimcard') as $item)
                  <div class="row mb-3 mr-3">
                    <div class="col-12">
                      <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                        {{ $loop->iteration}}
                      </div>
                      <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                      <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_trimcard']) }}</span><br>
                      <b>{{$item->created_by}}</b><br>
                      <span class="remark_">Remark :</span><br>
                      <span>{{ $item->remark }}</span>
                    </div>
                  </div>
                  @endforeach
                </li>
              </div>
            </div>
            <div class="tab-pane" id="tech" role="tabpanel">
              <div class="last-update m-2">
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','techpack') as $item)
                  <div class="row mb-3 mr-3">
                    <div class="col-12">
                      <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                        {{ $loop->iteration}}
                      </div>
                      <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                      <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_techpack']) }}</span><br>
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
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','ppm') as $item)
                  <div class="row  mb-3 mr-3">
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
            <div class="tab-pane" id="ppm_videos" role="tabpanel">
              <div class="last-update m-2">
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history->where('type','ppm_videos') as $item)
                  <div class="row  mb-3 mr-3">
                    <div class="col-12">
                      <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                        {{ $loop->iteration}}
                      </div>
                      <!-- <span class="badge bg-primary rounded-pill">{{ $loop->iteration}}</span><br> -->
                      <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at,['remark_ppm_videos']) }}</span><br>
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
                <li class="list-group-items justify-content-between align-items-start">
                  @foreach ($data->qrcode_update_history as $item)
                  <div class="row mb-3 mr-3">
                    <div class="col-12">
                      <div class="icon-circle-2 w-15 h-15 flex justify-center items-center">
                        {{ $loop->iteration}}
                      </div>
                      <span class="type_all">{{$item->type}}</span><br>
                      <span class="remark_">{{ \Carbon\Carbon::parse($item->updated_at)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}</span><br>
                      <b>{{$item->created_by}}</b><br>
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
      </details>
      <div class="accordion" id="accordionGroup">
        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div class="card-header accordion-effect" id="headingOne">
              <div class="title-headers flex flex-row justify-between">
                <div class="acc-title"><i class="tablist-icon fas fa-user-clock"></i>SMV / AP</div>
                <div class="last-update">
                  @if($data->smv != NULL)
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_smv)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->smv != NULL)
                {{-- <iframe  id="pdf-js-viewer" src="/web/viewer.html?file={{ asset('storage/'.$data->smv) }}" width="100%" height="750"></iframe> --}}
                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$data->smv)) }}" width="100%" height="750"></iframe>
                
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
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_work)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionGroup">
            <div class="card-body">
                @if($data->work != NULL)
                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$data->work)) }}" width="100%" height="750"></iframe>
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
                <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_trimcard)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                @else
                @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->trimcard != NULL)
                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$data->trimcard)) }}" width="100%" height="750"></iframe>
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
                <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_techspech)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                @else
                @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->techspech != NULL)
                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$data->techspech)) }}" width="100%" height="750"></iframe>

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
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_ppm)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->ppm != NULL)
                 <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$data->ppm)) }}" width="100%" height="750"></iframe>
                @else
                <div class="alert alert-danger" role="alert">
                  Data Kosong!
                </div>
                @endif
            </div>
          </div>
        </div>

        <div class="card">
          <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
            <div class="card-header accordion-effect" id="headingVideos">
              <div class="title-headers flex flex-row justify-between"> 
                <div class="acc-title"><i class="tablist-icon fas  fa-play"></i></i>PPM Videos</div>
                <div class="last-update">
                  @if($data->ppm_videos != NULL)
                  <i class="tablist-icon2 far fa-clock"></i> {{ \Carbon\Carbon::parse($data->updated_at_ppm)->locale(config('app.locale'))->timezone(config('app.timezone'))->format('d-m-Y H:i:s') }}
                  @else
                  @endif
                </div>
              </div>
            </div>
          </a>
          <div id="collapseVideos" class="collapse" aria-labelledby="headingVideos" data-parent="#accordionGroup">
            <div class="card-body">
              @if($data->ppm_videos != NULL)
              {{-- <iframe  width="100%" height="480"  src="{{asset('/videos/naruto.mp4')}}" frameborder="0" allowfullscreen></iframe> --}}
              <video id="player"  width="100%" height="480" playsinline controls data-poster="/path/to/poster.jpg" allowfullscreen
                  allowtransparency allow="autoplay" >
                  <source src="{{asset('storage/'.$data->ppm_videos)}}" type="video/mp4" />
                  <!-- Captions are optional -->
                </video>
              
                 {{-- <iframe width="100%" height="480" src="{{asset('/videos/naruto.mp4')}}"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
           </iframe> --}}
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
@endsection

@push("scripts")
<script>
  <script src="/path/to/mediaelement-and-player.min.js"></script>
<!-- Include any languages from `build/lang` folder -->
<script src="/path/to/dist/speed/speed.min.js"></script>
<!-- Translation file for plugin (includes ALL languages available on player)-->
<script src="/path/to/dist/speed/speed-i18n.js"></script>
<script>
    var player = new MediaElementPlayer('playerId', {
        defaultSpeed: 0.75,
        // other configuration elements
    });
</script>

@endpush
