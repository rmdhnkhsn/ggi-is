
<div class="modal fade" id="solvedPending{{$value['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <form action="{{ route('tiket.it.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Pending Ticket</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads">
                            <div class="imageUploadWrap5">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput5').trigger('click')">Select Image</button>
                                <input class="fileUploadInput5" type='file' id="images" name="foto_selesai"
                                    onchange="Pending(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent5">
                                <img class="fileUploadImg5" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removePending()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Comments</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="pesan_selesai" value="" placeholder="your problem Description" style="height:120px"></textarea>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                    <input type="hidden" class="form-control" id="status" name="status"  Value="Done">
                    <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{ $value['petugas']}}" >
                    <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $value['nama_petugas']}}" >
                    <input type="hidden" class="form-control" id="tgl_pengerjaan" name="tgl_pengerjaan"  Value="{{$value['tgl_pengerjaan']}}">
                    <input type="hidden" class="form-control" id="jam_pengerjaan" name="jam_pengerjaan"  Value="{{$value['jam_pengerjaan']}}">
                    <input type="hidden" class="form-control" id="tgl_pending" name="tgl_pending"  Value="{{$value['tgl_pending']}}">
                    <input type="hidden" class="form-control" id="jam_pending" name="jam_pending"  Value="{{$value['jam_pending']}}">
                    <input type="hidden" class="form-control" id="rusak" name="rusak"  Value="{{$value['rusak']}}">
                    <input type="hidden" class="form-control" id="pesan_pending" name="pesan_pending"  Value="{{$value['pesan_pending']}}">
                    <input type="hidden" class="form-control" id="jam_selesai" name="jam_selesai"  Value="{{$jam}}">
                    <input type="hidden" class="form-control" id="tgl_selesai" name="tgl_selesai"  Value="{{$tgl}}">
                    <input type="hidden" class="form-control" id="rusak" name="rusak"  Value="{{$value['rusak']}}">
                    <input type="hidden" class="form-control" id="deskripsi" name="deskripsi"  Value="{{$value['sub_rusak']}}">
                    <input type="hidden" class="form-control" id="deskripsi1" name="deskripsi1"  Value="{{$value['deskripsi']}}">
                    <input type="hidden" class="form-control" id="nik" name="nik"  Value="{{$value['nik']}}">
                    <div class="col-12 my-2">
                        <button type="submit" class="btn-green-md btn-block">Solved</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>