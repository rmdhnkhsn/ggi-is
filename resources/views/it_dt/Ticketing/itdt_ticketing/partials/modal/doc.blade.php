
<form class="formloading" action="{{route('tiket-doc-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="doc" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="wp-required">*Kolom wajib diisi</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control borderInput mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Vessel</div>
                        <input type="text" class="form-control borderInput mb-3" name="vessel" value="" placeholder="Vessel..." >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ETD <span class="text-ping">*</span> </div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="etd" value="" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ETA JKT</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="eta_jkt" value="" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Jumlah Kemasan <span class="text-ping">*</span> </div>
                        <input type="number" class="form-control borderInput mb-3" name="jum_kemasan" value="" placeholder="Jumlah Kemasan..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Jenis Kemasan <span class="text-ping">*</span> </div>
                        <input type="text" class="form-control borderInput mb-3" name="jenis_kemasan" value="" placeholder="Jenis Kemasan..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">SHIPPER <span class="text-ping">*</span> </div>
                        <input type="text" class="form-control borderInput mb-3" name="shipper" value="" placeholder="SHIPPER..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ORDER <span class="text-ping">*</span> </div>
                        <input type="text" class="form-control borderInput mb-3" name="order_ticket" value="" placeholder="ORDER..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">NO. BL / AWB <span class="text-ping">*</span> </div>
                        <input type="text" class="form-control borderInput mb-3" name="no_bl" value="" placeholder="NO. BL / AWB..." required>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Berat</div>
                        <input  type="number" step="0.01" class="form-control borderInput mb-3" name="berat" value="" placeholder="Berat..." >
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="title-sm mb-1">Jumlah Devisa (Import)</div>
                        <input type="text" class="form-control borderInput mb-3" name="jum_devisa" value="" placeholder="Jumlah Devisa..." >
                    </div> -->
                    <div class="col-12">
                        <div class="title-sm mb-1">Forwader</div>
                        <input type="text" class="form-control borderInput mb-3" name="forwader" value="" placeholder="Forwader..." >
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Nilai Import</div>
                        <div class="input-group flex mb-3">
                            <div class="input-group-prepend">
                                <select class="form-control pointer" id="" name="mata_uang" style="border-radius:10px 0 0 10px">
                                    <!-- <option selected>Select Money</option> -->
                                    <option value="USD" selected >USD</option>    
                                    <option value="JPY">JPY</option>    
                                    <option value="IDR">IDR</option>    
                                </select>
                            </div>
                            <input type="number" step="0.01" class="form-control borderInput" name="jum_devisa" value="" placeholder="Jumlah Devisa..." aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Keterangan</div>
                        <input type="text" class="form-control borderInput mb-3" name="keterangan" value="" placeholder="keterangan..." >
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Packing list <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="packing_list" name="packing_list" value="" required>
                            <label class="customFileLabelsBlue" for="packing_list">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Invoice <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="invoice" name="invoice" value="" required>
                            <label class="customFileLabelsBlue" for="invoice">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">BL dari supplier <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="bl_doc" name="bl_doc" value="" required>
                            <label class="customFileLabelsBlue" for="bl_doc">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 1</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_1" name="doc_1" value="">
                            <label class="customFileLabelsBlue" for="doc_1">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 2</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_2" name="doc_2" value="">
                            <label class="customFileLabelsBlue" for="doc_2">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 3</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_3" name="doc_3" value="">
                            <label class="customFileLabelsBlue" for="doc_3">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                    </div>
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>