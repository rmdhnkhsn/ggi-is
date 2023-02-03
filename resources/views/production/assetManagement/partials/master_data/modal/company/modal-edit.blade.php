<div class="modal fade" id="editData{{  $value['ID'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('asset.master.updateAssetCompany', $value['ID'])}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Code</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="Code" value="{{  $value['Code'] }}" placeholder="Input Code">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Name</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="Name"  value="{{  $value['Name'] }}" placeholder="Input Name">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Address</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="Address"   value="{{  $value['Address'] }}" placeholder="Input Address">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Status</div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapperRadio mt-1">
                            <input type="radio" name="Status" value="Aktif" class="radioGreen" id="Active2{{ $value['ID'] }}" {{ $value ? ($value->Status == 'Aktif' ? 'checked' : '') : '' }} >
                            <label for="Active2{{ $value['ID'] }}" class="optionGreen check">
                                <span class="descGreen">Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapperRadio mt-1">
                            <input type="radio" name="Status" value="NonAktif" class="radioOrange" id="NonActive2{{ $value['ID'] }}"{{ $value ? ($value->Status == 'NonAktif' ? 'checked' : '') : '' }}>
                            <label for="NonActive2{{ $value['ID'] }}" class="optionOrange check">
                                <span class="descOrange">Non Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>