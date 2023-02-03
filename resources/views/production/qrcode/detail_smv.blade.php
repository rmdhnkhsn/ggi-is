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
                <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <div class="card-header accordion-effect" id="headingOne">
                    <div class="title-headers flex flex-row justify-between">
                      <div class="acc-title"><i class="tablist-icon fas fa-user-clock"></i>SMV / AP</div>
                      <div class="last-update">
                        @if($data->smv != NULL)
                        <i class="tablist-icon2 far fa-clock"></i> {{ now()->parse($data->updated_at_smv)->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('DD-MM-YYYY') }}
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
            </div>
          </div>
        </div>
    </div>
  </section> 
@endsection

@push("scripts")

@endpush
