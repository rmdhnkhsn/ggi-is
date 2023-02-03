@php
    $attention_sewing="";
    $sewing_guide="";
    $sewing_image="";
    $sewing_image2="";
    $sewing_image3="";
    $sewing_image4="";
    $sewing_image5="";
    $sewing_image6="";
    $sewing_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_sewing==null?:$attention_sewing=$master_data->material_sewing_detail->attention_sewing;
        $master_data->material_sewing_detail->sewing_guide==null?:$sewing_guide=$master_data->material_sewing_detail->sewing_guide;
        $master_data->material_sewing_detail->sewing_image==null?:$sewing_image=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image);
        $master_data->material_sewing_detail->sewing_image2==null?:$sewing_image2=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image2);
        $master_data->material_sewing_detail->sewing_image3==null?:$sewing_image3=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image3);
        $master_data->material_sewing_detail->sewing_image4==null?:$sewing_image4=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image4);
        $master_data->material_sewing_detail->sewing_image5==null?:$sewing_image5=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image5);
        $master_data->material_sewing_detail->sewing_image6==null?:$sewing_image6=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image6);
        $master_data->material_sewing_detail->sewing_pdf==null?:$sewing_pdf=$master_data->material_sewing_detail->sewing_pdf;
    }
    @endphp
<div class="row mt-5">
    <div class="col-12">
        <div class="ws-judul">Sewing</div>
    </div>
