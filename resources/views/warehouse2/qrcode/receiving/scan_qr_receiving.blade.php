@extends("layouts.app")
@section("title","Receiving Material")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('scan-delivery') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Status Delivery</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('scan-receiving') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Status Receiving</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="title-24 text-center">Receiving Material</div>
          <div class="col-12 mt-4">
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                  <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
              </div>
              <input type="text" class="form-control border-input" placeholder="input here...">
            </div>
          </div>
          <div class="col-12 justify-center mt-4">
            <a href="{{ route('warehouse-delivery') }}" class="btn-blue-sm" style="width:320px">Submit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")


@endpush