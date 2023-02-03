<div class="modal fade" id="editData{{ $value['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.updateAssetSetting',$value['id'])}}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <input type="hidden" name="id" value="{{ $value['id'] }}">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="title-sm">ID</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input ID">
                    </div> --}}
                    <div class="col-12">
                        <div class="title-sm">Setting</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="setting" value="{{ $value['setting'] }}" placeholder="Input Setting">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>