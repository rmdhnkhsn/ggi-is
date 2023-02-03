<div class="modal fade" id="modalPO" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Add PO</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                </div> 
                <form action="{{ route('worksheet.tambah_po')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="padding-bottom:20px;">
                        <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
                        <input type="hidden" id="id_rekap_order" name="rekap_order_id">
                        <input type="hidden" id="style_rekap_order" name="style" value="" placeholder="">
                        <input type="hidden" id="ex_fact_rekap_order" name="ex_fact" value="" placeholder="">
                        <input type="hidden" id="po_creation_rekap_order" name="po_creation" value="" placeholder="">
                        <div class="col-12">
                            <div class="title-sm">PO Number</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-up-alt"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs49 pointer" id="po_number" name="po_number" required>
                                    <option selected disabled>Example (0145365)</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-12 justify-end">
                            <button type="submit" class="btn-blue-md">Add<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>