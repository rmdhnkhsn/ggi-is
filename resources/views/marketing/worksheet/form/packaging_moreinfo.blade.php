@php
$info_note_detail="";
$info_note_attention="";
$info_file1="";
$info_file2="";
$info_file3="";
$info_file4="";
$info_file5="";
$info_file6="";
$info_guide_original="";
if ($master_data->packing->where('tipe','INFO')->first()!==null) {
$master_data->packing->where('tipe','INFO')->first()->note_detail==null?:$info_note_detail=$master_data->packing->where('tipe','INFO')->first()->note_detail;
$master_data->packing->where('tipe','INFO')->first()->note_attention==null?:$info_note_attention=$master_data->packing->where('tipe','INFO')->first()->note_attention;

$master_data->packing->where('tipe','INFO')->first()->file1==null?:$info_file1=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file1);
$master_data->packing->where('tipe','INFO')->first()->file2==null?:$info_file2=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file2);
$master_data->packing->where('tipe','INFO')->first()->file3==null?:$info_file3=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file3);
$master_data->packing->where('tipe','INFO')->first()->file4==null?:$info_file4=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file4);
$master_data->packing->where('tipe','INFO')->first()->file5==null?:$info_file5=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file5);
$master_data->packing->where('tipe','INFO')->first()->file6==null?:$info_file6=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file6);

