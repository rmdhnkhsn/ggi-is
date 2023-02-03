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
                    <span class="title-18">Create Standard</span>
                </div>
                <form action="{{route('accessories_standar.store')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">From</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="from" name="from" value="" placeholder="Insert From">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">To</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="to" name="to" value="" placeholder="Insert To">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Amount for</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="amf" name="amf" value="" placeholder="Insert Amount For">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Acceptable</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="acc" name="acc" value="" placeholder="Insert Acceptable">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <span class="general-identity-title">Reject</span>
                            <div class="field2 mt-2">
                                <input type="number" step="0.01" id="rjct" name="rjct" value="" placeholder="Insert Reject">
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
