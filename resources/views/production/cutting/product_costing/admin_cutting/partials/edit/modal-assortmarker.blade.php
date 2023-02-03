<!-- Modal Assortmarker  -->
<form action="{{ route('update.assortmarker')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="edit_assort-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 py-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 mb-3">
                        <div class="wp-modal-title">Edit Assortmarker</div>
                    </div>
                    <div class="col-6" style="text-align:left">
                        <span class="title-sm">Size</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="hidden" id="id" name="id" value="{{$value->id}}">
                            <input type="hidden" id="form_id" name="form_id" value="{{$value->form_id}}">
                            <input type="text" class="form-control border-input" value="{{$value->size}}" id="size" name="size" placeholder="Input Size...">
                        </div>
                    </div>
                    <div class="col-6" style="text-align:left">
                        <span class="title-sm">Qty</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" value="{{$value->qty}}" id="qty" name="qty" placeholder="Input Qty...">
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn ctg-buatForm">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Assortmarker  -->

<!-- Modal Assortmarker  -->
<form action="{{route('adm.assort_new')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="add_assortmarker" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 py-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 mb-3">
                        <div class="wp-modal-title">Add Assortmarker</div>
                    </div>
                    <div class="col-6" style="text-align:left">
                        <span class="title-sm">Size</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="hidden" id="form_id" name="form_id" value="{{$data->id}}">
                            <input type="text" class="form-control border-input" value="" id="size" name="size" placeholder="Input Size...">
                        </div>
                    </div>
                    <div class="col-6" style="text-align:left">
                        <span class="title-sm">Qty</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" value="" id="qty" name="qty" placeholder="Input Qty...">
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn ctg-buatForm">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Assortmarker  -->

