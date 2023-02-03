
<form  action="{{route('mastersmv.updateSmvHeader',$value['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="triggerEditSMV{{ $value['id'] }}" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Edit SMV</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                </div>
                <form  action="{{route('mastersmv.import')}}" id="frm_create_smv" files="true" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Style</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="style" name="style" value="{{ $value['style'] }}" placeholder="input style">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Item</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="item" name="item" value="{{ $value['item'] }}" placeholder="input style">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Agent/Buyer</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4 pointer" id="" name="buyer" required>
                                    <option selected >{{ $value['buyer'] }}</option>
                                    @foreach($ListBuyer as $key3 => $value3)
                                        <option name="buyer" value="{{$value3['text']}}">{{$value3['text']}}</option>    
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
                                <input type="text" class="form-control borderInput" id="" name="qty_order" value="{{ $value['qty_order'] }}" placeholder="input order qty">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Description</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sticky-note"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="" name="desc" value="{{ $value['desc'] }}" placeholder="input description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Date</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control borderInput" id="" name="date" value="{{ $value['date'] }}" placeholder="select date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Manpower</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="" name="manpower" value="{{ $value['manpower'] }}" placeholder="input manpower">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlueRight">opt</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Line</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="" name="line" value="{{ $value['line'] }}" placeholder="input line">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Allowance</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-money-bill-wave"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" id="" name="allowance" value="{{ $value['allowance'] }}"  placeholder="input allowance">
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
                                    <input class="fileUploadInput"  type='file' id="images" name="foto" value=""
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="dragText">upload your file,<br/>or drop here @php
                                        echo storage_path()."/storage/".$value['foto'];
                                    @endphp</div>
                                </div>
                                <div class="fileUploadContent">
                                    <img class="fileUploadImg" src="{{ url('storage/'.$value['foto']) }}" alt="Image Format Only" data-toggle="lightbox" />
                                    <button type="button" onclick="removeUpload()" class="removeImage">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-12 mt-3 flex gap-3">
                        <button type="submit" class="btn-yellow-md w-100">Edit Data Process</button>
                        <button type="button" class="btn-outline-grey-md w-100" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
     $('.imageUploadWrap').hide();
    $(".fileUploadContent").show();
</script>