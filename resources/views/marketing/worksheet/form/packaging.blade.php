@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
    <section class="content">
      <div class="container-fluid">
        @include('marketing.worksheet.partials.stepbar')
        <div class="row mt-4">
          <div class="col-12">
            <div class="cards p-4">
              @include('marketing.worksheet.form.packaging_folding')
              @include('marketing.worksheet.form.packaging_packing')
              @include('marketing.worksheet.form.packaging_moreinfo')
              <div class="row">
                <div class="col-12 justify-end gap-4 mt-3">
                  <a href="{{route('worksheet.measurement',$master_data->id)}}" class="btn-outline-grey-md w-130">Back</a>
                  <button data-toggle="modal" data-target="#modal-finish" class="btn-blue-md w-130">Finish</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modal-finish" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:470px">
            <div class="modal-content p-5" style="border-radius:10px">
              <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-center"> 
                    <i class="fas fa-check-circle fa-10x" style="color: #0CAE63;"></i>
                  </div>
                  <div class="d-flex justify-content-center mt-3"> 
                    <p class="title-16">Worksheet Creation is Successfull</p>
                  </div>
                  <div class="d-flex justify-content-center mt-3"> 
                    <a href="{{route('worksheet.sudah_beres',$master_data->id)}}" class="btn-blue-md btn-ok">OK</a>
                    <a href="{{route('worksheet.finish',$master_data->id)}}" class="btn-green-md btn-ok ml-3">View Details</a>
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
<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>
<script>
  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
  });
</script>
@endpush