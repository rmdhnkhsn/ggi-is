<!-- Modal Edit Report Biasa -->
<div class="modal fade" id="modal-edit{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="title-18">Edit Label</span>
                    </div>
                </div>
                <form action="{{route('cutting.label_update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">QTY Utuh</span>
                            <div class="field2 mt-2">
                                <input type="text" id="qty_utuh" name="qty_utuh" value="{{$value->qty_utuh}}" placeholder="Insert QTY Utuh">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Pemakaian Kain</span>
                            <div class="field2 mt-2">
                                <input type="text" id="pemakaian_kain" name="pemakaian_kain" value="{{$value->pemakaian_kain}}" placeholder="Insert Pemakaian Kain">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Satuan</span>
                            <div class="field2 mt-2">
                                <input type="text" id="satuan" name="satuan" value="{{$value->satuan}}" placeholder="Insert Satuan">
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>  