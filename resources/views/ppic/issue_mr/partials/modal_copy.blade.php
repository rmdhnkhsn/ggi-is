<div class="modal fade" id="CopyData{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Copy Input Request Issue MR</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" name="copy_type{{$value->id}}" id="type"  value="{{$value->type}}">
                    <div class="col-md-6">
                        <span class="general-identity-title">WO</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_wo" name="copy_no_wo{{$value->id}}" value="{{$value->no_wo}}" placeholder="Insert Wo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_or" name="copy_no_or{{$value->id}}" value="{{$value->no_or}}" placeholder="Insert OR">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_contract" name="copy_no_contract{{$value->id}}" value="{{$value->no_contract}}" placeholder="Insert Contract">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="placing" name="copy_placing{{$value->id}}" value="{{$value->placing}}" placeholder="Insert Placing">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Line</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="line" name="copy_line{{$value->id}}" value="{{$value->line}}" placeholder="Insert Line">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Branch</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="branch" name="copy_branch{{$value->id}}" value="{{$value->branch}}" placeholder="Insert Branch">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Allowance</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="allowance" name="copy_allowance{{$value->id}}" value="{{$value->allowance}}" placeholder="Insert Allowance">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Request Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control borderInput" value="{{$value->request_date}}" name="copy_request_date{{$value->id}}"  id="copy_request_date{{$value->id}}" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Delivery Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div> -->
                            <input type="hidden" class="form-control borderInput" value="{{$value->delivery_date}}" name="copy_delivery_date{{$value->id}}" id="copy_delivery_date{{$value->id}}" readonly>
                        <!-- </div>
                    </div> -->
                    <div class="col-12 copyCategory{{$value->id}}">
                        <div class="title-sm">Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="copy_category{{$value->id}}" value="INAC" class="radioBlue radio5" onclick="sokcoba('INAC|'+this.getAttribute('si_id'))" si_id="{{$value->id}}" id="Copyinac{{$value->id}}" {{ ($value->category == 'INAC' ) ? "checked" : "" }}>
                                <label for="Copyinac{{$value->id}}" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="copy_category{{$value->id}}" value="INPA & INUM" class="radioGreen radio5" onclick="sokcoba('INPA & INUM|'+this.getAttribute('si_id'))"  si_id="{{$value->id}}" id="Copy_infa_inum{{$value->id}}" {{ ($value->category == 'INPA & INUM' ) ? "checked" : "" }}>
                                <label for="Copy_infa_inum{{$value->id}}" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="copy_category{{$value->id}}" value="INFA & ININ" class="radioOrange radio5 HideCopy{{$value->id}}" onclick="sokcoba('INFA & ININ|'+this.getAttribute('si_id'))"  si_id="{{$value->id}}" id="copy_infa_inin{{$value->id}}" {{ ($value->category == 'INFA & ININ' ) ? "checked" : "" }}>
                                <label for="copy_infa_inin{{$value->id}}" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide mt-3" id="HideCopy{{$value->id}}">
                    <div class="row">
                        <div class="col-4">
                            <div class="title-sm">Item</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="copy_item_infa_inin{{$value->id}}[]" value="{{$value->item_infa_inin}}" placeholder="Input Item">
                        </div>
                        <div class="col-4">
                            <div class="title-sm">Qty (INFA/ININ)</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="copy_qty_infa_inin{{$value->id}}[]" value="{{$value->qty_infa_inin}}" placeholder="Input Qty">
                        </div>
                        <div class="col-3">
                            <div class="title-sm">UOM</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="copy_uom_infa_inin{{$value->id}}[]" value="{{$value->uom_infa_inin}}" placeholder="Input UOM">
                        </div>
                        <div class="col-1">
                            <div class="title-sm text-white">x</div>
                            <button id="{{$value->id}}" onclick="TeuingAhh(this.id)" type="button" class="btn-blue-md mt-1 mb-3"><i class="fas fa-plus"></i> </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="created_by" name="created_by{{$value->id}}" value="{{auth()->user()->nik}}">
                <input type="hidden" id="created_name" name="created_name{{$value->id}}" value="{{auth()->user()->nama}}">
                <input type="hidden" id="created_branch" name="created_branch{{$value->id}}" value="{{auth()->user()->branch}}">
                <input type="hidden" id="created_branchdetail" name="created_branchdetail{{$value->id}}" value="{{auth()->user()->branchdetail}}">
                <div id="CopynewRow{{$value->id}}">
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{$value->id}}">
                    <div class="col-12" style="padding-top:40px;">
                        <button id="SubmitCopy{{$value->id}}" id_we="{{$value->id}}" type="submit" class="btn-blue-md btn-block SubmitCopy">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
      function sokcoba(arrg) {
        var inputan = arrg;
        var myarr = inputan.split("|");
        // console.log(myarr[0]);
        if (myarr[0] == "INAC") {
            $('#HideCopy'+myarr[1]).removeClass('hide');
            $('#HideCopy'+myarr[1]).addClass('hide');
        } else if (myarr[0] == "INPA & INUM") {
            $('#HideCopy'+myarr[1]).removeClass('hide');
            $('#HideCopy'+myarr[1]).addClass('hide');
        }
        else if (myarr[0] == "INFA & ININ") {
            $('#HideCopy'+myarr[1]).addClass('hide');
            $('#HideCopy'+myarr[1]).removeClass('hide');
        }
      }
</script>
<script>
    var button = 0;
    function TeuingAhh(clicked_id) {
        // console.log(id_klik); 
        console.log(clicked_id);
        button++; 
        var html = '';
            html +='<div class="row hapusRow" id="CopyinputFormRowWO'+button+'">' ;
            html +='<div class="col-md-4">';
            html +='<div class="title-sm">Item</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="copy_item_infa_inin'+clicked_id+'[]" placeholder="Input Item">';
            html +='</div>';
            html +='<div class="col-md-4">';
            html +='<div class="title-sm">Qty (INFA/ININ)</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="copy_qty_infa_inin'+clicked_id+'[]" placeholder="Input Qty">';
            html +='</div>';
            html +='<div class="col-md-3">';
            html +='<div class="title-sm">UOM</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="copy_uom_infa_inin'+clicked_id+'[]" placeholder="Input UOM">';
            html +='</div>';   
            html +='<div class="col-1">';
            html +='<button id="'+button+'" onclick="CopyDeleteRowItem(this.id)" type="button" class="btn-delete-row" style="margin-top:2rem"><i class="fs-20 far fa-times-circle"></i></button>'; 
            html +='</div>';      
            html +='</div>';
        $('#CopynewRow'+clicked_id).append(html);
    };
</script>