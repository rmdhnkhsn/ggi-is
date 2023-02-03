$(document).ready(function () {
    $(".cardEmployee4").on('click', '.checked4', function () {
        $(this).closest('.cardEmployee4').toggleClass('selected', this.checked);
    });
    $('.cardEmployee4 input:checkbox:checked').closest('.cardEmployee4').addClass('selected');
});

$(".checkAll4").change(function () {
    if ($(this).is(":checked")) {
        $(".cardEmployee4").addClass("selected");
    } else {
        $(".cardEmployee4").removeClass("selected");
    }
});

$(".checkAll4").on('change', function () {
    $(".checked4").prop('checked', $(this).is(":checked"));
});