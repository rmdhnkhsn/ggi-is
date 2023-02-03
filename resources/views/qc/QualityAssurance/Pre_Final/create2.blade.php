@extends("layouts.flat_breadcrumb.app")
@section("title","CREATE PRE-FINAL")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<style>
  .content-wrapper {
    background: white !important
  }
</style>
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <form action="">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cardFlat p-4">
            <div class="row">
              <div class="col-12">
                <div class="title-24-dark mb-4">Inspection Info</div>
              </div>
              <div class="col-md-4">
                <div class="title-sm">Inspect Date</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control borderInput" name="" id="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="title-sm">Shipment Periode / TOD</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control borderInput" name="" id="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="title-sm">CTN No</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input CTN No">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Sample Size</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Sample Size">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Order</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Order">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Pass</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Pass">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Fail</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Fail">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Check (Pcs)</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Check (Pcs)">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Check (Ctn)</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Check (Ctn)">
              </div>
              <div class="col-12">
                <div class="title-sm">Inspect Result</div>
                <div class="flexx gap-5 mt-1 mb-3">
                  <div class="wrapperRadio w-100">
                    <input type="radio" name="result" value="" class="radioGreen" id="PASS">
                    <label for="PASS" class="optionGreen check">
                      <span class="descGreen">PASS</span>
                    </label>
                  </div>
                  <div class="wrapperRadio w-100">
                    <input type="radio" name="result" value="" class="radioRed" id="FAIL">
                    <label for="FAIL" class="optionRed check">
                      <span class="descRed">FAIL</span>
                    </label>
                  </div>
                </div>  
              </div>
            </div>
            <div class="row">
              <div class="col-12 flex gap-4">
                <a href="{{ route('qa.inline.index')}}" class="btnSoftBlue w-100">Discard</a>
                <button type="submit" class="btn-blue-md saveInspect w-100">Save Inspection</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script>
  $('.saveInspect').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Inspection Created',
      text: 'Data Inspection Ditambahkan',
      showConfirmButton: false,
      timer: 5000
    })
  });
</script>
<script type="text/javascript">
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush