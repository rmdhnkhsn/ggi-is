@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <form action="{{route('shade.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="report_id" class="span10" name="report_id" value="{{ $data->id }}">
                <div class="row">
                  <div class="col-lg-6 col-6 mt-3">
                    <span class="general-identity-title">Buyer</span>
                    <div class="field2 mt-2">
                      <input type="text" id="buyer" name="buyer" value="{{ $buyer->name }}" placeholder="Insert Color">
                    </div>
                  </div>
                  <div class="col-lg-6 col-6 mt-3">
                    <span class="general-identity-title">NO PO</span>
                    <div class="field2 mt-2">
                      <input type="text" id="no_po" name="no_po" value="" placeholder="Insert Color">
                    </div>
                  </div>
                  <div class="col-lg-6 col-6 mt-3">
                    <span class="general-identity-title">Color</span>
                    <div class="field2 mt-2">
                      <input type="text" id="color" name="color" value="{{ $data->color }}" placeholder="Insert Color">
                    </div>
                  </div>
                  <div class="col-lg-6 col-6 mt-3">
                    <span class="general-identity-title">Arrival Date</span>
                    <div class="field2 mt-2">
                      <input type="date" id="ad" name="ad" value="{{ $data->date }}" placeholder="Insert Date">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="general-identity-title">Quality Material</span>
                    <div class="fileUploads mt-1">
                      <div class="imageUploadWrap">
                        <i class="iconUpload fas fa-upload"></i>
                        <button class="d-none" type="button" id="images" onclick="$('.fileUploadInput').trigger('click')">Select Image</button>
                        <input class="fileUploadInput" type='file' id="images" name="file" onchange="readURL(this);" accept="image/*" />
                        <div class="dragText">
                          <span>upload your file,<br/> or drop here</span>
                        </div>
                      </div>
                      <div class="fileUploadContent">
                        <img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                        <button type="button" onclick="removeUpload()" class="removeImage"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 justify-end" style="padding-top:25px;">
                    <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                  </div>
                </div>
              </form>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.imageUploadWrap').hide();

            reader.onload = function (e) {
                $(".fileUploadImg").attr("src", e.target.result);
                $(".fileUploadContent").show();
            };
            reader.readAsDataURL(input.files[0]);
            // $("#frmSubmit").submit();

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.fileUploadInput').replaceWith($('.fileUploadInput').clone());
        $('.fileUploadContent').hide();
        $('.imageUploadWrap').show();
    }
    $('.imageUploadWrap').bind('dragover', function () {
        $('.imageUploadWrap').addClass('image-dropping');
    });
    $('.imageUploadWrap').bind('dragleave', function () {
        $('.imageUploadWrap').removeClass('image-dropping');
    });
</script>
@endpush