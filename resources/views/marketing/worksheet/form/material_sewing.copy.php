@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content f-poppins">
    <div class="container-fluid">
      <center>
        <span class="label_worksheet">Material Sewing</span>
      </center> 
      @include('marketing.worksheet.partials.stepbar')
      <!-- <div class="row">
        @include('marketing.worksheet.partials.product_detail')
        @include('marketing.worksheet.partials.variant')
      </div> -->

      <div class="row mt-4">
        <div class="col-12">
          <div class="cards bg-card px-4 py-4">

            <div class="row mt-2">
              <div class="col-12">
                <div class="ws-judul">Material List</div>
                <span class="ms-sub-judul mt-3 mb-1">Sewing - Thread</span>
                <!-- <button type="button" class="ws-add-item ml-4" data-toggle="modal" data-target="#add_sewing_thread" title="Create">
                  <span class="mr-2">Add Item</span>  
                  <i class="fas fa-plus"></i>
                </button> -->
                @include('marketing.worksheet.partials.material_sewing.sewing.form-modal-add')
              </div>
            </div>
            <div class="row mt-3 mb-3 scroll-y">
              <div class="col-12 text-center">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                        <th>Line</th>
                        <th>Desc1</th>
                        <th>Desc2</th>
                        <th>Color Way</th>
                        <th>Color Name</th>
                        <th>Csp</th>
                        <th>Part</th>
                        <th>Add.Desc</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing as $key => $value)
                    <tr>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->port}}</td>
                      <td>{{$value->description}}</td>
                      <td>
                        <div class="container-ms-btn">
                          <button data-toggle="modal" data-target="#edit_detail-{{$value->id }}"  class="btn ms-btn-edit mr-1">Edit<i class="ml-3 fas fa-pencil-alt"></i></a>
                          <button data-toggle="modal" data-target="#details_inac-{{$value->id }}" class="btn ms-btn-details text-white">Details<i class="ml-3 fas fa-search"></i></button>
                          @include('marketing.worksheet.partials.material_sewing.sewing.modal-detail')
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <span class="ms-sub-judul mt-3 mb-1">INAC ( Accesoris )</span>
                <!-- <button type="button" class="ws-add-item ml-4" data-toggle="modal" data-target="#inac_add" title="Create">
                  <span class="mr-2">Add Item</span>  
                  <i class="fas fa-plus"></i>
                </button> -->
                @include('marketing.worksheet.partials.material_sewing.inac.form-modal-add')
              </div>
            </div>
            <div class="row mt-3 mb-3 scroll-y">
              <div class="col-12 text-center">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                        <th>Line</th>
                        <th>Desc1</th>
                        <th>Desc2</th>
                        <th>Color Way</th>
                        <th>Color Name</th>
                        <th>Csp</th>
                        <th>Part</th>
                        <th>Add.Desc</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_inac as $key => $value)
                    <tr>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->part}}</td>
                      <td>{{$value->description}}</td>
                      <td>
                        <div class="container-ms-btn">
                          <button data-toggle="modal" data-target="#inac_edit-{{$value->id }}"  class="btn ms-btn-edit mr-1">Edit<i class="ml-3 fas fa-pencil-alt"></i></a>
                          <button data-toggle="modal" data-target="#inac_detail-{{$value->id }}" class="btn ms-btn-details text-white">Details<i class="ml-3 fas fa-search"></i></button>
                          @include('marketing.worksheet.partials.material_sewing.inac.modal-detail')
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <span class="ms-sub-judul mt-3 mb-1">Packaging</span>
                <!-- <button type="button" class="ws-add-item ml-4" data-toggle="modal" data-target="#packaging_add" title="Create">
                  <span class="mr-2">Add Item</span>  
                  <i class="fas fa-plus"></i>
                </button> -->
                @include('marketing.worksheet.partials.material_sewing.packaging.form-modal-add')
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
                        <th>Detail</th>
                        <th>Consumption</th>
                        <th>Add.Desc</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_packaging as $key => $value)
                    <tr>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->item}}</td>
                      <td>{{$value->description}}</td>
                      <td>{{$value->detail}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->description}}</td>
                      <td>
                        <div class="container-ms-btn">
                          <button data-toggle="modal" data-target="#packaging_edit-{{$value->id }}"  class="btn ms-btn-edit mr-1">Edit<i class="ml-3 fas fa-pencil-alt"></i></a>
                          <button data-toggle="modal" data-target="#packaging_detail-{{$value->id }}" class="btn ms-btn-details text-white">Details<i class="ml-3 fas fa-search"></i></button>
                          @include('marketing.worksheet.partials.material_sewing.packaging.modal-detail')
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="ws-judul-2">Create Attention</div>
              </div>
            </div>
            @include('marketing.worksheet.partials.material_sewing.material_sewing_detail')
            <br>
          </div>
        </div>
      </div>

      <div class="container" style="padding-top:10px">
        <a href="{{route('worksheet.material_pabric',$master_data->id)}}" class="btn btn_back btn-sm title-navigate-next">Back <i class="fas fa-arrow-left icon_back"></i></i></a>
        <button type="submit" class="btn btn_next_biru btn-sm title-navigate-next">Next <i class="fas fa-arrow-right icon_next"></i></button>
      </form>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <br>
