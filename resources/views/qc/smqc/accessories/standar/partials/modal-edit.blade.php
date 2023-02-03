<!-- Modal -->
<div class="modal fade" id="standardAccessories{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                    <span class="title-18">Edit Standard</span>
                </div>
                <form action="{{route('accessories_standar.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">From</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="from" name="from" value="{{$value->from}}" placeholder="Insert From">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">To</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="to" name="to" value="{{$value->to}}" placeholder="Insert To">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Amount for</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="amf" name="amf" value="{{$value->amf}}" placeholder="Insert Amount For">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Acceptable</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="acc" name="acc" value="{{$value->acc}}" placeholder="Insert Acceptable">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Reject</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="rjct" name="rjct" value="{{$value->rjct}}" placeholder="Insert Reject">
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
