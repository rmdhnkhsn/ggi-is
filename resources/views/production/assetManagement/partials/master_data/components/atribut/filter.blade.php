<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.machine')}}" method="GET" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="title-sm">Code</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="search_code" name="code">
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Type</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_tipe" name="tipe">
                            <option value="" selected>All Type</option>
                            @foreach($dataType as $d)
                                <option value="{{$d->tipe}}">{{$d->tipe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Category</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_jenis" name="jenis">
                            <option value="" selected>All Category</option>
                            @foreach($dataCategory as $d)
                                <option value="{{$d->jenis}}">{{$d->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Description</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="search_deskripsi" name="deskripsi">
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Brand</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_merk" name="merk">
                            <option value="" selected>All Brand</option>
                            @foreach($dataBrand as $d)
                                <option value="{{$d->merk}}">{{$d->merk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Variant</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="search_varian" name="varian">
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Serial Number</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="search_serialno" name="serialno">
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Company</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_coorigin" name="coorigin">
                            <option value="" selected>All Company</option>
                            @foreach($dataCompany as $d)
                                <option value="{{$d->Code}}">{{$d->Code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Br.Origin</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_brorigin" name="brorigin">
                            <option value="" selected>All Branch</option>
                            @foreach($dataAssetBranch as $d)
                                <option value="{{$d->branch_code}}">{{$d->branch_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Br.Location</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_brlokasi" name="brlokasi">
                            <option value="" selected>All Branch</option>
                            @foreach($dataAssetBranch as $d)
                                <option value="{{$d->branch_code}}">{{$d->branch_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Location</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_lokasi" name="lokasi">
                            <option value="" selected>All Location</option>
                            @foreach($dataLocation as $d)
                                <option value="{{$d->nama}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Location Type</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_tipelokasi" name="tipelokasi">
                            <option value="" selected>All Type</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Produksi">Produksi</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Supplier</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_supplier" name="supplier">
                            <option value="" selected>All Supplier</option>
                            @foreach($dataSupplier as $d)
                                <option value="{{$d->nama}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Condition</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_kondisi" name="kondisi">
                            <option value="" selected>All Condition</option>
                            <option value="Proses Perbaikan">Proses Perbaikan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                            <option value="Siap Pakai">Siap Pakai</option>
                            <option value="Tidak Siap Pakai">Tidak Siap Pakai</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Status</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_status" name="status">
                            <option value="" selected>All Status</option>
                            <option value="Asset">Asset</option>
                            <option value="Rental">Rental</option>
                            <option value="Trial">Trial</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Status Dipinjamkan</div>
                        <select class="form-control borderInput select2bs4 pointer" id="search_dipinjamkan" name="dipinjamkan">
                            <option value="" selected>All</option>
                            <option value="Dipinjamkan">Dipinjamkan</option>
                            <option value="Transit">Transit</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block">Filter Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>