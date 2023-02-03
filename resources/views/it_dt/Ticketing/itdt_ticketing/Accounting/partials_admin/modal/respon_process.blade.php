<div class="modal fade" id="pembayaran{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <form action="{{route('tiket-acc-pencairan')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Disbursement</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Amount</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="amount_rencana" value="{{number_format($value->amount_rencana, 2, ",", ".")}}" placeholder="0,00" readonly>
                        <input type="hidden" class="form-control border-input-10 mb-3" name="id" value="{{$value->id}}" readonly>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Account Code</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="akun_kredit" value="{{$value->akun_kredit}}" placeholder="0,00" readonly>
                    </div>
                    <div class="col-md-12">
                        <div class="title-sm">Disbursement type</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="height:40px"><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="" name="kode_pencairan" style="cursor:pointer" required>
                                <!-- <option value="" selected>Disbursement type</option> -->
                                @foreach($jenis_pencairan as $key7=>$value7)
                                <option {{$value->kode_pencairan == $value7->kode_jenis ? 'selected' : ''}} value="{{ $value7->kode_jenis }}">{{$value7->jenis_pencairan}}</option>    
                                <!-- <option value="{{$value7->kode_jenis}}">{{$value7->jenis_pencairan}}</option> -->
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="desc_pencairan" value="" placeholder="your Description" style="height:120px"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="title-sm mb-1">Bukti Pencairan</div>
                        <div class="fileUploads mb-3">
                            <div class="imageUploadWrap4">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput4').trigger('click')">Select Image</button>
                                <input class="fileUploadInput4" type='file' id="images" name="bukti_pencairan"
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
                    <div class="col-12 my-2">
                        <button type="submit" class="btn-green-md btn-block ">Disbursement</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
