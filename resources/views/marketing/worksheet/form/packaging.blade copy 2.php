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
    <section class="content f-poppins">
      <div class="container-fluid">
        <center>
          <span class="label_worksheet">Packaging</span>
        </center> 
        @include('marketing.worksheet.partials.stepbar')
        <div class="row mt-4">
          <div class="col-12">
            <div class="cards bg-card px-4 py-4">
              @include('marketing.worksheet.form.packaging_folding')
              @include('marketing.worksheet.form.packaging_packing')
              @include('marketing.worksheet.form.packaging_moreinfo')
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-finish" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                      <div class="d-flex justify-content-center"> 
                        <i class="fas fa-check-circle text-green fa-10x"></i>
                      </div>
                      <div class="d-flex justify-content-center mt-3"> 
                        <p class="font-weight-bold">Worksheet Creation is Successfull</p>
                      </div>
                      <div class="d-flex justify-content-center mt-3"> 
                        <a href="{{route('worksheet.po_list')}}" class="btn btn-primary btn-ok">OK</a>
                        <a href="{{route('worksheet.finish',$master_data->id)}}" class="btn btn-success btn-ok ml-3">View Details</a>
                      </div>
                    </div>
                    <div class="modal-footer">
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-4">
          <a href="{{route('worksheet.measurement',$master_data->id)}}" class="btn btn_back btn-sm title-navigate-next">Back <i class="fas fa-arrow-left icon_back"></i></i></a>
          <a href="#" data-toggle="modal" data-target="#modal-finish" class="btn btn_next_biru btn-sm title-navigate-next">Finish <i class="fas fa-arrow-right icon_next"></i></a>
          <!-- <a href="" class="btn btn_next_biru btn-sm title-navigate-next">Finish <i class="fas fa-arrow-right icon_next"></i></a> -->

        </div>

      </div><!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")
<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left',
        '190px');
    });
</script>
@endpush