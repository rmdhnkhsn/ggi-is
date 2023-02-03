@extends("layouts.app")
@section("title","QR-code")
@push("styles")
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style2.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style-form.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/poppins.css') }}">

@endpush

@push("sidebar")
  @include('production.layouts.navbar3')

@endpush


@section("content")
  <section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-1 mb-3">
            <a href="{{ route('qrcode.index')}}" class="btn btn-block btn-secondary btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-long-arrow-alt-left"></i>   Back</a>
          </div>
        </div>
        <div class="row">
          <div class="card-body">
            <div class="accordion" id="accordionGroup">
              <div class="card">
                <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                  <div class="card-header accordion-effect" id="headingfive">
                    <div class="title-headers flex flex-row justify-between">
                      <div class="acc-title"><i class="tablist-icon fas fa-pencil-ruler"></i>TECHPACK</div>
                      <div class="last-update">
                      @if($data->techspech != NULL)
                      <i class="tablist-icon2 far fa-clock"></i> {{ now()->parse($data->updated_at_techspech)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
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
          </div>
        </div>
    </div>
  </section>  
@endsection

@push("scripts")

@endpush


