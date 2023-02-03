<div class="modal fade" id="frmsearch" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:950px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Select Stock Available</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Item.Number</div>
                    <input type="text" class="form-control borderInput" id="sc_item" readonly>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Branch</div>
                    <div class="input-group flex">
                        <!-- <select class="form-control borderInput select2bs4 pointer" id="sc_to_branch" required>
                            @foreach($branch as $v)
                                <option value="{{$v->kode_jde}}">{{$v->kode_jde}}</option>
                            @endforeach
                        </select> -->
                        <input type="text" class="form-control borderInput" id="sc_to_branch" readonly>
                        <div class="input-group-prepend">
                                <button type="button" class="btn-blue" style="border-radius : 0 10px 10px 0" onclick="get_stok_available();"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <form id="frmSubmitStock" action="{{route('Warehouse.requestIR.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <div class="col-md-3">
                        <div class="title-sm">Uom.Need</div>
                        <input type="text" class="form-control borderInput" id="sc_uom_need" name="sc_uom" readonly>
                        <input type="hidden" class="form-control borderInput" id="sc_uom" readonly>
                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Qty.Need</div>
                        <input type="text" class="form-control borderInput" id="sc_qty_need" readonly>
                    </div>
                    <div id="convert">

                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Qty.Selected</div>
                        <input type="text" class="form-control borderInput" id="sc_qty_total_select" name="sc_qty_total_select" readonly>
                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Qty.Balance</div>
                        <input type="text" class="form-control borderInput" id="sc_total_bal" readonly>
                    </div>
                </div>
                <input type="hidden" id="id" name="id" value="">
                <input type="hidden" name="wh_by_nik" value="{{Auth::user()->nik}}">
                <input type="hidden" name="wh_by_name" value="{{Auth::user()->nama}}">
                <input type="hidden" name="wh_at" value="{{date('Y-m-d h:i:s')}}">
                <div class="row mt-4"> 
                    <div class="col-md-12">

                        <table id="tbSearch" class="table tbl-content-12 table-sm table-bordered no-wrap">
                            <thead style="background:#ddd">
                                <tr>
                                    <th>Branch</th>
                                    <th>Lot.No</th>
                                    <th>Location</th>
                                    <th>Last.Receipt</th>
                                    <th>Uom</th>
                                    <th>Qty.Avail</th>
                                    <th>Qty.Pick</th>
                                    <th>Qty.Bal</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <button type="button" class="btn-blue-md w-100" onclick="validateMyForm();">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>