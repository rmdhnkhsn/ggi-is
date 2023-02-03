<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="complianceHR" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="HR & GA" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="judul" value="Compliance" placeholder="category..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
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
                    <div class="col-12 my-2">
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
    <div class="modal fade" id="umumHR" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="HR & GA" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="" name="judul" style="cursor:pointer" required>
                                <option value="" selected>Select Category</option>
                                <!-- <option value="Booking Kendaraan">Booking Kendaraan</option>     -->
                                <option value="Permintaan makanan di jam lembur">Permintaan makanan di jam lembur</option>    
                                <option value="Umum Lainnya">Lainnya</option>    
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" value="" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
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
                    <div class="col-12 my-2">
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
    <div class="modal fade" id="puHR" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:660px">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="HR & GA" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="" name="judul" style="cursor:pointer" required>
                                <option value="" selected>Select Category</option>
                                <option value="Membersihkan Toilet">Membersihkan Toilet</option>    
                                <option value="Membersihkan Ruangan">Membersihkan Ruangan</option>    
                                <option value="Isi Ulang Galon">Isi Ulang Galon</option>    
                                <option value="Penggantian Lampu">Penggantian Lampu</option>
                                <option value="Lainnya">Lainnya</option>    
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="deskripsi" name="deskripsi" value="" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads mb-3">
                            <div class="imageUploadWrapPU">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInputPU').trigger('click')">Select Image</button>
                                <input class="fileUploadInputPU" type='file' id="images" name="foto"
                                    onchange="PU(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContentPU">
                                <img class="fileUploadImgPU" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removePU()" class="removeImage">
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
                    <div class="col-12 my-2">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ====================== -->

<!-- <div class="modal fade" id="bookingHR" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
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
                    <input type="text" class="form-control border-input-10 mb-3" name="" placeholder="your name..." >
                </div>
                <div class="col-md-6">
                    <div class="title-sm mb-1">Ticket For</div>
                    <input type="text" class="form-control border-input-10 mb-3" name="" placeholder="ticket for..." >
                </div>
                <div class="col-md-6">
                    <div class="title-sm mb-1">Category</div>
                    <input type="text" class="form-control border-input-10 mb-3" name="" value="booking ruangan meeting" readonly>
                </div>
                <div class="col-12">
                    <span class="title-sm">Pilih Ruangan</span>
                    <div class="bookingContainer mt-1 mb-2">
                        <div class="radioBooking">
                            <input type="radio" name="pilih_ruangan" id="radio1" class="bookingInput">
                            <label for="radio1" class="labelBooking">R. Meeting 1</label>
                        </div>
                        <div class="radioBooking">
                            <input type="radio" name="pilih_ruangan" id="radio2" class="bookingInput">
                            <label for="radio2" class="labelBooking">R. Meeting 2</label>
                        </div>
                        <div class="radioBooking">
                            <input type="radio" name="pilih_ruangan" id="radio3" class="bookingInput">
                            <label for="radio3" class="labelBooking">R. Meeting 3</label>
                        </div>
                        <div class="radioBooking">
                            <input type="radio" name="pilih_ruangan" id="radio4" class="bookingInput">
                            <label for="radio4" class="labelBooking">R. Meeting 4</label>
                        </div>
                        <div class="radioBooking">
                            <input type="radio" name="pilih_ruangan" id="radio5" class="bookingInput">
                            <label for="radio5" class="labelBooking">R. Meeting 5</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Time to start using</div>
                    <div class="input-group flex mt-1">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-20 fas fa-clock"></i></span>
                        </div>
                        <input type="time" class="form-control border-input-10 mb-3" name="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Time Finish using</div>
                    <div class="input-group flex mt-1">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-20 fas fa-clock"></i></span>
                        </div>
                        <input type="time" class="form-control border-input-10 mb-3" name="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm mb-1">Description</div>
                    <div class="input-group mb-3">
                        <textarea class="form-control border-input-10" id="" name="" value="" placeholder="have problem..? write here" style="height:120px"></textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button type="button" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ====================== -->
<form class="formloading" action="{{ route('tiket-it-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="payrollHR"  role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori_tiket" value="HR & GA" placeholder="ticket for..." readonly >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="" name="judul" style="cursor:pointer" required>
                                <option value="" selected>Select Category</option>
                                <option value="BCA">BCA</option>  
                                <option value="CIMB NIAGA">CIMB NIAGA</option>  
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="deskripsi" value="" maxlength="249" placeholder="have problem..? write here" style="height:120px"></textarea>
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
                    <div class="col-12 my-2">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ====================== -->
