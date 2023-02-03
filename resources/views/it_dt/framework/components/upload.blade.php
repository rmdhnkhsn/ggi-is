@extends("layouts.app")
@section("title","Components Upload Document")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Upload Document</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Upload Images</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fileUploads">
                                <div class="imageUploadWrap">
                                    <i class="iconUpload fas fa-upload"></i>
                                    <button class="d-none" type="button" id="images"
                                        onclick="$('.fileUploadInput').trigger('click')">Select Image</button>
                                    <input class="fileUploadInput" type='file' id="images" name=""
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="dragText">
                                        <h5>Or Drop Images Here</h5>
                                    </div>
                                </div>
                                <div class="fileUploadContent">
                                    <img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                                    <button type="button" onclick="removeUpload()" class="removeImage">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="fileUploads"&gt;
    &lt;div class="imageUploadWrap"&gt;
        &lt;i class="iconUpload fas fa-upload"&gt;&lt;/i&gt;
        &lt;button class="d-none" type="button" id="images"
            onclick="$('.fileUploadInput').trigger('click')"&gt;Select Image&lt;/button&gt;
        &lt;input class="fileUploadInput" type='file' id="images" name=""
            onchange="readURL(this);" accept="image/*" /&gt;
        &lt;div class="dragText"&gt;
            &lt;h5&gt;Or Drop Images Here&lt;/h5&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="fileUploadContent"&gt;
        &lt;img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" /&gt;
        &lt;button type="button" onclick="removeUpload()" class="removeImage"&gt;
            &lt;i class="fas fa-times"&gt;&lt;/i&gt;
        &lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Upload File</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Your Document</div>
                            <div class="customFile mt-1">
                                <input type="file" class="customFileInput" id="customFile" name="" value="">
                                <label class="customFileLabelsBlue" for="customFile">
                                    <span class="chooseFile"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-sm"&gt;Your Document&lt;/div&gt;
&lt;div class="customFile mt-1 mb-3"&gt;
    &lt;input type="file" class="customFileInput" id="customFile" name="" value=""&gt;
    &lt;label class="customFileLabelsBlue" for="customFile"&gt;
        &lt;span class="chooseFile"&gt;&lt;/span&gt;
    &lt;/label&gt;
&lt;/div&gt;

// script
&lt;script&gt;
    $(".customFileInput").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>

<!-- UPLOAD FILE -->
<script>
    $(".customFileInput").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });
</script>

@endpush        