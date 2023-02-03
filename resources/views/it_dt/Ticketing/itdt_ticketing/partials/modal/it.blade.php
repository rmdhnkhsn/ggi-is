
<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="networkIT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT Support" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="Network" placeholder="category..." readonly>
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
                            <div class="imageUploadWrap">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput').trigger('click')">Select Image</button>
                                <input class="fileUploadInput" type='file' id="images" name="foto"
                                    onchange="Network(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent">
                                <img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeNetwork()" class="removeImage">
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
    <div class="modal fade" id="softwareIT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT Support" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="Software" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap2">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput2').trigger('click')">Select Image</button>
                                <input class="fileUploadInput2" type='file' id="images" name="foto"
                                    onchange="Software(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent2">
                                <img class="fileUploadImg2" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeSoftware()" class="removeImage">
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
    <div class="modal fade" id="hardwareIT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT Support" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="Hardware" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10"  id="deskripsi" name="deskripsi" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap3">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput3').trigger('click')">Select Image</button>
                                <input class="fileUploadInput3" type='file' id="images" name="foto"
                                    onchange="Hardware(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent3">
                                <img class="fileUploadImg3" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeHardware()" class="removeImage">
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
    <div class="modal fade" id="peminjamanIT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT Support" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="Peminjaman" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap4">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput4').trigger('click')">Select Image</button>
                                <input class="fileUploadInput4" type='file' id="images" name="foto"
                                    onchange="Pinjam(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent4">
                                <img class="fileUploadImg4" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removePinjam()" class="removeImage">
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
    <div class="modal fade" id="rpaIT" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="IT RPA" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="RPA" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrapRPA">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInputRPA').trigger('click')">Select Image</button>
                                <input class="fileUploadInputRPA" type='file' id="images" name="foto"
                                    onchange="Rpa(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContentRPA">
                                <img class="fileUploadImgRPA" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeRpa()" class="removeImage">
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