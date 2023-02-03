
$(document).ready(function () {
    $(".cardEmployee2").on('click', '.checked2', function () {
        $(this).closest('.cardEmployee2').toggleClass('selected', this.checked);
    });
    $('.cardEmployee2 input:checkbox:checked').closest('.cardEmployee2').addClass('selected');
});

$(".checkAll2").change(function () {
    if ($(this).is(":checked")) {
        $(".cardEmployee2").addClass("selected");
    } else {
        $(".cardEmployee2").removeClass("selected");
    }
});

$(".checkAll2").on('change', function () {
    $(".checked2").prop('checked', $(this).is(":checked"));
});

$('.delete_all').on('click', function (e) {
    var allVals = [];
    $(".sub_chk:checked").each(function () {
        allVals.push($(this).attr('data-id'));
    });
    console.log(allVals);
    // if(allVals.length <=0)  
    // {  
    //     alert("Please select row.");  
    // }  else {  
    //   var check = confirm("Are you sure you want to delete this row?");  
    //   if(check == true){  
    //     var join_selected_values = allVals.join(","); 
    //     $.ajax({
    //         url: '{{ route("publish-update_all") }}',
    //         type: 'PUT',
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: 'ids='+join_selected_values,
    //         success: function (data) {
    //           console.log(data);
    //             if (data['success']) {
    //                 $(".sub_chk:checked").each(function() { 
    //                   allVals.forEach(function(e) {
    //                     $('#publish'+e).remove();
    //                   })
    //                     // $(this).parents("tr").remove();
    //                 });
    //                 alert(data['success']);
    //             } else if (data['error']) {
    //                 alert(data['error']);
    //             } else {
    //                 alert('Whoops Something went wrong!!');
    //             }
    //         },
    //         error: function (data) {
    //             alert(data.responseText);
    //         }
    //     });
    //   }
    // }
})