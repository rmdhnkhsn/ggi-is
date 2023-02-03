@extends("layouts.flat_breadcrumb.app")
@section("title","QA REPORT")
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
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<style>
.nav-tabs {
    border-bottom: none !important;
  }
</style>
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardFlat pt-4">
          <div class="title-32-grey text-center py-4">QUALITY ASSURANCE</div>
          <ul class="nav nav-tabs blue-md-tabs2 mt-4" id="myTab" role="tablist">
            <li class="nav-item-show">
              <a href="{{ route('qa.inline.index')}}" class="nav-link"></i>INLINE</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.prefinal.index')}}" class="nav-link"></i>PRE-FINAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.factory.index')}}" class="nav-link"></i>FACTORY AUDIT</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.inspection.index')}}" class="nav-link"></i>FINAL INSPECTION</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.report.index')}}" class="nav-link active"></i>REPORT</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl-10 mx-auto">
        <div class="cardFlat p-4">
          <div class="row">
            <div class="col-12 mb-4">
              <div class="title-24-dark2 no-wrap">REPORT QUALITY ASSURANCE</div>
            </div>
            <div class="col-md-6">
              <div class="title-sm">Date</div>
              <div class="input-group dates mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="title-sm">Select Buyer</div>
              <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                      <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                      <option selected disabled>Select Buyer</option>
                      <option name="Ajay Kapoor">Ajay Kapoor</option>    
                      <option name="Ajay Sugandi">Ajay Sugandi</option>    
                  </select>
              </div>
            </div>
            <div class="col-12">
              <div class="title-sm">QA Category Process</div>
              <div class="cards-scroll scrollX flex gap-4 mt-1 mb-3" id="scroll-bar-sm">
                <div class="wrapperRadio w-100" style="min-width:160px">
                  <input type="radio" name="category" value="" class="radioBlue" id="INLINE">
                  <label for="INLINE" class="optionBlue check">
                    <span class="descBlue fw-500">INLINE</span>
                  </label>
                </div>
                <div class="wrapperRadio w-100" style="min-width:160px">
                  <input type="radio" name="category" value="" class="radioBlue" id="PRE-FINAL">
                  <label for="PRE-FINAL" class="optionBlue check">
                    <span class="descBlue fw-500">PRE-FINAL</span>
                  </label>
                </div>
                <div class="wrapperRadio w-100" style="min-width:160px">
                  <input type="radio" name="category" value="" class="radioBlue" id="FACTORY_AUDIT">
                  <label for="FACTORY_AUDIT" class="optionBlue check">
                    <span class="descBlue fw-500">FACTORY AUDIT</span>
                  </label>
                </div>
                <div class="wrapperRadio w-100" style="min-width:160px">
                  <input type="radio" name="category" value="" class="radioBlue" id="FINAL_INSPECTION">
                  <label for="FINAL_INSPECTION" class="optionBlue check">
                    <span class="descBlue fw-500">FINAL INSPECTION</span>
                  </label>
                </div>
              </div>  
            </div>
            <div class="col-12">
              <a href="{{ route('inline.report.index')}}" class="btn-blue-md">GENERATE REPORT</a>
              <!-- <a href="{{ route('prefinal.report.index')}}" class="btn-blue-md">GENERATE REPORT</a> -->
              <!-- <a href="{{ route('factory.report.index')}}" class="btn-blue-md">GENERATE REPORT</a> -->
              <!-- <a href="{{ route('inspection.report.index')}}" class="btn-blue-md">GENERATE REPORT</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>


<script type="text/javascript">
  $(function() {
    $('input[name="daterange"]').daterangepicker();
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush