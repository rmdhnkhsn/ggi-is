<div class="modal fade" id="CreateDeliv" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                        <span class="title-15">Create QRcode</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <span class="title-sm">Number Contract</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-file-signature"></i></span>
                            </div>
                            <input type="text" class="form-control border-input" placeholder="input contract number...">
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span class="title-sm">Vendor Name</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-users"></i></span>
                            </div>
                            <input type="text" class="form-control border-input" placeholder="input vendor name...">
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span class="title-sm">Transaction Date</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <a href="{{ route('receiving-details') }}" class="btn-blue">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>