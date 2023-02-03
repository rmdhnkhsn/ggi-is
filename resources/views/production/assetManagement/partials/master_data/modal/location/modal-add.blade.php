<form  action="{{ route('asset.master.storeAssetLocation')}}" method="post" enctype="multipart/form-data">
@csrf 
    <div class="modal fade" id="addData" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                <form action="">
                    <div class="row">
                        <div class="col-12 justify-sb">
                            <div class="title-18">Add Data</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="borderlight2"></div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Branch</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="branch" placeholder="Input Branch">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Type</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="tipe" placeholder="Input Type">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Name</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="nama" placeholder="Input Name">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Address</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="address" placeholder="Input Address">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Status</div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapperRadio mt-1">
                                <input type="radio" name="status" value="Aktif" class="radioGreen" id="Active">
                                <label for="Active" class="optionGreen check">
                                    <span class="descGreen">Active</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapperRadio mt-1">
                                <input type="radio" name="status" value="NonAktif" class="radioOrange" id="NonActive">
                                <label for="NonActive" class="optionOrange check">
                                    <span class="descOrange">Non Active</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-blue-md btn-block success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>