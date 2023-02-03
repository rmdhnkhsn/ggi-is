<div class="modal fade" id="editData" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.updateAssetMachine')}}" method="post" enctype="multipart/form-data">
            @csrf    
                <Input type="hidden" class="form-control borderInput mt-1 mb-3" name="id" id="edit_id">

                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Code</div>
                        <Input type="text" class="form-control borderInput mt-1 mb-3" name="code" id="edit_code">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Type</div>
                        <select class="form-control borderInput select2bs4 pointer" name="tipe" id="edit_tipe">
                            <option value="" selected>All Type</option>
                            @foreach($dataType as $d)
                                <option value="{{$d->tipe}}">{{$d->tipe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <select class="form-control borderInput select2bs4 pointer" name="jenis" id="edit_jenis">
                            <option value="" selected>All Category</option>
                            @foreach($dataCategory as $d)
                                <option value="{{$d->jenis}}">{{$d->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Description</div>
                        <textarea class="form-control borderInput mt-1 mb-3 py-2" name="deskripsi" id="edit_deskripsi"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date Recipient</div>
                        <Input type="date" class="form-control borderInput mt-1 mb-3" name="date" id="edit_date">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Brand</div>
                        <select class="form-control borderInput select2bs4 pointer" name="merk" id="edit_merk">
                            <option value="" selected>All Brand</option>
                            @foreach($dataBrand as $d)
                                <option value="{{$d->merk}}">{{$d->merk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Variant</div>
                        <Input type="text" class="form-control borderInput mt-1 mb-3" name="varian" id="edit_varian" placeholder="Input Variant">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Serial Number</div>
                        <Input type="text" class="form-control borderInput mt-1 mb-3" name="serialno" id="edit_serialno" placeholder="Input Serial Number">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Quantity</div>
                        <Input type="text" class="form-control borderInput mt-1 mb-3" name="qty" id="edit_qty" placeholder="Input Quantity">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Price</div>
                        <Input type="text" class="form-control borderInput mt-1 mb-3" name="price" id="edit_price" placeholder="Input Price">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Company</div>
                        <select class="form-control borderInput select2bs4 pointer" name="coOrigin" id="edit_coorigin">
                            <option value="" selected>All Company</option>
                            @foreach($dataCompany as $d)
                                <option value="{{$d->Code}}">{{$d->Code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch Origin</div>
                        <select class="form-control borderInput select2bs4 pointer" name="brOrigin" id="edit_brorigin">
                            <option value="" selected>All Branch</option>
                            @foreach($dataAssetBranch as $d)
                                <option value="{{$d->branch_code}}">{{$d->branch_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch Location</div>
                        <select class="form-control borderInput select2bs4 pointer" name="brLokasi" id="edit_brlokasi">
                            <option value="" selected>All Branch</option>
                            @foreach($dataAssetBranch as $d)
                                <option value="{{$d->branch_code}}">{{$d->branch_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Location</div>
                        <select class="form-control borderInput select2bs4 pointer" name="lokasi" id="edit_lokasi" >
                            <option value="" selected>All Location</option>
                            @foreach($dataLocation as $d)
                                <option value="{{$d->nama}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Location Type</div>
                        <select class="form-control borderInput select2bs4 pointer" name="tipeLokasi" id="edit_tipelokasi">
                            <option value="" selected>All Type</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Produksi">Produksi</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <div class="title-sm">Supplier</div>
                        <select class="form-control borderInput select2bs4 pointer" name="supplier" id="edit_supplier">
                            <option value="" selected>All Supplier</option>
                            @foreach($dataSupplier as $d)
                                <option value="{{$d->nama}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Condition</div>
                        <select class="form-control borderInput select2bs4 pointer" name="kondisi" id="edit_kondisi" >
                            <option value="" selected>All Condition</option>
                            <option value="Proses Perbaikan">Proses Perbaikan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                            <option value="Siap Pakai">Siap Pakai</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Assets Status</div>
                        <select class="form-control borderInput select2bs4 pointer" name="status" id="edit_status">
                            <option value="" selected>All Status</option>
                            <option value="Asset">Asset</option>
                            <option value="Rental">Rental</option>
                            <option value="Trial">Trial</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>