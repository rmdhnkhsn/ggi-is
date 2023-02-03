<div class="modal fade" id="copyWorksheet{{$row['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-24-dark">Copy Worksheet</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mt-2 mb-3">
                    <div class="borderlight"></div>
                </div>
            </div>
            <form action="{{ route('worksheet.copy_worksheet')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <input type="hidden" id="master_id" name="master_id" value="{{$row['id']}}">
                <div class="col-12 mb-3">
                    <div class="title-sm mb-1">Copy From</div>
                    <!-- <div class="input-group flex relative">
                        <div class="input-group-prepend">
                            <span class="containerLeft"></span>
                            <div class="borderLeft"></div>
                        </div> -->
                        <select class="form-control border-input-10 select2bs4 pointer" id="rekap_order_tujuan" name="rekap_order_tujuan" required>
                            <option selected disabled>Search style</option>
                            @foreach($copy_worksheet as $key => $value)
                            <option value="{{$value['master_id']}}">No PO : {{$value['no_po']}} | Style : {{substr($value['style_name'],0,40)}}...</option>  
                            @endforeach  
                        </select>
                    <!-- </div> -->
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-blue-md btn-block">Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 38px !important";
        console.log(element);
      });
	});
</script>