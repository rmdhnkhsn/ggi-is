<div class="modal fade" id="editData{{ $value['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.updateAssetBrand',$value['id'])}}" method="post" enctype="multipart/form-data">
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
                        <div class="title-sm">Company</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="company" value="{{ $value['company'] }}" placeholder="Input Company">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Brand</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="merk" value="{{ $value['merk'] }}" placeholder="Input Brand">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Status</div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapperRadio mt-1">
                            <input type="radio" name="status" value="Aktif" class="radioGreen" id="Active2{{ $value['id'] }}" {{ $value ? ($value->status == 'Aktif' ? 'checked' : '') : '' }}>
                            <label for="Active2{{ $value['id'] }}" class="optionGreen check">
                                <span class="descGreen">Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapperRadio mt-1">
                            <input type="radio" name="status" value="NonAktif" class="radioOrange" id="NonActive2{{ $value['id'] }}" {{ $value ? ($value->status == 'NonAktif' ? 'checked' : '') : '' }}>
                            <label for="NonActive2{{ $value['id'] }}" class="optionOrange check">
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