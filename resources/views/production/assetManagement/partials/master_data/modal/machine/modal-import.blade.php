<form  action="{{route('asset.master.import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="import" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                <form action="">
                    <div class="row">
                        <div class="col-12 justify-sb">
                            <div class="title-18">Import Excel</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="borderlight2"></div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Your Document</span>
                            <div class="customFile mt-1 mb-3">
                                <input type="file" class="customFileInput" id="file1" name="file1" accept=".xlsx, .xls, .csv" required>
                                <label class="customFileLabelsBlue" for="file1">
                                <span class="chooseFile"></span></label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit"   class="btn-blue-md btn-block success import">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<script>
    $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '190px');
    });
</script>

<script>
    
</script>
<script>
  $('.import').on('click', function (event) {
   function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }
  });
</script>