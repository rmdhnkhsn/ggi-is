@extends("layouts.app")
@section("title","QR-code")
@push("styles")
 <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style2.css') }}"> -->
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
        <div class="col-md-2">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-12 mr-auto ml-auto">
          <div class="card-qr">
            <div class="wrapper-qr">
              <center>
                {!! $qrcode !!}
              </center>
              <div class="name1">SCAN AND SEE A PREVIEW</div>
              <div class="name2">PRODUCTION SAMPLE</div>
              <div class="name3"><i class="tshirt fas fa-tshirt"></i>{{$data->style}}</div>
              <div class="name4"><i class="shopping fas fa-shopping-cart"></i>{{$data->buyer}}</div>
              <div class="buttons">
                <a href="{{route('qrcode.laporan', $id)}}" class="button-print"><i class="print fas fa-print"></i>Print QR-Code</a>
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
