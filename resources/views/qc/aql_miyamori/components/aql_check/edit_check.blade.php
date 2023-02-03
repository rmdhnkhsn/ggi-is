@extends("layouts.app")
@section("title","EDIT CHECK")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content aql">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-6 justify-center">
        <div class="cardPart bg-white p-4" style="max-width:404px">
          <div class="row">
            <div class="col-12 mb-3">
              <div class="title-20-grey">INSPECTION INFO</div>
            </div>
            <div class="col-12">
              <div class="title-sm">品質責任者 / QC SUPERVISOR</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Name Spv">
            </div>
            <div class="col-12">
              <div class="title-sm">検査員 / INSPECTOR</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Name Inspector">
            </div>
            <div class="col-12">
              <div class="title-sm">シーズン / SEASON</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Season">
            </div>
            <div class="col-12">
              <a href="" class="btn-blue-md w-100">Update</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="{{url('images/icon/qc/aql/aql_list.svg')}}" class="bg-create">
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")


@endpush