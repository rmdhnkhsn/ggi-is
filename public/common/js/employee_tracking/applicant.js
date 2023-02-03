$(document).ready(function () {
    $(".cardEmployee3").on('click', '.checked3', function () {
        $(this).closest('.cardEmployee3').toggleClass('selected', this.checked);
    });
    $('.cardEmployee3 input:checkbox:checked').closest('.cardEmployee3').addClass('selected');
});

$(".checkAll3").change(function () {
    if ($(this).is(":checked")) {
        $(".cardEmployee3").addClass("selected");
    } else {
        $(".cardEmployee3").removeClass("selected");
    }
});

$(".checkAll3").on('change', function () {
    $(".checked3").prop('checked', $(this).is(":checked"));
});