$master_data->packing->where('tipe','INFO')->first()->file_guide_original==null?:$info_guide_original=$master_data->packing->where('tipe','INFO')->first()->file_guide_original;
}
@endphp
<?php
if ($master_data->worksheet_copy != null) {
    $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();
    $rekap_order_tujuan->packing->where('tipe','INFO')->first()->file_guide_original==null?:$info_guide_original=$master_data->packing->where('tipe','INFO')->first()->file_guide_original;
}
?>
<form action="#" id="frmInfo" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
    <input type="hidden" name="tipe" id="tipe" value="INFO">
    <div class="row">
        <div class="col-12">
            <div class="ws-judul-2 mt-2">More Information</div>
            <div class="messageGrey mt-2">
                <textarea placeholder="Write youre Info Detail.." maxlength="500" name="note_detail" id="info_note_detail" onchange="submit_form_info()">{{$info_note_detail}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ws-judul-2 mb-1">More Info Image</div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more1">
                    <i class="icon-upload-more1 fas fa-upload"></i>
                    <button class="file-upload-btn-more1" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more1').trigger( 'click' )">Select Image</button>
                    <input class="file-upload-input-more1" type='file' id="file1" name="file1" value=""
                        onchange="readURL_more1(this);" accept="image/*" />
                    <div class="drag-text-more1">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-more1">
                    <img class="file-upload-image-more1" src="{{$info_file1}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more1()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more2">

                    <button class="file-upload-btn-more2" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more2').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                    <input class="file-upload-input-more2" type='file' id="file2" name="file2" value=""
                        onchange="readURL_more2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-more2">
                    <img class="file-upload-image-more2" src="{{$info_file2}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more2()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more3">

                    <button class="file-upload-btn-more3" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more3').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                    <input class="file-upload-input-more3" type='file' id="file3" name="file3" value=""
                        onchange="readURL_more3(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-more3">
                    <img class="file-upload-image-more3" src="{{$info_file3}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more3()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more4">

                    <button class="file-upload-btn-more4" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more4').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                    <input class="file-upload-input-more4" type='file' id="file4" name="file4" value=""
                        onchange="readURL_more4(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-more4">
                    <img class="file-upload-image-more4" src="{{$info_file4}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more4()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more5">

                    <button class="file-upload-btn-more5" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more5').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                    <input class="file-upload-input-more5" type='file' id="file5" name="file5" value=""
                        onchange="readURL_more5(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-more5">
                    <img class="file-upload-image-more5" src="{{$info_file5}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more5()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-more6">

                    <button class="file-upload-btn-more6" type="button" id="foto" name="foto"
                        onclick="$('.file-upload-input-more6').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                    <input class="file-upload-input-more6" type='file' id="file6" name="file6" value=""
                        onchange="readURL_more6(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-more6">
                    <img class="file-upload-image-more6" src="{{$info_file6}}"
                        alt=" Image Format Only" data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_more6()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="title-sm">More Information Document</div>
            <div class="customFile mt-1 mb-2">
                <input type="file" class="customFileInput" id="info_file_guide" name="file_guide" value=""
                    onchange="submit_form_info()">
                <label class="customFileLabelsBlue" for="info_file_guide">
                    <span class="chooseFile" style="margin-left:171px">{{$info_guide_original}}</span>
                </label>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-2">
        <div class="col-sm-12">
            <span class="ws-judul-2">More info Detail</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Info Detail.." name="note_detail" id="info_note_detail" onchange="submit_form_info()">{{$info_note_detail}}</textarea>
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

    var konten = document.getElementById("info_note_detail");
        var editor = CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    editor.on('blur',function(evt){
        // alert('sip');
        showLoading()
        // alert(evt.editor.getData());
        $('#info_note_detail').val(evt.editor.getData());
        submit_form_info();
    });
</script>
<script>
    function submit_form_info() {
        $("#frmInfo").submit();
    }

    $("#frmInfo").submit(function (event) {
        var ajaxRequest;
        event.preventDefault();

        var form = $('#frmInfo')[0];
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

@if ($info_file1!=="")
<script>
    $(".file-upload-content-more1").show();
    $('.image-upload-wrap-more1').hide();
</script>
@endif
@if ($info_file2!=="")
<script>
    $(".file-upload-content-more2").show();
    $('.image-upload-wrap-more2').hide();
</script>
@endif
@if ($info_file3!=="")
<script>
    $(".file-upload-content-more3").show();
    $('.image-upload-wrap-more3').hide();
</script>
@endif
@if ($info_file4!=="")
<script>
    $(".file-upload-content-more4").show();
    $('.image-upload-wrap-more4').hide();
</script>
@endif
@if ($info_file5!=="")
<script>
    $(".file-upload-content-more5").show();
    $('.image-upload-wrap-more5').hide();
</script>
@endif
@if ($info_file6!=="")
<script>
    $(".file-upload-content-more6").show();
    $('.image-upload-wrap-more6').hide();
</script>
@endif

<script>
    // =================================================================== //

    function readURL_more1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more1').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more1").attr("src", e.target.result);
                $(".file-upload-content-more1").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more1();
        }
    }

    function removeUpload_more1() {
        $('.file-upload-input-more1').replaceWith($('.file-upload-input-more1').clone());
        $('.file-upload-content-more1').hide();
        $('.image-upload-wrap-more1').show();
    }
    $('.image-upload-wrap-more1').bind('dragover', function () {
        $('.image-upload-wrap-more1').addClass('image-dropping');
    });
    $('.image-upload-wrap-more1').bind('dragleave', function () {
        $('.image-upload-wrap-more1').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_more2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more2").attr("src", e.target.result);
                $(".file-upload-content-more2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more2();
        }
    }

    function removeUpload_more2() {
        $('.file-upload-input-more2').replaceWith($('.file-upload-input-more2').clone());
        $('.file-upload-content-more2').hide();
        $('.image-upload-wrap-more2').show();
    }
    $('.image-upload-wrap-more2').bind('dragover', function () {
        $('.image-upload-wrap-more2').addClass('image-dropping');
    });
    $('.image-upload-wrap-more2').bind('dragleave', function () {
        $('.image-upload-wrap-more2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_more3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more3").attr("src", e.target.result);
                $(".file-upload-content-more3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more3();
        }
    }

    function removeUpload_more3() {
        $('.file-upload-input-more3').replaceWith($('.file-upload-input-more3').clone());
        $('.file-upload-content-more3').hide();
        $('.image-upload-wrap-more3').show();
    }
    $('.image-upload-wrap-more3').bind('dragover', function () {
        $('.image-upload-wrap-more3').addClass('image-dropping');
    });
    $('.image-upload-wrap-more3').bind('dragleave', function () {
        $('.image-upload-wrap-more3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_more4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more4").attr("src", e.target.result);
                $(".file-upload-content-more4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more4();
        }
    }

    function removeUpload_more4() {
        $('.file-upload-input-more4').replaceWith($('.file-upload-input-more4').clone());
        $('.file-upload-content-more4').hide();
        $('.image-upload-wrap-more4').show();
    }
    $('.image-upload-wrap-more4').bind('dragover', function () {
        $('.image-upload-wrap-more4').addClass('image-dropping');
    });
    $('.image-upload-wrap-more4').bind('dragleave', function () {
        $('.image-upload-wrap-more4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_more5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more5").attr("src", e.target.result);
                $(".file-upload-content-more5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more5();
        }
    }

    function removeUpload_more5() {
        $('.file-upload-input-more5').replaceWith($('.file-upload-input-more5').clone());
        $('.file-upload-content-more5').hide();
        $('.image-upload-wrap-more5').show();
    }
    $('.image-upload-wrap-more5').bind('dragover', function () {
        $('.image-upload-wrap-more5').addClass('image-dropping');
    });
    $('.image-upload-wrap-more5').bind('dragleave', function () {
        $('.image-upload-wrap-more5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_more6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-more6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-more6").attr("src", e.target.result);
                $(".file-upload-content-more6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmInfo").submit();

        } else {
            removeUpload_more6();
        }
    }

    function removeUpload_more6() {
        $('.file-upload-input-more6').replaceWith($('.file-upload-input-more6').clone());
        $('.file-upload-content-more6').hide();
        $('.image-upload-wrap-more6').show();
    }
    $('.image-upload-wrap-more6').bind('dragover', function () {
        $('.image-upload-wrap-more6').addClass('image-dropping');
    });
    $('.image-upload-wrap-more6').bind('dragleave', function () {
        $('.image-upload-wrap-more6').removeClass('image-dropping');
    });

    // =================================================================== //
</script>
@endpush