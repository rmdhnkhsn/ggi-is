<div class="modal fade" id="EditDirectMR{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('ppic.issue_mr.update-request')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Form Edit Request MR Direct</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" name="type" id="type" value="{{$value->type}}">
                    <div class="col-md-12">
                        <span class="general-identity-title">WO</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_wo" name="no_wo" value="{{$value->no_wo}}" placeholder="Insert Wo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_or" name="no_or" value="{{$value->no_or}}" placeholder="Insert OR" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_contract" name="no_contract" value="{{$value->no_contract}}" placeholder="Insert Contract">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="placing" name="placing" value="{{$value->placing}}" placeholder="Insert Placing">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Item Number</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="item_number" name="item_number" value="{{$value->item_number}}" placeholder="Insert Item Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">QTY Issued</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="qty_issued" name="qty_issued" value="{{$value->qty_issued}}" placeholder="Insert QTY Issued">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">UoM Issued</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="uom_issued" name="uom_issued" value="{{$value->uom_issued}}" placeholder="Insert UoM Issued">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Location</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="location" name="location" value="{{$value->location}}" placeholder="Insert Location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Lot Number</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_lot_number" name="lot_number" value="{{$value->lot_number}}" placeholder="Insert Lot Number">
                        </div>
                    </div>
                    <div class="col-12 categorymodal{{$value->id}}">
                        <div class="title-sm">Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INAC" class="radioBlue radio" id="inacDirect{{$value->id}}" {{ ($value->category == 'INAC' ) ? "checked" : "" }}>
                                <label for="inacDirect{{$value->id}}" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INPA & INUM" class="radioGreen radio" id="infa_inum_direct{{$value->id}}" {{ ($value->category == 'INPA & INUM' ) ? "checked" : "" }}>
                                <label for="infa_inum_direct{{$value->id}}" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INFA & ININ" class="radioOrange radio showHide{{$value->id}}"  id="infa_inin_direct{{$value->id}}" {{ ($value->category == 'INFA & ININ' ) ? "checked" : "" }}>
                                <label for="infa_inin_direct{{$value->id}}" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide mt-3" id="showHide{{$value->id}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Item</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="item_infa_inin" value="{{$value->item_infa_inin}}" placeholder="Input Item">
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Qty (INFA/ININ)</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="qty_infa_inin" value="{{$value->qty_infa_inin}}" placeholder="Input Qty">
                        </div>
                        <div class="col-6">
                            <div class="title-sm">UOM</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="uom_infa_inin" value="{{$value->uom_infa_inin}}" placeholder="Input UOM">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{$value->id}}">
                    <div class="col-12" style="padding-top:40px;">
                        <button type="submit" class="btn-blue-md btn-block">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    
      function dicoba(arrg) {
        var inputan = arrg;
        var myarr = inputan.split("|");
        // console.log(myarr[0]);
        if (myarr[0] == "INAC") {
            $('#showHide'+myarr[1]).removeClass('hide');
            $('#showHide'+myarr[1]).addClass('hide');
        } else if (myarr[0] == "INPA & INUM") {
            $('#showHide'+myarr[1]).removeClass('hide');
            $('#showHide'+myarr[1]).addClass('hide');
        }
        else if (myarr[0] == "INFA & ININ") {
            $('#showHide'+myarr[1]).addClass('hide');
            $('#showHide'+myarr[1]).removeClass('hide');
        }
      }
</script>