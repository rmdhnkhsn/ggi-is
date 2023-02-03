@php
    $attention_ironing="";
    $ironing_guide="";
    $ironing_image="";
    $ironing_image2="";
    $ironing_image3="";
    $ironing_image4="";
    $ironing_image5="";
    $ironing_image6="";
    $ironing_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_ironing==null?:$attention_ironing=$master_data->material_sewing_detail->attention_ironing;
        $master_data->material_sewing_detail->ironing_guide==null?:$ironing_guide=$master_data->material_sewing_detail->ironing_guide;
        $master_data->material_sewing_detail->ironing_image==null?:$ironing_image=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image);
        $master_data->material_sewing_detail->ironing_image2==null?:$ironing_image2=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image2);
        $master_data->material_sewing_detail->ironing_image3==null?:$ironing_image3=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image3);
        $master_data->material_sewing_detail->ironing_image4==null?:$ironing_image4=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image4);
        $master_data->material_sewing_detail->ironing_image5==null?:$ironing_image5=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image5);
        $master_data->material_sewing_detail->ironing_image6==null?:$ironing_image6=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image6);
        $master_data->material_sewing_detail->ironing_pdf==null?:$ironing_pdf=$master_data->material_sewing_detail->ironing_pdf;
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-14 text-left">Attention Ironing</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="attention_ironing" name="attention_ironing" maxlength="500" placeholder="Write youre attention Ironing..">{{$attention_ironing}}</textarea>
        </div>
    </div>
    <div class="col-12">
        <div class="title-14 text-left">Ironing Image</div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image">
                <center><i class="icon-upload-ironing_image fas fa-upload"></i></center>
                <button class="file-upload-btn-ironing_image" type="button" id="file1"
                    onclick="$('.file-upload-input-ironing_image').trigger('click')">Select Image</button>
                <input class="file-upload-input-ironing_image" type='file' id="ironing_image" name="ironing_image"
                    onchange="readURL_ironing_image(this);" accept="image/*" />
                <div class="drag-text-ironing_image">
                    <h5>Or Drop Images Here</h5>
                </div>
            </div>
            <div class="file-upload-content-ironing_image">
                <img class="file-upload-image-ironing_image"
                    src="{{$ironing_image}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image2">
                <button class="file-upload-btn-ironing_image2" type="button" id="ironing_image2" name="ironing_image2"
                    onclick="$('.file-upload-input-ironing_image2').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-ironing_image2" type='file' id="ironing_image2" name="ironing_image2" value=""
                    onchange="readURL_ironing_image2(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-ironing_image2">
                <img class="file-upload-image-ironing_image2"
                    src="{{$ironing_image2}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image2()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image3">

                <button class="file-upload-btn-ironing_image3" type="button" id="ironing_image3" name="ironing_image3"
                    onclick="$('.file-upload-input-ironing_image3').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-ironing_image3" type='file' id="ironing_image3" name="ironing_image3" value=""
                    onchange="readURL_ironing_image3(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-ironing_image3">
                <img class="file-upload-image-ironing_image3"
                    src="{{$ironing_image3}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image3()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image4">

                <button class="file-upload-btn-ironing_image4" type="button" id="ironing_image4" name="ironing_image4"
                    onclick="$('.file-upload-input-ironing_image4').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-ironing_image4" type='file' id="ironing_image4" name="ironing_image4" value=""
                    onchange="readURL_ironing_image4(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-ironing_image4">
                <img class="file-upload-image-ironing_image4"
                    src="{{$ironing_image4}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image4()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image5">

                <button class="file-upload-btn-ironing_image5" type="button" id="ironing_image5" name="ironing_image5"
                    onclick="$('.file-upload-input-ironing_image5').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-ironing_image5" type='file' id="ironing_image5" name="ironing_image5" value=""
                    onchange="readURL_ironing_image5(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-ironing_image5">
                <img class="file-upload-image-ironing_image5"
                    src="{{$ironing_image5}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image5()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="file-upload-ws">
            <div class="image-upload-wrap-ironing_image6">

                <button class="file-upload-btn-ironing_image6" type="button" id="ironing_image6" name="ironing_image6"
                    onclick="$('.file-upload-input-ironing_image6').trigger( 'click' )"><i
                        class="fas fa-plus"></i></button>
                <input class="file-upload-input-ironing_image6" type='file' id="ironing_image6" name="ironing_image6" value=""
                    onchange="readURL_ironing_image6(this);" accept="image/*" />
            </div>
            <div class="file-upload-content-ironing_image6">
                <img class="file-upload-image-ironing_image6"
                    src="{{$ironing_image6}}" alt=" Image Format Only"
                    data-toggle="lightbox" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_ironing_image6()" class="remove-image-ws2"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <span class="ws-sub-title">Ironing File</span>
        <div class="custom-file mt-2">
            <input type="file" class="custom-file-input" id="packing_file_guide" name="ironing_pdf" value="" onchange="submit_form_packing()">
            <label class="custom-file-labels" for="customFile">
                <span class="choose-file">{{$ironing_pdf}}</span></label>
        </div>
    </div>
    <div class="col-12">
        <div class="borderlight2 my-4"></div>
    </div>
