@php
    $attention_label="";
    $label_guide="";
    $label_image="";
    $label_image2="";
    $label_image3="";
    $label_image4="";
    $label_image5="";
    $label_image6="";
    $label_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_label==null?:$attention_label=$master_data->material_sewing_detail->attention_label;
        $master_data->material_sewing_detail->label_guide==null?:$label_guide=$master_data->material_sewing_detail->label_guide;
        $master_data->material_sewing_detail->label_image==null?:$label_image=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image);
        $master_data->material_sewing_detail->label_image2==null?:$label_image2=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image2);
        $master_data->material_sewing_detail->label_image3==null?:$label_image3=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image3);
        $master_data->material_sewing_detail->label_image4==null?:$label_image4=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image4);
        $master_data->material_sewing_detail->label_image5==null?:$label_image5=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image5);
        $master_data->material_sewing_detail->label_image6==null?:$label_image6=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image6);
        $master_data->material_sewing_detail->label_pdf==null?:$label_pdf=$master_data->material_sewing_detail->label_pdf;
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-14 text-left">Attention Label</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="attention_label" name="attention_label" maxlength="500" placeholder="Write youre attention Label..">{{$attention_label}}</textarea>
        </div>
    </div>
    <div class="col-12">
        <div class="title-14 text-left">Label Image</div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image">
                <center><i class="icon-upload-label_image fas fa-upload"></i></center>
                <button class="file-upload-btn-label_image" type="button" id="file1"
                    onclick="$('.file-upload-input-label_image').trigger('click')">Select Image</button>
                <input class="file-upload-input-label_image" type='file' id="label_image" name="label_image"
                    onchange="readURL_label_image(this);" accept="image/*" />
                <div class="drag-text-label_image">
                    <h5>Or Drop Images Here</h5>
                </div>
            </div>
            <div class="file-upload-content-label_image">
                <img class="file-upload-image-label_image"
                    src="{{$label_image}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image2">
                <button class="file-upload-btn-label_image2" type="button" id="label_image2" name="label_image2"
                    onclick="$('.file-upload-input-label_image2').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-label_image2" type='file' id="label_image2" name="label_image2" value=""
                    onchange="readURL_label_image2(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-label_image2">
                <img class="file-upload-image-label_image2"
                    src="{{$label_image2}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image2()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image3">

                <button class="file-upload-btn-label_image3" type="button" id="label_image3" name="label_image3"
                    onclick="$('.file-upload-input-label_image3').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-label_image3" type='file' id="label_image3" name="label_image3" value=""
                    onchange="readURL_label_image3(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-label_image3">
                <img class="file-upload-image-label_image3"
                    src="{{$label_image3}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image3()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image4">

                <button class="file-upload-btn-label_image4" type="button" id="label_image4" name="label_image4"
                    onclick="$('.file-upload-input-label_image4').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-label_image4" type='file' id="label_image4" name="label_image4" value=""
                    onchange="readURL_label_image4(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-label_image4">
                <img class="file-upload-image-label_image4"
                    src="{{$label_image4}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image4()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image5">

                <button class="file-upload-btn-label_image5" type="button" id="label_image5" name="label_image5"
                    onclick="$('.file-upload-input-label_image5').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-label_image5" type='file' id="label_image5" name="label_image5" value=""
                    onchange="readURL_label_image5(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-label_image5">
                <img class="file-upload-image-label_image5"
                    src="{{$label_image5}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image5()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-label_image6">

                <button class="file-upload-btn-label_image6" type="button" id="label_image6" name="label_image6"
                    onclick="$('.file-upload-input-label_image6').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-label_image6" type='file' id="label_image6" name="label_image6" value=""
                    onchange="readURL_label_image6(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-label_image6">
                <img class="file-upload-image-label_image6"
                    src="{{$label_image6}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_label_image6()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <span class="ws-sub-title">Label File</span>
        <div class="custom-file mt-2">
            <input type="file" class="custom-file-input" id="packing_file_guide" name="label_pdf" value="" onchange="submit_form_packing()">
            <label class="custom-file-labels" for="customFile">
                <span class="choose-file">{{$label_pdf}}</span></label>
        </div>
    </div>
    <div class="col-12">
        <div class="borderlight2 my-4"></div>
    </div>
</div>

@push("scripts")
@if ($label_image!=="")
<script>
    $(".file-upload-content-label_image").show();
    $('.image-upload-wrap-label_image').hide();
