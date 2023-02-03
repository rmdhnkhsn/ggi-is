@php
$packing_note_detail="";
$packing_note_attention="";
$packing_file1="";
$packing_file2="";
$packing_file3="";
$packing_file4="";
$packing_file5="";
$packing_file6="";
$packing_guide_original="";
if ($master_data->packing->where('tipe','PACKING')->first()!==null) {
    $master_data->packing->where('tipe','PACKING')->first()->note_detail==null?:$packing_note_detail=$master_data->packing->where('tipe','PACKING')->first()->note_detail;
    $master_data->packing->where('tipe','PACKING')->first()->note_attention==null?:$packing_note_attention=$master_data->packing->where('tipe','PACKING')->first()->note_attention;
    
    $master_data->packing->where('tipe','PACKING')->first()->file1==null?:$packing_file1=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file1);
    $master_data->packing->where('tipe','PACKING')->first()->file2==null?:$packing_file2=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file2);
    $master_data->packing->where('tipe','PACKING')->first()->file3==null?:$packing_file3=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file3);
    $master_data->packing->where('tipe','PACKING')->first()->file4==null?:$packing_file4=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file4);
    $master_data->packing->where('tipe','PACKING')->first()->file5==null?:$packing_file5=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file5);
    $master_data->packing->where('tipe','PACKING')->first()->file6==null?:$packing_file6=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file6);
    
    $master_data->packing->where('tipe','PACKING')->first()->file_guide_original==null?:$packing_guide_original=$master_data->packing->where('tipe','PACKING')->first()->file_guide_original;
}
@endphp
<?php
if ($master_data->worksheet_copy != null) {
    $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();
    $rekap_order_tujuan->packing->where('tipe','PACKING')->first()->file_guide_original==null?:$packing_guide_original=$rekap_order_tujuan->packing->where('tipe','PACKING')->first()->file_guide_original;
}
?>
<form action="#" id="frmPacking" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
    <input type="hidden" name="tipe" id="tipe" value="PACKING">
    <div class="row">
        <div class="col-12">
            <div class="ws-judul-2 mt-2">Packing</div>
            <div class="messageGrey mt-2">
                <textarea placeholder="Write youre Packing Detail.." maxlength="500" name="note_detail" id="packing_note_detail">{{$packing_note_detail}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ws-judul-2 mb-1">Packing Image</div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing1">
                    <i class="icon-upload-packing1 fas fa-upload"></i>
                    <button class="file-upload-btn-packing1" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing1').trigger( 'click' )">Select Image</button>
                    <input class="file-upload-input-packing1" type='file' id="file1" name="file1" value=""
                        onchange="readURL_packing1(this);" accept="image/*" />
                    <div class="drag-text-packing1">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-packing1">
                    <img class="file-upload-image-packing1"
                        src="{{$packing_file1}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing1()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing2">

                    <button class="file-upload-btn-packing2" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing2').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-packing2" type='file' id="file2" name="file2" value=""
                        onchange="readURL_packing2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-packing2">
                    <img class="file-upload-image-packing2"
                        src="{{$packing_file2}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing2()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing3">

                    <button class="file-upload-btn-packing3" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing3').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-packing3" type='file' id="file3" name="file3" value=""
                        onchange="readURL_packing3(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-packing3">
                    <img class="file-upload-image-packing3"
                        src="{{$packing_file3}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing3()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing4">

                    <button class="file-upload-btn-packing4" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing4').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-packing4" type='file' id="file4" name="file4" value=""
                        onchange="readURL_packing4(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-packing4">
                    <img class="file-upload-image-packing4"
                        src="{{$packing_file4}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing4()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing5">

                    <button class="file-upload-btn-packing5" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing5').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-packing5" type='file' id="file5" name="file5" value=""
                        onchange="readURL_packing5(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-packing5">
                    <img class="file-upload-image-packing5"
                        src="{{$packing_file5}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing5()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-packing6">

                    <button class="file-upload-btn-packing6" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-packing6').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-packing6" type='file' id="file6" name="file6" value=""
                        onchange="readURL_packing6(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-packing6">
                    <img class="file-upload-image-packing6"
                        src="{{$packing_file6}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_packing6()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="title-sm">Packing Guide</div>
            <div class="customFile mt-1 mb-2">
                <input type="file" class="customFileInput" id="packing_file_guide" name="file_guide" value=""
                    onchange="submit_form_packing()">
                <label class="customFileLabelsBlue" for="packing_file_guide">
                    <span class="chooseFile" style="margin-left:171px">{{$packing_guide_original}}</span>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="borderlight2 my-4"></div>
        </div>
    </div>
    <!-- <div class="row mt-2">
        <div class="col-sm-6">
            <span class="ws-judul-2">Packing Detail</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Packing Detail.." name="note_detail" id="packing_note_detail">{{$packing_note_detail}}</textarea>
            </div>
        </div>
        <div class="col-sm-6">
            <span class="ws-judul-2">Attention Packing</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Attention Packing.." name="note_attention" id="packing_note_attention">{{$packing_note_attention}}</textarea>
            </div>
        </div>
    </div> -->
</form>

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

<script>
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
                
            }
        })
    }

    var konten = document.getElementById("packing_note_detail");
        var editor = CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    editor.on('blur',function(evt){
        // alert(evt.editor.getData());
        $('#packing_note_detail').val(evt.editor.getData());
        showLoading()
        submit_form_packing();
    });
