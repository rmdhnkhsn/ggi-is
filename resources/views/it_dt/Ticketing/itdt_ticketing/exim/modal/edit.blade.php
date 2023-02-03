
<form class="formloading" action="{{route('update-ticketuser-doc')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="edit{{$value2->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Update Ticket</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Vessel</div>
                        <input type="hidden" class="form-control border-input-10 mb-3" name="id" value="{{$value2->id}}" placeholder="Nomor Aju..." >
                        <input type="hidden" class="form-control border-input-10 mb-3" name="process" value="update_user">
                        <input type="text" class="form-control border-input-10 mb-3" name="vessel" value="{{$value2->vessel}}" placeholder="Vessel..." >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ETD *</div>
                        <input type="date" class="form-control border-input-10 mb-3" name="etd" value="{{$value2->etd}}" required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ETA JKT</div>
                        <input type="date" class="form-control border-input-10 mb-3" name="eta_jkt" value="{{$value2->eta_jkt}}"  >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Jumlah Kemasan *</div>
                        <input type="number" class="form-control border-input-10 mb-3" name="jum_kemasan" value="{{$value2->jum_kemasan}}" placeholder="Jumlah Kemasan..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Jeni Kemasan *</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="jenis_kemasan" value="{{$value2->jenis_kemasan}}" placeholder="Jenis Kemasan..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">SHIPPER *</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="shipper" value="{{$value2->shipper}}" placeholder="SHIPPER..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">ORDER *</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="order_ticket" value="{{$value2->order_ticket}}" placeholder="ORDER..." required >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">NO. BL / AWB *</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="no_bl" value="{{$value2->no_bl}}" placeholder="NO. BL / AWB..." required>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Berat</div>
                        <input  type="number" step="0.01" class="form-control border-input-10 mb-3" name="berat" value="{{$value2->berat}}" placeholder="Berat..." >
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="title-sm mb-1">Jumlah Devisa (Import)</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="jum_devisa" value="{{$value2->jum_devisa}}" placeholder="Jumlah Devisa..." >
                    </div> -->
                    <div class="col-6">
                        <div class="title-sm mb-1">Jumlah Devisa (import)</div>
                        <div class="input-group flex mb-3">
                            <div class="input-group-prepend">
                                <select class="form-control pointer" id="" name="mata_uang" style="border-radius:10px 0 0 10px">
                                    <option {{ $value2->mata_uang ==null ? 'selected' : ''}} value="USD">USD</option>
                                    <option name="USD" {{ $value2->mata_uang == 'USD' ? 'selected' : ''}} value="USD">USD</option>    
                                    <option name="JPY" {{ $value2->mata_uang == 'JPY' ? 'selected' : ''}} value="JPY">JPY</option>    
                                    <option name="IDR" {{ $value2->mata_uang == 'IDR' ? 'selected' : ''}} value="IDR">IDR</option>    
                                </select>
                            </div>
                            <input type="number" step="0.01" class="form-control borderInput" name="jum_devisa" value="{{$value2->jum_devisa}}" placeholder="Jumlah Devisa..." aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Forwader</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="forwader" value="{{$value2->forwader}}" placeholder="Forwader..." >
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm mb-1">Keterangan</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="keterangan" value="{{$value2->keterangan}}" placeholder="keterangan..." >
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Packing list <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="packing_list" name="packing_list" value="" >
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="packing_list">
                                <span class="chooseFile">{{$value2->packing_list}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Invoice <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="invoice" name="invoice" value="" >
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="invoice">
                                <span class="chooseFile">{{$value2->invoice}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">BL dari supplier <span class="text-ping">*</span> </div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="bl_doc" name="bl_doc" value="" >
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="bl_doc">
                                <span class="chooseFile">{{$value2->bl_doc}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 1</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_1" name="doc_1" value="">
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="doc_1">
                                <span class="chooseFile">{{$value2->doc_1}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 2</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_2" name="doc_2" value="">
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="doc_2">
                                <span class="chooseFile">{{$value2->doc_2}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Addition Doc 3</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="doc_3" name="doc_3" value="">
                            <label class="customFileLabelsBlue" style="padding-left:184px" for="doc_3">
                                <span class="chooseFile">{{$value2->doc_3}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Update Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });
</script>