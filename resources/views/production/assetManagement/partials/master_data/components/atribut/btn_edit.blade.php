

@include('production.assetManagement.partials.master_data.modal.machine.modal-edit')


<script>
$(document).on('click', '#check{{$row['id']}}', function(){
    var status = document.getElementById('check{{ $row['id'] }}').value;
    if(document.getElementById('check{{ $row['id'] }}').checked){
    var result = '1';
    console.log(result);
    document.getElementById('cek{{$row['id'] }}').value = result;
    }
    else{
    var result = null; 
    console.log(result);
    document.getElementById('cek{{ $row['id'] }}').value = result;
    }    
}); 
</script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#fb5b5b",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Your Data has been saved", "error");
        }
    }); 
  });
</script>