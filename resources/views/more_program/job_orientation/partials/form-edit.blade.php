<div class="modal fade" id="edit-{{$value3->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 pt-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form action="{{ route('job.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row px-4">
                    <div class="col-12 text-center mb-3">
                        <span class="title-22" style="font-weight:600">Edit Your Document</span>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Document Name</span>
                        <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                        <div class="input-group">
                            <input type="text" class="form-control border-input-10" id="nama_dokumen" name="nama_dokumen" placeholder="document name..." value="{{$value3->nama_dokumen}}" required>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Public</span>
                        <select class="form-control select2bs4" style="width: 100%;" name="remark" id="remark">
                            <option></option>
                            <option {{ $value3->remark == 1 ? 'selected' : ''}} value="1">Yes</option>
                            <option {{ $value3->remark == null ? 'selected' : ''}} value="">No</option>
                        </select>
                    </div>
                    @if($value3->kategori == 'LINK')
                    <div class="col-12">
                        <span class="title-sm">Link</span>
                        <input type="hidden" id="kategori" name="kategori" value="LINK">
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" id="dokumen" name="dokumen" placeholder="document name..." value="{{$value3->dokumen}}" required>
                        </div>
                    </div>
                    @else
                    <div class="col-12 mb-3">
                        <span class="title-sm">Your Document</span>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="customFile{{$value3->id}}" name="dokumen" value="dokumen">
                            <label class="customFileLabelsBlue" for="customFile{{$value3->id}}">
                            <span class="chooseFile">{{$value3->dokumen}}</span></label>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 my-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Save<i class="ml-2 fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>