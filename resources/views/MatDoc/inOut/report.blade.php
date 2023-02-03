@extends("layouts.app")
@section("title","Report")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@push("sidebar")
    @include('MatDoc.inOut.partials.navbar')
@endpush

@section("content")
<section class="content monitoring">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <div class="cards-20 p-4">
          <div class="row">
            <div class="col-12">
              <div class="title-24-grey text-center">REPORT PENGELUARAN BARANG</div>
              <div class="justify-center mt-1 mb-3">
                <div class="border-100"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="title-sm">Select Month</div>
              <div class="input-group date mt-1 mb-3" id="report_date" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                  <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Month"/>
              </div>
            </div>
            <div class="col-12 justify-start gap-3">
              <a href="{{ route('in-out.reportExcel')}}" class="btn-green-sm no-wrap w-160"><i class="fs-18 mr-2 fas fa-file-excel"></i> Export Excel</a>
              <a href="{{ route('in-out.reportPDF')}}" class="btn-red-sm no-wrap w-160"><i class="fs-18 mr-2 fas fa-file-pdf"></i> Export Pdf</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push("scripts")
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'MMMM-YYYY',
      showButtonPanel: true
    })
  });
</script>
@endpush