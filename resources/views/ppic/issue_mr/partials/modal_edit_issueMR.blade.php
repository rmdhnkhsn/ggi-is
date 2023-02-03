<div class="modal fade" id="EditIssueMR{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Form Input Request Issue MR</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" name="type{{$value->id}}" id="type"  value="{{$value->type}}">
                    <div class="col-md-12">
                        <span class="general-identity-title">WO</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_wo" name="no_wo{{$value->id}}" value="{{$value->no_wo}}" placeholder="Insert Wo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_or" name="no_or{{$value->id}}" value="{{$value->no_or}}" placeholder="Insert OR" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_contract" name="no_contract{{$value->id}}" value="{{$value->no_contract}}" placeholder="Insert Contract" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="placing" name="placing{{$value->id}}" value="{{$value->placing}}" placeholder="Insert Placing" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Line</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="line" name="line{{$value->id}}" value="{{$value->line}}" placeholder="Insert Line">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Branch</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="branch" name="branch{{$value->id}}" value="{{$value->branch}}" placeholder="Insert Branch">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Allowance</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="allowance" name="allowance{{$value->id}}" value="{{$value->allowance}}" placeholder="Insert Allowance">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Request Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" value="{{$value->request_date}}" name="request_date{{$value->id}}" id="request_date" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Delivery Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" value="{{$value->delivery_date}}" name="delivery_date{{$value->id}}" id="delivery_date" readonly>
                        </div>
                    </div>
                    <div class="col-12 categorymodal{{$value->id}}">
                        <div class="title-sm">Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category{{$value->id}}" value="INAC" class="radioBlue radio" onclick="dicoba('INAC|'+this.getAttribute('si_id'))" si_id="{{$value->id}}" id="inac{{$value->id}}" {{ ($value->category == 'INAC' ) ? "checked" : "" }}>
                                <label for="inac{{$value->id}}" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category{{$value->id}}" value="INPA & INUM" class="radioGreen radio" onclick="dicoba('INPA & INUM|'+this.getAttribute('si_id'))"  si_id="{{$value->id}}" id="infa_inum{{$value->id}}" {{ ($value->category == 'INPA & INUM' ) ? "checked" : "" }}>
                                <label for="infa_inum{{$value->id}}" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category{{$value->id}}" value="INFA & ININ" class="radioOrange radio showHide{{$value->id}}" onclick="dicoba('INFA & ININ|'+this.getAttribute('si_id'))"  si_id="{{$value->id}}" id="infa_inin{{$value->id}}" {{ ($value->category == 'INFA & ININ' ) ? "checked" : "" }}>
                                <label for="infa_inin{{$value->id}}" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide mt-3" id="showHide{{$value->id}}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="title-sm">Item</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="edit_item_infa_inin{{$value->id}}[]" value="{{$value->item_infa_inin}}" placeholder="Input Item">
                        </div>
                        <div class="col-md-4">
                            <div class="title-sm">Qty (INFA/ININ)</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="edit_qty_infa_inin{{$value->id}}[]" value="{{$value->qty_infa_inin}}" placeholder="Input Qty">
                        </div>
                        <div class="col-md-3">
                            <div class="title-sm">UOM</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="edit_uom_infa_inin{{$value->id}}[]" value="{{$value->uom_infa_inin}}" placeholder="Input UOM">
                        </div>
                        <div class="col-1">
                            <div class="title-sm text-white">x</div>
                            <button id="{{$value->id}}"  onclick="dicobasaja(this.id)" type="button" class="btn-blue-md mt-1 mb-3"><i class="fas fa-plus"></i> </button>
                        </div>
                    </div>
                </div>
                <div id="newRow{{$value->id}}">
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{$value->id}}">
                    <div class="col-12" style="padding-top:40px;">
                        <button type="submit" id="SubmitEdit{{$value->id}}" atributnya="{{$value->id}}" class="btn-blue-md btn-block SubmitEdit">Create</button>
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