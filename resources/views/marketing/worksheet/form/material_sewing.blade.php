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
<section class="content">
    <div class="container-fluid">
      @include('marketing.worksheet.partials.stepbar')
      <div class="row">
        <div class="col-12">
          <div class="cards p-4">
            <div class="row">
              <div class="col-12">
                <div class="ws-judul">Material List</div>
                <div class="ms-sub-judul mt-2 mb-3">Sewing - Thread</div>
                <table class="table tbl-content">
                  <thead>
                    <tr class="bg-thead">
                        <th>ACTION</th>
                        <th>LINE</th>
                        <th>DESC 1</th>
                        <th>DESC 2</th>
                        <th>COLOR WAY</th>
                        <th>COLOR NAME</th>
                        <th>CSP</th>
                        <th>PART</th>
                        <th>ADD DESC</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing as $key => $value)
                    <tr>
                      <td>
                        <div class="container-tbl-btn flex gap-2">
                          <button data-toggle="modal" data-target="#edit_detail-{{$value->id }}" class="btn-icon-yellow"><i class="fs-18 fas fa-pencil-alt"></i></button>
                          <button data-toggle="modal" data-target="#details_inac-{{$value->id }}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></button>
                          <a href="{{route('worksheet.ms_delete', $value->id)}}" class="btn-icon-red"><i class="fs-18 fas fa-trash"></i></a>
                          @include('marketing.worksheet.partials.material_sewing.sewing.modal-detail')
                        </div>
                      </td>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->port}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-12">
                <div class="borderlight2 my-4"></div>
              </div>
              <div class="col-12">
                <div class="ms-sub-judul mb-3">INAC ( Accesoris )</div>
                <table class="table tbl-content">
                  <thead>
                    <tr class="bg-thead">
                        <th>ACTION</th>
                        <th>LINE</th>
                        <th>DESC 1</th>
                        <th>DESC 2</th>
                        <th>COLOR WAY</th>
                        <th>COLOR NAME</th>
                        <th>CSP</th>
                        <th>PART</th>
                        <th>ADD DESC</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_inac as $key => $value)
                    <tr>
                      <td>
                        <div class="container-tbl-btn flex gap-2">
                          <button data-toggle="modal" data-target="#inac_edit-{{$value->id }}" class="btn-icon-yellow"><i class="fs-18 fas fa-pencil-alt"></i></button>
                          <button data-toggle="modal" data-target="#inac_detail-{{$value->id }}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></button>
                          <a href="{{route('worksheet.inac_delete', $value->id)}}" class="btn-icon-red"><i class="fs-18 fas fa-trash"></i></a>
                          @include('marketing.worksheet.partials.material_sewing.inac.modal-detail')
                        </div>
                      </td>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->part}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-12">
                <div class="borderlight2 my-4"></div>
              </div>
              <div class="col-12">
                <div class="ms-sub-judul mb-3">Packaging</div>
                <table class="table tbl-content">
                  <thead>
                    <tr class="bg-thead">
                        <th>ACTION</th>
                        <th>LINE</th>
                        <th>DESC </th>
                        <th>DETAIL</th>
                        <th>CONSUMPTION</th>
                        <th>ADD DESC</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_packaging as $key => $value)
                    <tr>
                      <td>
                        <div class="container-tbl-btn flex gap-2">
                          <button data-toggle="modal" data-target="#packaging_edit-{{$value->id }}" class="btn-icon-yellow"><i class="fs-18 fas fa-pencil-alt"></i></button>
                          <button data-toggle="modal" data-target="#packaging_detail-{{$value->id }}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></button>
                          <a href="{{route('worksheet.packaging_delete', $value->id)}}" class="btn-icon-red"><i class="fs-18 fas fa-trash"></i></a>
                          @include('marketing.worksheet.partials.material_sewing.packaging.modal-detail')
                        </div>
                      </td>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->item}}</td>
                      <td>{{$value->detail}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="cards p-4">
            <form action="{{ route('worksheet.detail_store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
              @include('marketing.worksheet.partials.material_sewing.detail.sewing')
              @include('marketing.worksheet.partials.material_sewing.detail.label')
              @include('marketing.worksheet.partials.material_sewing.detail.ironing')
              @include('marketing.worksheet.partials.material_sewing.detail.trimming')
              <div class="justify-end gap-4 mt-4">
                <a href="{{route('worksheet.material_pabric',$master_data->id)}}" class="btn-outline-grey-md w-130">Back</a>
                <button type="submit" class="btn-blue-md">Next & Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
@endsection

@push("scripts")
<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>

<script>
  var konten = document.getElementById("attention_sewing");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  var konten = document.getElementById("attention_label");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  var konten = document.getElementById("attention_ironing");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  var konten = document.getElementById("attention_trimming");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
</script>
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
