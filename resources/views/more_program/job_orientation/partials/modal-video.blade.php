<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 pt-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form id="saveVideo" action="{{ route('job.video_store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row px-4">
                    <div class="col-12 text-center mb-3">
                        <span class="title-22" style="font-weight:600">Your Video</span>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Document Name</span>
                        <input type="hidden" name="created_by" id="created_by" value="{{auth()->user()->nik}}">
                        <input type="hidden" name="created_name" id="created_name" value="{{auth()->user()->nama}}">
                        <input type="hidden" name="branch" id="branch" value="{{auth()->user()->branch}}">
                        <input type="hidden" name="branchdetail" id="branchdetail" value="{{auth()->user()->branchdetail}}">
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="nama_dokumen" name="nama_dokumen" placeholder="document name..." required>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Select Departemen</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:140px">Departemen</span>
                            </div>
                            <select class="form-control border-input-10 select2bs4_video" name="departemen" id="departemen_video">
                                <option selected disabled>Select Departemen</option>
                                @foreach($departemen as $key => $value)
                                <option value="{{$value['departemen']}}">{{$value['departemen']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Select Division</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:140px">Division</span>
                            </div>
                            <select class="form-control border-input-10 select2bs4_video" name="bagian" id="bagian_video">
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Your Video</span>
                        <div class="customFile mt-1 mb-3">
                            <input type="hidden" name="kategori" id="kategori" value="VIDEO">
                            <input type="file" class="customFileInput" id="customFile" name="dokumen" value="dokumen">
                            <label class="customFileLabelsBlue" for="customFile">
                            <span class="chooseFile"></span></label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch17"  value="1" name="remark">
                            <label class="custom-control-label" for="customSwitch17">Set Public</label>
                        </div>
                    </div>
                    <div class="col-12 my-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Save<i class="ml-2 fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>