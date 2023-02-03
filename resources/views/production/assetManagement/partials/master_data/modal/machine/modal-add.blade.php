<form  action="{{route('asset.master.storeAssetMachine')}}" method="post" enctype="multipart/form-data">
   @csrf 
    <div class="modal fade" id="addData" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Add Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Code</div>
                        <input type="text" class="form-control borderInput" id="" name="code" placeholder="Input Code">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Type</div>
                        <select class="form-control borderInput pointer select2bs4" name="tipe" id="">
                            <option selected disabled>Select Type</option>
                            @foreach ($dataType as $key2 =>$value2)
                                <option value="{{ $value2['tipe'] }}">{{ $value2['tipe'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Category</div>
                        <select class="form-control borderInput pointer select2bs4" name="jenis" id="">
                            <option selected disabled>Select Category</option>
                            @foreach ($dataCategory as $key3 => $value3)
                                <option value="{{ $value3['jenis'] }}">{{ $value3['jenis'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Description</div>
                        <textarea class="form-control borderInput py-2" name="deskripsi" id=""></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Date Recipient</div>
                        <Input type="date" class="form-control borderInput" name="date" id="">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Brand</div>
                        <select class="form-control borderInput pointer select2bs4" name="merk" id="">
                            <option selected disabled>Select Brand</option>
                            @foreach ($dataBrand as $key4 => $value4)
                                <option value="{{ $value4['merk'] }}">{{ $value4['merk'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Variant</div>
                        <Input type="text" class="form-control borderInput" name="varian" id="" placeholder="Input Variant">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Serial Number</div>
                        <Input type="text" class="form-control borderInput" name="serialno" id="" placeholder="Input Serial Number">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Quantity</div>
                        <Input type="text" class="form-control borderInput" name="qty" id="" placeholder="Input Quantity">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Price</div>
                        <Input type="text" class="form-control borderInput" name="price" id="" placeholder="Input Price">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Company</div>
                        <select class="form-control borderInput pointer select2bs4" name="coOrigin" id="">
                            <option selected disabled>Select Company</option>
                            @foreach ($dataCompany as $key5 => $value5)
                                <option value="{{ $value5['Name'] }}">{{ $value5['Name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Branch Origin</div>
                        <select class="form-control borderInput pointer select2bs4" name="brOrigin" id="">
                            <option selected disabled>Select Branch Origin</option>
                            @foreach ($dataBranch as $key6 => $value6)
                                <option value="{{ $value6['nama_branch'] }}">{{ $value6['nama_branch'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Branch Location</div>
                        <select class="form-control borderInput pointer select2bs4" name="brLokasi" id="">
                            <option selected disabled>Select Branch Location</option>
                            @foreach ($dataLocation as $key7 => $value7)
                                <option value="{{ $value7['nama'] }}">{{ $value7['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Location</div>
                        <select class="form-control borderInput pointer select2bs4" name="lokasi" id="">
                            <option selected disabled>Select Location</option>
                            @foreach ($dataLocation as $key8 => $value8)
                                <option value="{{ $value8['nama'] }}">{{ $value8['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Location Type</div>
                        <select class="form-control borderInput pointer select2bs4" name="tipeLokasi" id="">
                            <option selected disabled>Select Location</option>
                            @foreach ($dataLocation as $key16 => $value16)
                                <option value="{{ $value16['tipe'] }}">{{ $value16['tipe'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Supplier</div>
                        <select class="form-control borderInput pointer select2bs4" name="supplier" id="">
                            <option selected disabled>Select Supplier</option>
                            @foreach ($dataSupplier as $key9 => $value9)
                                <option value="{{ $value9['nama'] }}">{{ $value9['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Condition</div>
                        <select class="form-control borderInput pointer select2bs4" name="kondisi" id="">
                            <option selected disabled>Select Condition</option>
                            @foreach ($dataCondition as $key10 => $value10)
                                <option value="{{ $value10['condition'] }}">{{ $value10['condition'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-sm mb-1">Assets Status</div>
                        <select class="form-control borderInput pointer select2bs4" name="status" id="">
                            <option selected disabled>Select Assets Status</option>
                                <option value="Asset">Asset</option>
                                <option value="Rental">Rental</option>
                                <option value="Trial">Trial</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>