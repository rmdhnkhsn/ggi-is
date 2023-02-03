<!-- Detail -->
<div class="modal fade" id="DetailReport{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Detail </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3 mt-1">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">WO</div>
                                    <div class="sub-judul">{{$value->no_wo}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">OR</div>
                                    <div class="sub-judul">{{$value->no_or}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">LINE</div>
                                    <div class="sub-judul">{{$value->line}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Branch</div>
                                    <div class="sub-judul">{{$value->branch}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Allowance</div>
                                    <div class="sub-judul">{{$value->allowance}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Request By</div>
                                    <div class="sub-judul">{{$value->created_name}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Category</div>
                                    <div class="sub-judul">{{$value->category}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Request Date</div>
                                    <div class="sub-judul">{{$value->request_date}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Delivery Date</div>
                                    <div class="sub-judul">{{$value->delivery_date}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Status</div>
                                    <div class="sub-judul">{{$value->status}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">No Contract</div>
                                    <div class="sub-judul">{{$value->no_contract}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Placing</div>
                                    <div class="sub-judul">{{$value->placing}}</div>
                                </div>
                            </div> 
                            @if($value->category == 'INFA & ININ')
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Item</div>
                                    <div class="sub-judul">{{$value->item_infa_inin}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">QTY INFA & ININ</div>
                                    <div class="sub-judul">{{$value->qty_infa_inin}}</div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">UOM</div>
                                    <div class="sub-judul">{{$value->uom_infa_inin}}</div>
                                </div>
                            </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>