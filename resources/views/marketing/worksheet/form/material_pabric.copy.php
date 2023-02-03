@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content f-poppins" >
  <div class="container-fluid">
    <center>
      <span class="label_worksheet">Material Fabric</span>sa
    </center> 
    @include('marketing.worksheet.partials.stepbar')
    <div class="row mt-4">
      <div class="col-12">
        <div class="cards px-4 py-4">
          <div class="row mt-2">
            <div class="col-12">
              <span class="ws-judul">Fabric Material List</span>
              <!-- <button type="button" class="ws-add-item ml-4" data-toggle="modal" data-target="#inac" title="Create">
                <span class="mr-2">Add Item</span>  
                <i class="fas fa-plus"></i>
              </button> -->
              @include('marketing.worksheet.partials.form-modal')
            </div>
          </div>
          <div class="row mt-3 scroll-y">
            <div class="col-12 text-center">
              <table class="table table-bordered table-striped no-wrap text-center">
                <thead>
                  <tr>
                      <th>Line</th>
                      <th>Desc1</th>
                      <th>Desc2</th>
                      <th>Color Way</th>
                      <th>Cutting Way</th>
                      <th>Part</th>
                      <th>Csp</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($master_data->material_fabric as $key => $value)
                  <tr>
                    <td>{{$value->line_cpnb}}</td>
                    <td>{{$value->material1}}</td>
                    <td>{{$value->material2}}</td>
                    <td>{{$value->colorway}}</td>
                    <td>{{$value->cutting_way}}</td>
                    <td>{{$value->port}}</td>
                    <td>{{$value->consumption}}</td>
                    <td>
                      <div class="container-ms-btn">
                        <button data-toggle="modal" data-target="#edit_detail-{{$value->id }}"  class="btn ms-btn-edit mr-1">Edit<i class="ml-3 fas fa-pencil-alt"></i></a>
                        <button data-toggle="modal" data-target="#details_inac-{{$value->id }}" class="btn ms-btn-details text-white">Details<i class="ml-3 fas fa-search"></i></button>
                        @include('marketing.worksheet.partials.modal-detail')
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @include('marketing.worksheet.partials.attention_cutting')
        </div>
      </div>
    </div>
    <div class="container" style="padding-top:10px;padding-bottom:20px">
      <a href="{{route('worksheet.breakdown',$master_data->id)}}" class="btn btn_back btn-sm title-navigate-next">Back <i class="fas fa-arrow-left icon_back"></i></i></a>
      <button type="submit" class="btn btn_next_biru btn-sm title-navigate-next">Next <i class="fas fa-arrow-right icon_next"></i></button>
      </form>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<!-- Foto sew -->
<script>
  function readURL_cutt(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.image-upload-wrap-cutt').hide();

      reader.onload = function (e) {
        $(".file-upload-image-cutt").attr("src", e.target.result);
        $(".file-upload-content-cutt").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload_cutt();
    }
  }

    function removeUpload_cutt() {
        $('.file-upload-input-cutt').replaceWith($('.file-upload-input-cutt').clone());
        $('.file-upload-content-cutt').hide();
        $('.image-upload-wrap-cutt').show();
      }
      $('.image-upload-wrap-cutt').bind('dragover', function () {
          $('.image-upload-wrap-cutt').addClass('image-dropping');
      });
      $('.image-upload-wrap-cutt').bind('dragleave', function () {
          $('.image-upload-wrap-cutt').removeClass('image-dropping');
      });
      $('.select2bs49').select2({
        theme: 'bootstrap4'
      });
      $('.select2bs45').select2({
        theme: 'bootstrap4'
      });
</script>
<!-- End Foto sew-->
@endpush
