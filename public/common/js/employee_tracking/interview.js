$(document).ready(function () {
    $(".cardEmployee6").on('click', '.checked6', function () {
        $(this).closest('.cardEmployee6').toggleClass('selected', this.checked);
    });
    $('.cardEmployee6 input:checkbox:checked').closest('.cardEmployee6').addClass('selected');
});

$(".checkAll6").change(function () {
    if ($(this).is(":checked")) {
        $(".cardEmployee6").addClass("selected");
    } else {
        $(".cardEmployee6").removeClass("selected");
    }
});

$(".checkAll6").on('change', function () {
    $(".checked6").prop('checked', $(this).is(":checked"));
});