</div>

@push("scripts")
@if ($ironing_image!=="")
<script>
    $(".file-upload-content-ironing_image").show();
    $('.image-upload-wrap-ironing_image').hide();
</script>
@endif
@if ($ironing_image2!=="")
<script>
    $(".file-upload-content-ironing_image2").show();
    $('.image-upload-wrap-ironing_image2').hide();
</script>
@endif
@if ($ironing_image3!=="")
<script>
    $(".file-upload-content-ironing_image3").show();
    $('.image-upload-wrap-ironing_image3').hide();
</script>
@endif
@if ($ironing_image4!=="")
<script>
    $(".file-upload-content-ironing_image4").show();
    $('.image-upload-wrap-ironing_image4').hide();
</script>
@endif
@if ($ironing_image5!=="")
<script>
    $(".file-upload-content-ironing_image5").show();
    $('.image-upload-wrap-ironing_image5').hide();
</script>
@endif
@if ($ironing_image6!=="")
<script>
    $(".file-upload-content-ironing_image6").show();
    $('.image-upload-wrap-ironing_image6').hide();
</script>
@endif

<script>
    function readURL_ironing_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image").attr("src", e.target.result);
                $(".file-upload-content-ironing_image").show();
                $('.image-title').html(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image();
        }
    }

    function removeUpload_ironing_image() {
        $('.file-upload-input-ironing_image').replaceWith($('.file-upload-input-ironing_image').clone());
        $('.file-upload-content-ironing_image').hide();
        $('.image-upload-wrap-ironing_image').show();
    }
    $('.image-upload-wrap-ironing_image').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_ironing_image2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image2").attr("src", e.target.result);
                $(".file-upload-content-ironing_image2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image2();
        }
    }

    function removeUpload_ironing_image2() {
        $('.file-upload-input-ironing_image2').replaceWith($('.file-upload-input-ironing_image2').clone());
        $('.file-upload-content-ironing_image2').hide();
        $('.image-upload-wrap-ironing_image2').show();
    }
    $('.image-upload-wrap-ironing_image2').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image2').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image2').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_ironing_image3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image3").attr("src", e.target.result);
                $(".file-upload-content-ironing_image3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image3();
        }
    }

    function removeUpload_ironing_image3() {
        $('.file-upload-input-ironing_image3').replaceWith($('.file-upload-input-ironing_image3').clone());
        $('.file-upload-content-ironing_image3').hide();
        $('.image-upload-wrap-ironing_image3').show();
    }
    $('.image-upload-wrap-ironing_image3').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image3').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image3').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_ironing_image4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image4").attr("src", e.target.result);
                $(".file-upload-content-ironing_image4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image4();
        }
    }

    function removeUpload_ironing_image4() {
        $('.file-upload-input-ironing_image4').replaceWith($('.file-upload-input-ironing_image4').clone());
        $('.file-upload-content-ironing_image4').hide();
        $('.image-upload-wrap-ironing_image4').show();
    }
    $('.image-upload-wrap-ironing_image4').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image4').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image4').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_ironing_image5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image5").attr("src", e.target.result);
                $(".file-upload-content-ironing_image5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image5();
        }
    }

    function removeUpload_ironing_image5() {
        $('.file-upload-input-ironing_image5').replaceWith($('.file-upload-input-ironing_image5').clone());
        $('.file-upload-content-ironing_image5').hide();
        $('.image-upload-wrap-ironing_image5').show();
    }
    $('.image-upload-wrap-ironing_image5').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image5').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image5').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_ironing_image6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-ironing_image6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-ironing_image6").attr("src", e.target.result);
                $(".file-upload-content-ironing_image6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_ironing_image6();
        }
    }

    function removeUpload_ironing_image6() {
        $('.file-upload-input-ironing_image6').replaceWith($('.file-upload-input-ironing_image6').clone());
        $('.file-upload-content-ironing_image6').hide();
        $('.image-upload-wrap-ironing_image6').show();
    }
    $('.image-upload-wrap-ironing_image6').bind('dragover', function () {
        $('.image-upload-wrap-ironing_image6').addClass('image-dropping');
    });
    $('.image-upload-wrap-ironing_image6').bind('dragleave', function () {
        $('.image-upload-wrap-ironing_image6').removeClass('image-dropping');
    });
</script>
@endpush