</script>
@endif
@if ($label_image2!=="")
<script>
    $(".file-upload-content-label_image2").show();
    $('.image-upload-wrap-label_image2').hide();
</script>
@endif
@if ($label_image3!=="")
<script>
    $(".file-upload-content-label_image3").show();
    $('.image-upload-wrap-label_image3').hide();
</script>
@endif
@if ($label_image4!=="")
<script>
    $(".file-upload-content-label_image4").show();
    $('.image-upload-wrap-label_image4').hide();
</script>
@endif
@if ($label_image5!=="")
<script>
    $(".file-upload-content-label_image5").show();
    $('.image-upload-wrap-label_image5').hide();
</script>
@endif
@if ($label_image6!=="")
<script>
    $(".file-upload-content-label_image6").show();
    $('.image-upload-wrap-label_image6').hide();
</script>
@endif

<script>
    function readURL_label_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image").attr("src", e.target.result);
                $(".file-upload-content-label_image").show();
                $('.image-title').html(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image();
        }
    }

    function removeUpload_label_image() {
        $('.file-upload-input-label_image').replaceWith($('.file-upload-input-label_image').clone());
        $('.file-upload-content-label_image').hide();
        $('.image-upload-wrap-label_image').show();
    }
    $('.image-upload-wrap-label_image').bind('dragover', function () {
        $('.image-upload-wrap-label_image').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image').bind('dragleave', function () {
        $('.image-upload-wrap-label_image').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_label_image2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image2").attr("src", e.target.result);
                $(".file-upload-content-label_image2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image2();
        }
    }

    function removeUpload_label_image2() {
        $('.file-upload-input-label_image2').replaceWith($('.file-upload-input-label_image2').clone());
        $('.file-upload-content-label_image2').hide();
        $('.image-upload-wrap-label_image2').show();
    }
    $('.image-upload-wrap-label_image2').bind('dragover', function () {
        $('.image-upload-wrap-label_image2').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image2').bind('dragleave', function () {
        $('.image-upload-wrap-label_image2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_label_image3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image3").attr("src", e.target.result);
                $(".file-upload-content-label_image3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image3();
        }
    }

    function removeUpload_label_image3() {
        $('.file-upload-input-label_image3').replaceWith($('.file-upload-input-label_image3').clone());
        $('.file-upload-content-label_image3').hide();
        $('.image-upload-wrap-label_image3').show();
    }
    $('.image-upload-wrap-label_image3').bind('dragover', function () {
        $('.image-upload-wrap-label_image3').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image3').bind('dragleave', function () {
        $('.image-upload-wrap-label_image3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_label_image4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image4").attr("src", e.target.result);
                $(".file-upload-content-label_image4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image4();
        }
    }

    function removeUpload_label_image4() {
        $('.file-upload-input-label_image4').replaceWith($('.file-upload-input-label_image4').clone());
        $('.file-upload-content-label_image4').hide();
        $('.image-upload-wrap-label_image4').show();
    }
    $('.image-upload-wrap-label_image4').bind('dragover', function () {
        $('.image-upload-wrap-label_image4').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image4').bind('dragleave', function () {
        $('.image-upload-wrap-label_image4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_label_image5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image5").attr("src", e.target.result);
                $(".file-upload-content-label_image5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image5();
        }
    }

    function removeUpload_label_image5() {
        $('.file-upload-input-label_image5').replaceWith($('.file-upload-input-label_image5').clone());
        $('.file-upload-content-label_image5').hide();
        $('.image-upload-wrap-label_image5').show();
    }
    $('.image-upload-wrap-label_image5').bind('dragover', function () {
        $('.image-upload-wrap-label_image5').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image5').bind('dragleave', function () {
        $('.image-upload-wrap-label_image5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_label_image6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-label_image6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-label_image6").attr("src", e.target.result);
                $(".file-upload-content-label_image6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_label_image6();
        }
    }

    function removeUpload_label_image6() {
        $('.file-upload-input-label_image6').replaceWith($('.file-upload-input-label_image6').clone());
        $('.file-upload-content-label_image6').hide();
        $('.image-upload-wrap-label_image6').show();
    }
    $('.image-upload-wrap-label_image6').bind('dragover', function () {
        $('.image-upload-wrap-label_image6').addClass('image-dropping');
    });
    $('.image-upload-wrap-label_image6').bind('dragleave', function () {
        $('.image-upload-wrap-label_image6').removeClass('image-dropping');
    });
</script>
@endpush