</div>
<div class="row">
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image">
                <center><i class="icon-upload-sewing_image fas fa-upload"></i></center>
                <button class="file-upload-btn-sewing_image" type="button" id="sewing_image"
                    onclick="$('.file-upload-input-sewing_image').trigger('click')">Select Image</button>
                <input class="file-upload-input-sewing_image" type='file' id="sewing_image" name="sewing_image"
                    onchange="readURL_sewing_image(this);" accept="image/*" />
                <div class="drag-text-sewing_image">
                    <h5>Or Drop Images Here</h5>
                </div>
            </div>
            <div class="file-upload-content-sewing_image">
                <img class="file-upload-image-sewing_image"
                    src="{{$sewing_image}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image2">
                <button class="file-upload-btn-sewing_image2" type="button" id="sewing_image2" name="sewing_image2"
                    onclick="$('.file-upload-input-sewing_image2').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-sewing_image2" type='file' id="sewing_image2" name="sewing_image2" value=""
                    onchange="readURL_sewing_image2(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-sewing_image2">
                <img class="file-upload-image-sewing_image2"
                    src="{{$sewing_image2}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image2()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image3">

                <button class="file-upload-btn-sewing_image3" type="button" id="sewing_image3" name="sewing_image3"
                    onclick="$('.file-upload-input-sewing_image3').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-sewing_image3" type='file' id="sewing_image3" name="sewing_image3" value=""
                    onchange="readURL_sewing_image3(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-sewing_image3">
                <img class="file-upload-image-sewing_image3"
                    src="{{$sewing_image3}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image3()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image4">

                <button class="file-upload-btn-sewing_image4" type="button" id="sewing_image4" name="sewing_image4"
                    onclick="$('.file-upload-input-sewing_image4').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-sewing_image4" type='file' id="sewing_image4" name="sewing_image4" value=""
                    onchange="readURL_sewing_image4(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-sewing_image4">
                <img class="file-upload-image-sewing_image4"
                    src="{{$sewing_image4}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image4()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image5">

                <button class="file-upload-btn-sewing_image5" type="button" id="sewing_image5" name="sewing_image5"
                    onclick="$('.file-upload-input-sewing_image5').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-sewing_image5" type='file' id="sewing_image5" name="sewing_image5" value=""
                    onchange="readURL_sewing_image5(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-sewing_image5">
                <img class="file-upload-image-sewing_image5"
                    src="{{$sewing_image5}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image5()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-sewing_image6">

                <button class="file-upload-btn-sewing_image6" type="button" id="sewing_image6" name="sewing_image6"
                    onclick="$('.file-upload-input-sewing_image6').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-sewing_image6" type='file' id="sewing_image6" name="sewing_image6" value=""
                    onchange="readURL_sewing_image6(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-sewing_image6">
                <img class="file-upload-image-sewing_image6"
                    src="{{$sewing_image6}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_sewing_image6()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-6">
        <span class="ws-sub-title">Attention Sewing</span>
        <div class="ws-message mt-2">
            <textarea placeholder="Write youre attention Sewing.." name="attention_sewing" id="attention_sewing" value="" style="height:160px">{{$attention_sewing}}</textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <span class="ws-sub-title">Sewing Guide</span>
        <div class="ws-message mt-2">
            <textarea placeholder="Write youre Sewing guide.." name="sewing_guide" id="sewing_guide" value="" style="height:160px">{{$sewing_guide}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <span class="ws-sub-title">Sewing File</span>
        <div class="custom-file mt-2">
            <input type="file" class="custom-file-input" id="packing_file_guide" name="sewing_pdf" value="" onchange="submit_form_packing()">
            <label class="custom-file-labels" for="customFile">
                <span class="choose-file">{{$sewing_pdf}}</span></label>
        </div>
    </div>
</div>

@push("scripts")
@if ($sewing_image!=="")
<script>
    $(".file-upload-content-sewing_image").show();
    $('.image-upload-wrap-sewing_image').hide();
</script>
@endif
@if ($sewing_image2!=="")
<script>
    $(".file-upload-content-sewing_image2").show();
    $('.image-upload-wrap-sewing_image2').hide();
</script>
@endif
@if ($sewing_image3!=="")
<script>
    $(".file-upload-content-sewing_image3").show();
    $('.image-upload-wrap-sewing_image3').hide();
</script>
@endif
@if ($sewing_image4!=="")
<script>
    $(".file-upload-content-sewing_image4").show();
    $('.image-upload-wrap-sewing_image4').hide();
</script>
@endif
@if ($sewing_image5!=="")
<script>
    $(".file-upload-content-sewing_image5").show();
    $('.image-upload-wrap-sewing_image5').hide();
</script>
@endif
@if ($sewing_image6!=="")
<script>
    $(".file-upload-content-sewing_image6").show();
    $('.image-upload-wrap-sewing_image6').hide();
</script>
@endif

<script>
    function readURL_sewing_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image").attr("src", e.target.result);
                $(".file-upload-content-sewing_image").show();
                $('.image-title').html(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image();
        }
    }

    function removeUpload_sewing_image() {
        $('.file-upload-input-sewing_image').replaceWith($('.file-upload-input-sewing_image').clone());
        $('.file-upload-content-sewing_image').hide();
        $('.image-upload-wrap-sewing_image').show();
    }
    $('.image-upload-wrap-sewing_image').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_sewing_image2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image2").attr("src", e.target.result);
                $(".file-upload-content-sewing_image2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image2();
        }
    }

    function removeUpload_sewing_image2() {
        $('.file-upload-input-sewing_image2').replaceWith($('.file-upload-input-sewing_image2').clone());
        $('.file-upload-content-sewing_image2').hide();
        $('.image-upload-wrap-sewing_image2').show();
    }
    $('.image-upload-wrap-sewing_image2').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image2').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image2').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_sewing_image3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image3").attr("src", e.target.result);
                $(".file-upload-content-sewing_image3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image3();
        }
    }

    function removeUpload_sewing_image3() {
        $('.file-upload-input-sewing_image3').replaceWith($('.file-upload-input-sewing_image3').clone());
        $('.file-upload-content-sewing_image3').hide();
        $('.image-upload-wrap-sewing_image3').show();
    }
    $('.image-upload-wrap-sewing_image3').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image3').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image3').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_sewing_image4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image4").attr("src", e.target.result);
                $(".file-upload-content-sewing_image4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image4();
        }
    }

    function removeUpload_sewing_image4() {
        $('.file-upload-input-sewing_image4').replaceWith($('.file-upload-input-sewing_image4').clone());
        $('.file-upload-content-sewing_image4').hide();
        $('.image-upload-wrap-sewing_image4').show();
    }
    $('.image-upload-wrap-sewing_image4').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image4').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image4').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_sewing_image5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image5").attr("src", e.target.result);
                $(".file-upload-content-sewing_image5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image5();
        }
    }

    function removeUpload_sewing_image5() {
        $('.file-upload-input-sewing_image5').replaceWith($('.file-upload-input-sewing_image5').clone());
        $('.file-upload-content-sewing_image5').hide();
        $('.image-upload-wrap-sewing_image5').show();
    }
    $('.image-upload-wrap-sewing_image5').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image5').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image5').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_sewing_image6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-sewing_image6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-sewing_image6").attr("src", e.target.result);
                $(".file-upload-content-sewing_image6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_sewing_image6();
        }
    }

    function removeUpload_sewing_image6() {
        $('.file-upload-input-sewing_image6').replaceWith($('.file-upload-input-sewing_image6').clone());
        $('.file-upload-content-sewing_image6').hide();
        $('.image-upload-wrap-sewing_image6').show();
    }
    $('.image-upload-wrap-sewing_image6').bind('dragover', function () {
        $('.image-upload-wrap-sewing_image6').addClass('image-dropping');
    });
    $('.image-upload-wrap-sewing_image6').bind('dragleave', function () {
        $('.image-upload-wrap-sewing_image6').removeClass('image-dropping');
    });
</script>
@endpush