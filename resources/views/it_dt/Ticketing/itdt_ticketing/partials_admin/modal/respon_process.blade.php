<div class="modal fade" id="solved{{$value['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <form action="{{ route('tiket.it.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Solving Ticket</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    @if($value['kategori_tiket']=='IT Support' || $value['kategori_tiket']=='IT RPA')
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" onchange="search_error(this);"  name="rusak" style="cursor:pointer" required >
                                <option value="" selected>sub problem</option>
                                @foreach($error as $key => $value1)
                                    <option value="{{$value1->kategori}}">{{$value1->kategori}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Sub Problem</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 option2 select2bs4" name="deskripsi" required>
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    @elseif(($value['kategori_tiket']=='IT DT')||($value['kategori_tiket']=='HR & GA'))
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                        <input class="form-control border-input-10" type="text" name="rusak" value="{{$value['judul']}}" readonly>
                        </div>
                    </div>

                        @if($value['kategori_tiket']=='IT DT')
                        <div class="col-12">
                            <div class="title-sm">Sub Problem</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue px-3" style="height:40px" for=""><i class="fs-18 fas fa-tools"></i></span>
                                </div>
                                <select class="form-control border-input-10 select2bs4" name="deskripsi" required style="cursor:pointer;"  >
                                    <option value="" selected>sub problem</option>
                                    @foreach($error as $key => $value1)
                                        @if($value1->kategori==$value['judul'])
                                            <option value="{{$value1->deskripsi}}">{{$value1->deskripsi}}</option>
                                        @endif  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="deskripsi" value="{{$value['judul']}}">
                        @endif
                    @endif
                    <div class="col-12">
                        <div class="title-sm mb-1">Your Image</div>
                        <div class="fileUploads mb-3">
                            <div class="imageUploadWrap4">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput4').trigger('click')">Select Image</button>
                                <input class="fileUploadInput4" type='file' id="images" name="foto_selesai"
                                    onchange="Process(this);" accept="image/*" />
                                <div class="dragText">
                                    <span>upload your file,<br/> or drop here</span>
                                </div>
                            </div>
                            <div class="fileUploadContent4">
                                <img class="fileUploadImg4" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeProcess()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Comments</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="pesan_selesai" value="" placeholder="your problem Description" style="height:120px" ></textarea>
                        </div>
                    </div>
                    @if($value['status']=='Close')
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                    <input type="hidden" class="form-control" id="status" name="status"  Value="Done">
                    <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{ Auth::user()->nik }}" >
                    <input type="hidden" class="form-control" id="nama_petuga" name="nama_petugas" value="{{ Auth::user()->nama }}" >
                    <input type="hidden" class="form-control" id="tgl_pengerjaan" name="tgl_pengerjaan"  Value="{{$tgl}}">
                    <input type="hidden" class="form-control" id="jam_pengerjaan" name="jam_pengerjaan"  Value="{{$jam}}">
                    <input type="hidden" class="form-control" id="tgl_selesai" name="tgl_selesai"  Value="{{$tgl}}">
                    <input type="hidden" class="form-control" id="jam_selesai" name="jam_selesai"  Value="{{$jam}}">
                    <input type="hidden" class="form-control" id="deskripsi1" name="deskripsi1" value="{{$value['deskripsi']}}">
                    <input type="hidden" class="form-control" id="nik" name="nik" value="{{$value['nik']}}">
                    @elseif($value['status']=='On Process')
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                    <input type="hidden" class="form-control" id="status" name="status"  Value="Done">
                    <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{$value['petugas']}}" >
                    <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="{{$value['nama_petugas']}}" >
                    <input type="hidden" class="form-control" id="tgl_pengerjaan" name="tgl_pengerjaan"  Value="{{$value['tgl_pengerjaan']}}">
                    <input type="hidden" class="form-control" id="jam_pengerjaan" name="jam_pengerjaan"  Value="{{$value['jam_pengerjaan']}}">
                    <input type="hidden" class="form-control" id="jam_selesai" name="jam_selesai"  Value="{{$jam}}">
                    <input type="hidden" class="form-control" id="tgl_selesai" name="tgl_selesai"  Value="{{$tgl}}">
                    <input type="hidden" class="form-control" id="nik" name="nik" value="{{$value['nik']}}">
                    <input type="hidden" class="form-control" id="deskripsi1" name="deskripsi1" value="{{$value['deskripsi']}}">
                    <input type="hidden" class="form-control" id="nik" name="nik" value="{{$value['nik']}}">
                    @endif
                    <div class="col-12 my-2">
                        <button type="submit" class="btn-green-md btn-block ">Solved</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
