
@php
$folding_note_detail="";
$folding_note_attention="";
$folding_file1="";
$folding_file2="";
$folding_file3="";
$folding_file4="";
$folding_file5="";
$folding_file6="";
$folding_file7="";
$folding_file8="";
$folding_file9="";
$folding_file10="";
$folding_file11="";
$folding_file12="";
$folding_guide_original="";
if ($master_data->packing->where('tipe','FOLDING')->first()!==null) {
    $master_data->packing->where('tipe','FOLDING')->first()->note_detail==null?:$folding_note_detail=$master_data->packing->where('tipe','FOLDING')->first()->note_detail;
    $master_data->packing->where('tipe','FOLDING')->first()->note_attention==null?:$folding_note_attention=$master_data->packing->where('tipe','FOLDING')->first()->note_attention;
   
    $master_data->packing->where('tipe','FOLDING')->first()->file1==null?:$folding_file1=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file1);
    $master_data->packing->where('tipe','FOLDING')->first()->file2==null?:$folding_file2=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file2);
    $master_data->packing->where('tipe','FOLDING')->first()->file3==null?:$folding_file3=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file3);
    $master_data->packing->where('tipe','FOLDING')->first()->file4==null?:$folding_file4=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file4);
    $master_data->packing->where('tipe','FOLDING')->first()->file5==null?:$folding_file5=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file5);
    $master_data->packing->where('tipe','FOLDING')->first()->file6==null?:$folding_file6=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file6);
    $master_data->packing->where('tipe','FOLDING')->first()->file7==null?:$folding_file7=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file7);
    $master_data->packing->where('tipe','FOLDING')->first()->file8==null?:$folding_file8=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file8);
    $master_data->packing->where('tipe','FOLDING')->first()->file9==null?:$folding_file9=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file9);
    $master_data->packing->where('tipe','FOLDING')->first()->file10==null?:$folding_file10=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file10);
    $master_data->packing->where('tipe','FOLDING')->first()->file11==null?:$folding_file11=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file11);
    $master_data->packing->where('tipe','FOLDING')->first()->file12==null?:$folding_file12=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file12);
    
    $master_data->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=$master_data->packing->where('tipe','FOLDING')->first()->file_guide_original;
}elseif($master_data->worksheet_copy != null){
    $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();
    $rekap_order_tujuan->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=$rekap_order_tujuan->packing->where('tipe','FOLDING')->first()->file_guide_original;
}
@endphp
<?php
if ($master_data->worksheet_copy != null) {
    $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();
    $rekap_order_tujuan->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=$rekap_order_tujuan->packing->where('tipe','FOLDING')->first()->file_guide_original;
}
?>
<form action="#" id="frmFolding" method="post" enctype="multipart/form-data">
    
    @csrf
    <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
    <input type="hidden" name="tipe" id="tipe" value="FOLDING">
    <div class="row">
        <div class="col-12">
            <div class="ws-judul">Packing</div>
            <div class="ws-judul-2 mt-2">Folding</div>
        </div>
        <div class="col-12">
            <div class="messageGrey mt-2">
                <textarea name="note_detail" maxlength="500" id="folding_note_detail" placeholder="Write youre Folding Detail..">{{$folding_note_detail}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ws-judul-2 mb-1">Folding Image</div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding1">
                    <i class="icon-upload-folding1 fas fa-upload"></i>
                    <button class="file-upload-btn-folding1" type="button" id="file1"
                        onclick="$('.file-upload-input-folding1').trigger('click')">Select Image</button>
                    <input class="file-upload-input-folding1" type='file' id="file1" name="file1"
                        onchange="readURL_folding1(this);" accept="image/*" />
                    <div class="drag-text-folding1">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>

                <div class="file-upload-content-folding1">
                    <img class="file-upload-image-folding1"
                        src="{{$folding_file1}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding1()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding2">
                    <button class="file-upload-btn-folding2" type="button" id="file2" name="file2"
                        onclick="$('.file-upload-input-folding2').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding2" type='file' id="file2" name="file2" value=""
                        onchange="readURL_folding2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding2">
                    <img class="file-upload-image-folding2"
                        src="{{$folding_file2}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding2()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding3">

                    <button class="file-upload-btn-folding3" type="button" id="file3" name="file3"
                        onclick="$('.file-upload-input-folding3').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding3" type='file' id="file3" name="file3" value=""
                        onchange="readURL_folding3(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding3">
                    <img class="file-upload-image-folding3"
                        src="{{$folding_file3}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding3()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding4">

                    <button class="file-upload-btn-folding4" type="button" id="file4" name="file4"
                        onclick="$('.file-upload-input-folding4').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding4" type='file' id="file4" name="file4" value=""
                        onchange="readURL_folding4(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding4">
                    <img class="file-upload-image-folding4"
                        src="{{$folding_file4}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding4()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding5">

                    <button class="file-upload-btn-folding5" type="button" id="file5" name="file5"
                        onclick="$('.file-upload-input-folding5').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding5" type='file' id="file5" name="file5" value=""
                        onchange="readURL_folding5(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding5">
                    <img class="file-upload-image-folding5"
                        src="{{$folding_file5}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding5()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding6">

                    <button class="file-upload-btn-folding6" type="button" id="file6" name="file6"
                        onclick="$('.file-upload-input-folding6').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding6" type='file' id="file6" name="file6" value=""
                        onchange="readURL_folding6(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding6">
                    <img class="file-upload-image-folding6"
                        src="{{$folding_file6}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding6()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding7">

                    <button class="file-upload-btn-folding7" type="button" id="file7" name="file7"
                        onclick="$('.file-upload-input-folding7').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding7" type='file' id="file7" name="file7" value=""
                        onchange="readURL_folding7(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding7">
                    <img class="file-upload-image-folding7"
                        src="{{$folding_file7}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding7()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding8">

                    <button class="file-upload-btn-folding8" type="button" id="file8" name="file8"
                        onclick="$('.file-upload-input-folding8').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding8" type='file' id="file8" name="file8" value=""
                        onchange="readURL_folding8(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding8">
                    <img class="file-upload-image-folding8"
                        src="{{$folding_file8}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding8()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding9">

                    <button class="file-upload-btn-folding9" type="button" id="file9" name="file9"
                        onclick="$('.file-upload-input-folding9').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding9" type='file' id="file9" name="file9" value=""
                        onchange="readURL_folding9(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding9">
                    <img class="file-upload-image-folding9"
                        src="{{$folding_file9}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding9()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding10">

                    <button class="file-upload-btn-folding10" type="button" id="file10" name="file10"
                        onclick="$('.file-upload-input-folding10').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding10" type='file' id="file10" name="file10" value=""
                        onchange="readURL_folding10(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding10">
                    <img class="file-upload-image-folding10"
                        src="{{$folding_file10}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding10()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding11">

                    <button class="file-upload-btn-folding11" type="button" id="file11" name="file11"
                        onclick="$('.file-upload-input-folding11').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding11" type='file' id="file11" name="file11" value=""
                        onchange="readURL_folding11(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding11">
                    <img class="file-upload-image-folding11"
                        src="{{$folding_file11}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding11()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="file-upload-ws">
                <div class="image-upload-wrap-folding12">
                    <button class="file-upload-btn-folding12" type="button" id="file12" name="file12"
                        onclick="$('.file-upload-input-folding12').trigger( 'click' )"><i
                            class="fas fa-plus"></i></button>
                    <input class="file-upload-input-folding12" type='file' id="file12" name="file12" value=""
                        onchange="readURL_folding12(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding12">
                    <img class="file-upload-image-folding12"
                        src="{{$folding_file12}}" alt=" Image Format Only"
                        data-toggle="lightbox" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_folding12()" class="remove-image-ws2"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="title-sm">Folding Guide</div>
            <div class="customFile mt-1 mb-2">
                <input type="file" class="customFileInput" id="folding_file_guide" name="file_guide" value=""
                    onchange="submit_form_folding()">
                <label class="customFileLabelsBlue" for="folding_file_guide">
                    <span class="chooseFile" style="margin-left:171px">{{$folding_guide_original}}</span>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="borderlight2 my-4"></div>
        </div>
    </div>
    <!-- <div class="row mt-2">
        <div class="col-sm-6">
            <span class="ws-judul-2">Folding Detail</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Folding Detail.." name="note_detail" id="folding_note_detail">{{$folding_note_detail}}</textarea>
            </div>
        </div>
        <div class="col-sm-6">
            <span class="ws-judul-2">Attention Folding</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Attention Folding.." name="note_attention" id="folding_note_attention">{{$folding_note_attention}}</textarea>
            </div>
        </div>
    </div> -->
</form>

@push("scripts")
<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>
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
    var konten = document.getElementById("folding_note_detail");
        var editor = CKEDITOR.replace(konten,{
        language:'en-gb'
    });
        editor.on('blur',function(evt){
            // alert(evt.editor.getData());
            $('#folding_note_detail').val(evt.editor.getData());
            showLoading();
            submit_form_folding();
        });
</script>
<script>
    // $('#folding_note_detail').on('blur', function(e) {
    //     alert('masuk');
    //     submit_form_folding();
    // });

    $('#folding_note_attention').on('blur', function(e) {
        submit_form_folding();
    });

    function submit_form_folding() {
        $("#frmFolding").submit();
    }

    $("#frmFolding").submit(function (event) {
        var ajaxRequest;
        event.preventDefault();

        // $("#result").html('');
        var form = $('#frmFolding')[0];
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

@if ($folding_file1!=="")
<script>
    $(".file-upload-content-folding1").show();
    $('.image-upload-wrap-folding1').hide();
</script>
@endif
@if ($folding_file2!=="")
<script>
    $(".file-upload-content-folding2").show();
    $('.image-upload-wrap-folding2').hide();
</script>
@endif
@if ($folding_file3!=="")
<script>
    $(".file-upload-content-folding3").show();
    $('.image-upload-wrap-folding3').hide();
</script>
@endif
@if ($folding_file4!=="")
<script>
    $(".file-upload-content-folding4").show();
    $('.image-upload-wrap-folding4').hide();
</script>
@endif
@if ($folding_file5!=="")
<script>
    $(".file-upload-content-folding5").show();
    $('.image-upload-wrap-folding5').hide();
</script>
@endif
@if ($folding_file6!=="")
<script>
    $(".file-upload-content-folding6").show();
    $('.image-upload-wrap-folding6').hide();
</script>
@endif

@if ($folding_file7!=="")
<script>
    $(".file-upload-content-folding7").show();
    $('.image-upload-wrap-folding7').hide();
</script>
@endif

@if ($folding_file8!=="")
<script>
    $(".file-upload-content-folding8").show();
    $('.image-upload-wrap-folding8').hide();
</script>
@endif

@if ($folding_file9!=="")
<script>
    $(".file-upload-content-folding9").show();
    $('.image-upload-wrap-folding9').hide();
</script>
@endif

@if ($folding_file10!=="")
<script>
    $(".file-upload-content-folding10").show();
    $('.image-upload-wrap-folding10').hide();
</script>
@endif

@if ($folding_file11!=="")
<script>
    $(".file-upload-content-folding11").show();
    $('.image-upload-wrap-folding11').hide();
</script>
@endif

@if ($folding_file12!=="")
<script>
    $(".file-upload-content-folding12").show();
    $('.image-upload-wrap-folding12').hide();
</script>
@endif

<script>
    function readURL_folding1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding1').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding1").attr("src", e.target.result);
                $(".file-upload-content-folding1").show();
                $('.image-title').html(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding1();
        }
    }

    function removeUpload_folding1() {
        $('.file-upload-input-folding1').replaceWith($('.file-upload-input-folding1').clone());
        $('.file-upload-content-folding1').hide();
        $('.image-upload-wrap-folding1').show();
    }
    $('.image-upload-wrap-folding1').bind('dragover', function () {
        $('.image-upload-wrap-folding1').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding1').bind('dragleave', function () {
        $('.image-upload-wrap-folding1').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding2").attr("src", e.target.result);
                $(".file-upload-content-folding2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding2();
        }
    }

    function removeUpload_folding2() {
        $('.file-upload-input-folding2').replaceWith($('.file-upload-input-folding2').clone());
        $('.file-upload-content-folding2').hide();
        $('.image-upload-wrap-folding2').show();
    }
    $('.image-upload-wrap-folding2').bind('dragover', function () {
        $('.image-upload-wrap-folding2').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding2').bind('dragleave', function () {
        $('.image-upload-wrap-folding2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding3").attr("src", e.target.result);
                $(".file-upload-content-folding3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding3();
        }
    }

    function removeUpload_folding3() {
        $('.file-upload-input-folding3').replaceWith($('.file-upload-input-folding3').clone());
        $('.file-upload-content-folding3').hide();
        $('.image-upload-wrap-folding3').show();
    }
    $('.image-upload-wrap-folding3').bind('dragover', function () {
        $('.image-upload-wrap-folding3').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding3').bind('dragleave', function () {
        $('.image-upload-wrap-folding3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding4").attr("src", e.target.result);
                $(".file-upload-content-folding4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding4();
        }
    }

    function removeUpload_folding4() {
        $('.file-upload-input-folding4').replaceWith($('.file-upload-input-folding4').clone());
        $('.file-upload-content-folding4').hide();
        $('.image-upload-wrap-folding4').show();
    }
    $('.image-upload-wrap-folding4').bind('dragover', function () {
        $('.image-upload-wrap-folding4').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding4').bind('dragleave', function () {
        $('.image-upload-wrap-folding4').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding5').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding5").attr("src", e.target.result);
                $(".file-upload-content-folding5").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding5();
        }
    }

    function removeUpload_folding5() {
        $('.file-upload-input-folding5').replaceWith($('.file-upload-input-folding5').clone());
        $('.file-upload-content-folding5').hide();
        $('.image-upload-wrap-folding5').show();
    }
    $('.image-upload-wrap-folding5').bind('dragover', function () {
        $('.image-upload-wrap-folding5').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding5').bind('dragleave', function () {
        $('.image-upload-wrap-folding5').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding6').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding6").attr("src", e.target.result);
                $(".file-upload-content-folding6").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding6();
        }
    }

    function removeUpload_folding6() {
        $('.file-upload-input-folding6').replaceWith($('.file-upload-input-folding6').clone());
        $('.file-upload-content-folding6').hide();
        $('.image-upload-wrap-folding6').show();
    }
    $('.image-upload-wrap-folding6').bind('dragover', function () {
        $('.image-upload-wrap-folding6').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding6').bind('dragleave', function () {
        $('.image-upload-wrap-folding6').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding7(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding7').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding7").attr("src", e.target.result);
                $(".file-upload-content-folding7").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding7();
        }
    }

    function removeUpload_folding7() {
        $('.file-upload-input-folding7').replaceWith($('.file-upload-input-folding7').clone());
        $('.file-upload-content-folding7').hide();
        $('.image-upload-wrap-folding7').show();
    }
    $('.image-upload-wrap-folding7').bind('dragover', function () {
        $('.image-upload-wrap-folding7').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding7').bind('dragleave', function () {
        $('.image-upload-wrap-folding7').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding8(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding8').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding8").attr("src", e.target.result);
                $(".file-upload-content-folding8").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding8();
        }
    }

    function removeUpload_folding8() {
        $('.file-upload-input-folding8').replaceWith($('.file-upload-input-folding8').clone());
        $('.file-upload-content-folding8').hide();
        $('.image-upload-wrap-folding8').show();
    }
    $('.image-upload-wrap-folding8').bind('dragover', function () {
        $('.image-upload-wrap-folding8').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding8').bind('dragleave', function () {
        $('.image-upload-wrap-folding8').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding9(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding9').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding9").attr("src", e.target.result);
                $(".file-upload-content-folding9").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding9();
        }
    }

    function removeUpload_folding9() {
        $('.file-upload-input-folding9').replaceWith($('.file-upload-input-folding9').clone());
        $('.file-upload-content-folding9').hide();
        $('.image-upload-wrap-folding9').show();
    }
    $('.image-upload-wrap-folding9').bind('dragover', function () {
        $('.image-upload-wrap-folding9').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding9').bind('dragleave', function () {
        $('.image-upload-wrap-folding9').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding10(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding10').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding10").attr("src", e.target.result);
                $(".file-upload-content-folding10").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding10();
        }
    }

    function removeUpload_folding10() {
        $('.file-upload-input-folding10').replaceWith($('.file-upload-input-folding10').clone());
        $('.file-upload-content-folding10').hide();
        $('.image-upload-wrap-folding10').show();
    }
    $('.image-upload-wrap-folding10').bind('dragover', function () {
        $('.image-upload-wrap-folding10').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding10').bind('dragleave', function () {
        $('.image-upload-wrap-folding10').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding11(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding11').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding11").attr("src", e.target.result);
                $(".file-upload-content-folding11").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding11();
        }
    }

    function removeUpload_folding11() {
        $('.file-upload-input-folding11').replaceWith($('.file-upload-input-folding11').clone());
        $('.file-upload-content-folding11').hide();
        $('.image-upload-wrap-folding11').show();
    }
    $('.image-upload-wrap-folding11').bind('dragover', function () {
        $('.image-upload-wrap-folding11').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding11').bind('dragleave', function () {
        $('.image-upload-wrap-folding11').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding12(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding12').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding12").attr("src", e.target.result);
                $(".file-upload-content-folding12").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding12();
        }
    }

    function removeUpload_folding12() {
        $('.file-upload-input-folding12').replaceWith($('.file-upload-input-folding12').clone());
        $('.file-upload-content-folding12').hide();
        $('.image-upload-wrap-folding12').show();
    }
    $('.image-upload-wrap-folding12').bind('dragover', function () {
        $('.image-upload-wrap-folding12').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding12').bind('dragleave', function () {
        $('.image-upload-wrap-folding12').removeClass('image-dropping');
    });
</script>

@endpush