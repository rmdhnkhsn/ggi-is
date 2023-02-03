<!-- Modal -->
<div class="modal fade" id="inac" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:600px">
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
                    <span class="title-18">Create Buyer</span>
                </div>
                <form action="{{route('listbuyer.store')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Buyer Name</span>
                            <div class="field2 mt-2">
                                <input type="text" id="name" name="name" value="" placeholder="Insert Buyer Name">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Point per Roll</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="point" name="point" value="" placeholder="Insert Point per Roll">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Point per Order</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="point2" name="point2" value="" placeholder="Insert Point per Order">
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