@endsection

@push("scripts")
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
});
</script>

<!-- Foto Trim -->
<script>
  function readURL_trim(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.image-upload-wrap-trim').hide();

      reader.onload = function (e) {
        $(".file-upload-image-trim").attr("src", e.target.result);
        $(".file-upload-content-trim").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload_trim();
    }
  }

    function removeUpload_trim() {
        $('.file-upload-input-trim').replaceWith($('.file-upload-input-trim').clone());
        $('.file-upload-content-trim').hide();
        $('.image-upload-wrap-trim').show();
      }
      $('.image-upload-wrap-trim').bind('dragover', function () {
          $('.image-upload-wrap-trim').addClass('image-dropping');
      });
      $('.image-upload-wrap-trim').bind('dragleave', function () {
          $('.image-upload-wrap-trim').removeClass('image-dropping');
      });
</script>
<!-- End Foto Trim-->

<!-- Foto Iron -->
<script>
  function readURL_iron(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.image-upload-wrap-iron').hide();

      reader.onload = function (e) {
        $(".file-upload-image-iron").attr("src", e.target.result);
        $(".file-upload-content-iron").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload_iron();
    }
  }

    function removeUpload_iron() {
        $('.file-upload-input-iron').replaceWith($('.file-upload-input-iron').clone());
        $('.file-upload-content-iron').hide();
        $('.image-upload-wrap-iron').show();
      }
      $('.image-upload-wrap-iron').bind('dragover', function () {
          $('.image-upload-wrap-iron').addClass('image-dropping');
      });
      $('.image-upload-wrap-iron').bind('dragleave', function () {
          $('.image-upload-wrap-iron').removeClass('image-dropping');
      });
</script>
<!-- End Foto Iron-->

<!-- Foto Label -->
<script>
  function readURL_label(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.image-upload-wrap-label').hide();

      reader.onload = function (e) {
        $(".file-upload-image-label").attr("src", e.target.result);
        $(".file-upload-content-label").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload_label();
    }
  }

    function removeUpload_label() {
        $('.file-upload-input-label').replaceWith($('.file-upload-input-label').clone());
        $('.file-upload-content-label').hide();
        $('.image-upload-wrap-label').show();
      }
      $('.image-upload-wrap-label').bind('dragover', function () {
          $('.image-upload-wrap-label').addClass('image-dropping');
      });
      $('.image-upload-wrap-label').bind('dragleave', function () {
          $('.image-upload-wrap-label').removeClass('image-dropping');
      });
</script>
<!-- End Foto Label-->

<!-- Foto sew -->
<script>
  function readURL_sew(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.image-upload-wrap-sew').hide();

      reader.onload = function (e) {
        $(".file-upload-image-sew").attr("src", e.target.result);
        $(".file-upload-content-sew").show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload_sew();
    }
  }

    function removeUpload_sew() {
        $('.file-upload-input-sew').replaceWith($('.file-upload-input-sew').clone());
        $('.file-upload-content-sew').hide();
        $('.image-upload-wrap-sew').show();
      }
      $('.image-upload-wrap-sew').bind('dragover', function () {
          $('.image-upload-wrap-sew').addClass('image-dropping');
      });
      $('.image-upload-wrap-sew').bind('dragleave', function () {
          $('.image-upload-wrap-sew').removeClass('image-dropping');
      });
      $('.select2bs_sewing1').select2({
        theme: 'bootstrap4'
      });
      $('.select2bs_sewing2').select2({
        theme: 'bootstrap4'
      });

      $('.select2bs_inac1').select2({
        theme: 'bootstrap4'
      });
      $('.select2bs_inac2').select2({
        theme: 'bootstrap4'
      });

      $('.select2bs_packing1').select2({
        theme: 'bootstrap4'
      });
      $('.select2bs_packing2').select2({
        theme: 'bootstrap4'
      });

</script>
@endpush
