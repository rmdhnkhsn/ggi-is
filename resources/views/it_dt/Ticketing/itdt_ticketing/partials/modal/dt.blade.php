<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="jdeDT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Ticket For</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT DT" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>

                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="JDE" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" value="" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap5">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput5').trigger('click')">Select Image</button>
                                <input class="fileUploadInput5" type='file' id="images" name="foto"
                                    onchange="JDE(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent5">
                                <img class="fileUploadImg5" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeJDE()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="ip" name="ip" value="{{$data->ip}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="jam_pengajuan" name="jam_pengajuan"  Value="{{$jam}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ====================== -->
<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="gccDT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Ticket For</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT DT" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="GCC" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" value="" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap6">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput6').trigger('click')">Select Image</button>
                                <input class="fileUploadInput6" type='file' id="images" name="foto"
                                    onchange="GCC(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent6">
                                <img class="fileUploadImg6" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeGCC()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="ip" name="ip" value="{{$data->ip}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="jam_pengajuan" name="jam_pengajuan"  Value="{{$jam}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- ====================== -->
<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="hrisDT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Ticket For</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT DT" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="HRIS" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" value="" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap7">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput7').trigger('click')">Select Image</button>
                                <input class="fileUploadInput7" type='file' id="images" name="foto"
                                    onchange="HRIS(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent7">
                                <img class="fileUploadImg7" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeHRIS()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="ip" name="ip" value="{{$data->ip}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="jam_pengajuan" name="jam_pengajuan"  Value="{{$jam}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ====================== -->
<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="smqcDT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Ticket For</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT DT" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="SMQC" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" value="" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap8">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput8').trigger('click')">Select Image</button>
                                <input class="fileUploadInput8" type='file' id="images" name="foto"
                                    onchange="SMQC(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent8">
                                <img class="fileUploadImg8" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeSMQC()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="ip" name="ip" value="{{$data->ip}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="jam_pengajuan" name="jam_pengajuan"  Value="{{$jam}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ====================== -->