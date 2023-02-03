<form action="{{route ('warehouse-UpdateRemark',$value['id_barcode']) }}" method="post" enctype="multipart/form-data">
@csrf  
    <div class="modal fade" id="addRemark{{ $value['id_barcode'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:350px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                            <span class="title-15">Anomali Add Remark</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-12">
                            <span class="title-sm">Remark</span>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-icon"><i class="fas fa-pen-alt"></i></span>
                                </div>
                                <input type="text" class="form-control border-input" id="remark" name="remark" placeholder="masukan remark...">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            {{-- <input type="hidden" id="id" name="id" value="{{ $value['id'] }}"> --}}
                            <input type="hidden" id="id_barcode" name="id_barcode" value="{{ $value['id_barcode'] }}">
                            <button type="submit" class="btn-orange">Remark</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>