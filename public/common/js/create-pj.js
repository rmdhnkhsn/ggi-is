function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap1').hide();

        reader.onload = function (e) {
            $(".file-upload-image1").attr("src", e.target.result);
            $(".file-upload-content1").show();
            $('.image-title').html(input.files[0]);
        };
        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload1();
    }
}

function removeUpload1() {
    $('.file-upload-input1').replaceWith($('.file-upload-input1').clone());
    $('.file-upload-content1').hide();
    $('.image-upload-wrap1').show();
}
$('.image-upload-wrap1').bind('dragover', function () {
    $('.image-upload-wrap1').addClass('image-dropping');
});
$('.image-upload-wrap1').bind('dragleave', function () {
    $('.image-upload-wrap1').removeClass('image-dropping');
});

// =================================================================== //

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap2').hide();

        reader.onload = function (e) {
            $(".file-upload-image2").attr("src", e.target.result);
            $(".file-upload-content2").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload2();
    }
}

function removeUpload2() {
    $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
    $('.file-upload-content2').hide();
    $('.image-upload-wrap2').show();
}
$('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping');
});
$('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping');
});

// =================================================================== //

function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap3').hide();

        reader.onload = function (e) {
            $(".file-upload-image3").attr("src", e.target.result);
            $(".file-upload-content3").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload3();
    }
}

function removeUpload3() {
    $('.file-upload-input3').replaceWith($('.file-upload-input3').clone());
    $('.file-upload-content3').hide();
    $('.image-upload-wrap3').show();
}
$('.image-upload-wrap3').bind('dragover', function () {
    $('.image-upload-wrap3').addClass('image-dropping');
});
$('.image-upload-wrap3').bind('dragleave', function () {
    $('.image-upload-wrap3').removeClass('image-dropping');
});

// =================================================================== //
function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap4').hide();

        reader.onload = function (e) {
            $(".file-upload-image4").attr("src", e.target.result);
            $(".file-upload-content4").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload4();
    }
}

function removeUpload4() {
    $('.file-upload-input4').replaceWith($('.file-upload-input4').clone());
    $('.file-upload-content4').hide();
    $('.image-upload-wrap4').show();
}
$('.image-upload-wrap4').bind('dragover', function () {
    $('.image-upload-wrap4').addClass('image-dropping');
});
$('.image-upload-wrap4').bind('dragleave', function () {
    $('.image-upload-wrap4').removeClass('image-dropping');
});

// =================================================================== //
function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap5').hide();

        reader.onload = function (e) {
            $(".file-upload-image5").attr("src", e.target.result);
            $(".file-upload-content5").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload5();
    }
}

function removeUpload5() {
    $('.file-upload-input5').replaceWith($('.file-upload-input5').clone());
    $('.file-upload-content5').hide();
    $('.image-upload-wrap5').show();
}
$('.image-upload-wrap5').bind('dragover', function () {
    $('.image-upload-wrap5').addClass('image-dropping');
});
$('.image-upload-wrap5').bind('dragleave', function () {
    $('.image-upload-wrap5').removeClass('image-dropping');
});

// =================================================================== //
function readURL6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap6').hide();

        reader.onload = function (e) {
            $(".file-upload-image6").attr("src", e.target.result);
            $(".file-upload-content6").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload6();
    }
}

function removeUpload6() {
    $('.file-upload-input6').replaceWith($('.file-upload-input6').clone());
    $('.file-upload-content6').hide();
    $('.image-upload-wrap6').show();
}
$('.image-upload-wrap6').bind('dragover', function () {
    $('.image-upload-wrap6').addClass('image-dropping');
});
$('.image-upload-wrap6').bind('dragleave', function () {
    $('.image-upload-wrap6').removeClass('image-dropping');
});

// =================================================================== //
function readURL7(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap7').hide();

        reader.onload = function (e) {
            $(".file-upload-image7").attr("src", e.target.result);
            $(".file-upload-content7").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload7();
    }
}

function removeUpload7() {
    $('.file-upload-input7').replaceWith($('.file-upload-input7').clone());
    $('.file-upload-content7').hide();
    $('.image-upload-wrap7').show();
}
$('.image-upload-wrap7').bind('dragover', function () {
    $('.image-upload-wrap7').addClass('image-dropping');
});
$('.image-upload-wrap7').bind('dragleave', function () {
    $('.image-upload-wrap7').removeClass('image-dropping');
});

// =================================================================== //
function readURL8(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap8').hide();

        reader.onload = function (e) {
            $(".file-upload-image8").attr("src", e.target.result);
            $(".file-upload-content8").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload8();
    }
}

function removeUpload8() {
    $('.file-upload-input8').replaceWith($('.file-upload-input8').clone());
    $('.file-upload-content8').hide();
    $('.image-upload-wrap8').show();
}
$('.image-upload-wrap8').bind('dragover', function () {
    $('.image-upload-wrap8').addClass('image-dropping');
});
$('.image-upload-wrap8').bind('dragleave', function () {
    $('.image-upload-wrap8').removeClass('image-dropping');
});

// =================================================================== //
function readURL9(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap9').hide();

        reader.onload = function (e) {
            $(".file-upload-image9").attr("src", e.target.result);
            $(".file-upload-content9").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload9();
    }
}

function removeUpload9() {
    $('.file-upload-input9').replaceWith($('.file-upload-input9').clone());
    $('.file-upload-content9').hide();
    $('.image-upload-wrap9').show();
}
$('.image-upload-wrap9').bind('dragover', function () {
    $('.image-upload-wrap9').addClass('image-dropping');
});
$('.image-upload-wrap9').bind('dragleave', function () {
    $('.image-upload-wrap9').removeClass('image-dropping');
});

// =================================================================== //
function readURL10(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap10').hide();

        reader.onload = function (e) {
            $(".file-upload-image10").attr("src", e.target.result);
            $(".file-upload-content10").show();
            $('.image-title').html(input.files[0]);
            // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload10();
    }
}

function removeUpload10() {
    $('.file-upload-input10').replaceWith($('.file-upload-input10').clone());
    $('.file-upload-content10').hide();
    $('.image-upload-wrap10').show();
}
$('.image-upload-wrap10').bind('dragover', function () {
    $('.image-upload-wrap10').addClass('image-dropping');
});
$('.image-upload-wrap10').bind('dragleave', function () {
    $('.image-upload-wrap10').removeClass('image-dropping');
});

$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
});