</script>
<script>
    $('#packing_note_detail').on('blur', function(e) {
        submit_form_packing();
    });

    $('#packing_note_attention').on('blur', function(e) {
        submit_form_packing();
    });

    function submit_form_packing() {
        $("#frmPacking").submit();
    }

    $("#frmPacking").submit(function (event) {
        var ajaxRequest;
        event.preventDefault();

        // $("#result").html('');
        var form = $('#frmPacking')[0];
        var data = new FormData(form);

        ajaxRequest = $.ajax({
            url: "{{route('worksheet.packing.store')}}",
            type: "post",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            data: data
        });
        ajaxRequest.done(function (response, textStatus, jqXHR) {
            // Show successfully for submit message
            //  $("#result").html('Submitted successfully');
            location.reload();
        });
        /* On failure of request this function will be called  */
        ajaxRequest.fail(function () {
            // Show error
            // $("#result").html('There is error while submit');
        });
    });
</script>

@if ($packing_file1!=="")
<script>
    $(".file-upload-content-packing1").show();
    $('.image-upload-wrap-packing1').hide();
</script>
@endif
@if ($packing_file2!=="")
<script>
    $(".file-upload-content-packing2").show();
    $('.image-upload-wrap-packing2').hide();
</script>
@endif
@if ($packing_file3!=="")
<script>
    $(".file-upload-content-packing3").show();
    $('.image-upload-wrap-packing3').hide();
</script>
@endif
@if ($packing_file4!=="")
<script>
    $(".file-upload-content-packing4").show();
    $('.image-upload-wrap-packing4').hide();
</script>
@endif
@if ($packing_file5!=="")
<script>
    $(".file-upload-content-packing5").show();
    $('.image-upload-wrap-packing5').hide();
</script>
@endif
@if ($packing_file6!=="")
<script>
    $(".file-upload-content-packing6").show();
    $('.image-upload-wrap-packing6').hide();
</script>
@endif

<script>
    // =================================================================== //

    function readURL_packing1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing1').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing1").attr("src", e.target.result);
                $(".file-upload-content-packing1").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();

        } else {
            removeUpload_packing1();
        }
    }

    function removeUpload_packing1() {
        $('.file-upload-input-packing1').replaceWith($('.file-upload-input-packing1').clone());
        $('.file-upload-content-packing1').hide();
        $('.image-upload-wrap-packing1').show();
    }
    $('.image-upload-wrap-packing1').bind('dragover', function () {
        $('.image-upload-wrap-packing1').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing1').bind('dragleave', function () {
        $('.image-upload-wrap-packing1').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_packing2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing2").attr("src", e.target.result);
                $(".file-upload-content-packing2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();

        } else {
            removeUpload_packing2();
        }
    }

    function removeUpload_packing2() {
        $('.file-upload-input-packing2').replaceWith($('.file-upload-input-packing2').clone());
        $('.file-upload-content-packing2').hide();
        $('.image-upload-wrap-packing2').show();
    }
    $('.image-upload-wrap-packing2').bind('dragover', function () {
        $('.image-upload-wrap-packing2').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing2').bind('dragleave', function () {
        $('.image-upload-wrap-packing2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_packing3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing3").attr("src", e.target.result);
                $(".file-upload-content-packing3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();


        } else {
            removeUpload_packing3();
        }
    }

    function removeUpload_packing3() {
        $('.file-upload-input-packing3').replaceWith($('.file-upload-input-packing3').clone());
        $('.file-upload-content-packing3').hide();
        $('.image-upload-wrap-packing3').show();
    }
    $('.image-upload-wrap-packing3').bind('dragover', function () {
        $('.image-upload-wrap-packing3').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing3').bind('dragleave', function () {
        $('.image-upload-wrap-packing3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_packing4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing4").attr("src", e.target.result);
                $(".file-upload-content-packing4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();


        } else {
            removeUpload_packing4();
        }
    }

    function removeUpload_packing4() {
        $('.file-upload-input-packing4').replaceWith($('.file-upload-input-packing4').clone());
        $('.file-upload-content-packing4').hide();
        $('.image-upload-wrap-packing4').show();
    }
    $('.image-upload-wrap-packing4').bind('dragover', function () {
        $('.image-upload-wrap-packing4').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing4').bind('dragleave', function () {
        $('.image-upload-wrap-packing4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_packing5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing5").attr("src", e.target.result);
                $(".file-upload-content-packing5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();

        } else {
            removeUpload_packing5();
        }
    }

    function removeUpload_packing5() {
        $('.file-upload-input-packing5').replaceWith($('.file-upload-input-packing5').clone());
        $('.file-upload-content-packing5').hide();
        $('.image-upload-wrap-packing5').show();
    }
    $('.image-upload-wrap-packing5').bind('dragover', function () {
        $('.image-upload-wrap-packing5').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing5').bind('dragleave', function () {
        $('.image-upload-wrap-packing5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_packing6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-packing6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-packing6").attr("src", e.target.result);
                $(".file-upload-content-packing6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmPacking").submit();

        } else {
            removeUpload_packing6();
        }
    }

    function removeUpload_packing6() {
        $('.file-upload-input-packing6').replaceWith($('.file-upload-input-packing6').clone());
        $('.file-upload-content-packing6').hide();
        $('.image-upload-wrap-packing6').show();
    }
    $('.image-upload-wrap-packing6').bind('dragover', function () {
        $('.image-upload-wrap-packing6').addClass('image-dropping');
    });
    $('.image-upload-wrap-packing6').bind('dragleave', function () {
        $('.image-upload-wrap-packing6').removeClass('image-dropping');
    });
</script>
@endpush
