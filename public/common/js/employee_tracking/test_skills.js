$(document).ready(function () {
    $(".cardEmployee5").on('click', '.checked5', function () {
        $(this).closest('.cardEmployee5').toggleClass('selected', this.checked);
    });
    $('.cardEmployee5 input:checkbox:checked').closest('.cardEmployee5').addClass('selected');
});

$(".checkAll5").change(function () {
    if ($(this).is(":checked")) {
        $(".cardEmployee5").addClass("selected");
    } else {
        $(".cardEmployee5").removeClass("selected");
    }
});

$(".checkAll5").on('change', function () {
    $(".checked5").prop('checked', $(this).is(":checked"));
});