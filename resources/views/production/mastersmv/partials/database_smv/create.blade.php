
<button type="button" class="btn-upload-smv createSMV" data-toggle="modal" data-target="#createSMV">Upload SMV<i class="fs-18 ml-2 fas fa-upload"></i></button>

<form  action="{{route('mastersmv.storeSmvHeader')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="createSMV" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create SMV</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="title-sm">Style</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="style" name="style" placeholder="input style" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Item</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="item" name="item" placeholder="input Item" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Agent/Buyer</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <select class="form-control border-input2 select2bs4" id="buyer" name="buyer" style="cursor:pointer" required>
                                <option value="" selected>Pilih Buyer</option>
                                @foreach($ListBuyer as $key => $value)
                                    <option name="buyer2" value="{{$value['text']}}">{{$value['text']}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Order Qty</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-boxes"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="qty_order" name="qty_order" placeholder="input order qty">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Description</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sticky-note"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="desc" name="desc" placeholder="input description">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="date" name="date" placeholder="select date">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Line</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="line" name="line" placeholder="input line" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Manpower</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="manpower" name="manpower" placeholder="input manpower">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlueRight">opt</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Allowance</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="allowance" name="allowance" placeholder="input allowance" required>
                            <div class="input-group-prepend">
                                <span class="inputGroupBlueRight">%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="title-sm">Sketch</div>
                        <div class="fileUploads mt-1 mb-3">
                            <div class="imageUploadWrap">
                                <i class="iconUpload fas fa-upload"></i>
                                <button class="d-none" type="button" id="images"
                                    onclick="$('.fileUploadInput').trigger('click')">Select Image</button>
                                <input class="fileUploadInput" type='file' id="images" name="foto"
                                    onchange="readURL(this);" accept="image/*" />
                                <div class="dragText">upload your file,<br/>or drop here</div>
                            </div>
                            <div class="fileUploadContent">
                                <img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                                <button type="button" onclick="removeUpload()" class="removeImage">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 flex gap-3">
                        <button type="submit" class="btn-blue-md w-100">Create SMV</button>
                        <button type="button" class="btn-outline-grey-md w-100" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>