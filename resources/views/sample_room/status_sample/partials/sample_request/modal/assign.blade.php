<meta name="csrf-token" content="{{ csrf_token() }}">
<form id="formStoreDailySample">
    <div class="modal fade modalStoreDailySample" id="dailyUpdate{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 pt-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 text-center mb-3">
                        <span class="title-20">Daily Update</span>
                         <input type="hidden" id="sample_id" name="sample_id" value="{{ $value['id'] }}">
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Daily Update Description</span>
                        <div class="input-group mt-1 mb-3">
                            <textarea class="form-control border-input" id="remark_pattern" name="remark_pattern" value="" placeholder="Input Description..." style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-4 mt-2">
                        <button type="submit" class="btn-blue btn-block">Save<i class="ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }); 

    $("#formStoreDailySample").validate({        
        submitHandler: function(form) {
            $.ajax({
                data: $('#formStoreDailySample').serialize(),
                url: '{{ route("sample.store-daily-sample") }}',           
                type: "get",
                dataType: 'json',            
                success: function (data) {
                    $('#formStoreDailySample').trigger("reset");
                    jQuery('.modalStoreDailySample').modal('hide');
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }        
    });
</script>