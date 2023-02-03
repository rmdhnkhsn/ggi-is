<!-- Modal -->
<div class="modal fade" id="editSupplier{{$value->id_supplier}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:400px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="col-12 text-center">
                    <span class="title-18">Edit Supplier</span>
                </div>
                <form action="{{route('listsupplier.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id_supplier" id="id_supplier" value="{{$value->id_supplier}}">
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Category</span>
                            <div class="field2 mt-2">
                                <input type="text" id="name" name="name" value="{{$value->name}}" placeholder="Insert User Category">
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Update<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>  
</div>
