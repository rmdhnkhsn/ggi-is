<div class="modal fade" id="AddDirectList" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('ppic.issue_mr.store-request')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Form Input Request Issue MR Direct</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" name="type" id="type" value="Direct MR">
                    <div class="col-6">
                        <div class="title-sm">*WO</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:38px;width:60px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <select class="form-control" id="select2bs4_add" name="no_wo" required>
                                <option selected>Select WO Number</option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_or" name="no_or" value="" placeholder="Insert OR" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_contract" name="no_contract" value="" placeholder="Insert Contract">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_placing" name="placing" value="" placeholder="Insert Placing">
                        </div>
                    </div>
                    <div class="col-md-6 item_number">
                        <span class="general-identity-title">*Item Number</span>
                        <div class="mt-1 mb-3 "> 
                            <!-- <input type="text" class="form-control borderInput" id="item_number" name="item_number" value="" placeholder="Insert Item Number" required> -->
                            <select class="form-control select2partlistDirect " id="item_number" name="item_number" required>
                                <option selected disabled>Select Item Number</option>
                            </select>
                            <!-- <span class="text-pink" style="font-size : 12px">*Message</span> -->
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="category" name="category" required>
                                <option selected disabled>Choose One</option>
                                <option name="INAC">INAC</option>    
                                <option name="INPA & INUM">INPA & INUM</option>    
                                <option name="INFA & ININ">INFA & ININ</option>    
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">Item Description</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_item_description" name="item_description" value="" placeholder="Item Description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">*QTY Tersisa</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="qty_tersisa" value="" placeholder="QTY Tersisa" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">*QTY Issued</span>
                        <div class="mt-1 mb-3">
                            <input onkeyup="checkQty(this)" type="text" class="form-control borderInput" id="qty_issued" name="qty_issued" value="" placeholder="Insert QTY Issued" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">UoM Issued</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="uom_issued" name="uom_issued" value="" placeholder="Insert UoM Issued">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Location</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="location" name="location" value="" placeholder="Insert Location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Lot Number</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_lot_number" name="lot_number" value="" placeholder="Insert Lot Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Branch</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="direct_branch" name="branch" value="" placeholder="Insert Lot Number">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INAC" class="radioBlue" id="siinac">
                                <label for="siinac" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INPA & INUM" class="radioGreen" id="si_infa_inum">
                                <label for="si_infa_inum" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INFA & ININ" class="radioOrange" id="si_infa_inin">
                                <label for="si_infa_inin" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide" id="HideShow">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Item</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="item_infa_inin" value="" placeholder="Input Item">
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Qty (INFA/ININ)</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="qty_infa_inin" value="" placeholder="Input Qty">
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">UOM</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="uom_infa_inin" value="" placeholder="Input UOM">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="title-sm">Ready To Issue ?</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="ready_to_issue" value="Yes" class="radioGreen" id="readyissue">
                                <label for="readyissue" class="optionGreen check">
                                    <span class="descGreen">Yes</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="ready_to_issue" value="No" class="radioRed" id="notready">
                                <label for="notready" class="optionRed check">
                                    <span class="descRed">No</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="created_by" name="created_by" value="{{auth()->user()->nik}}">
                    <input type="hidden" id="created_name" name="created_name" value="{{auth()->user()->nama}}">
                    <input type="hidden" id="created_branch" name="created_branch" value="{{auth()->user()->branch}}">
                    <input type="hidden" id="created_branchdetail" name="created_branchdetail" value="{{auth()->user()->branchdetail}}">
                    <div class="col-12" style="padding-top:40px;">
                        <button type="submit" class="btn-blue-md btn-block" id="create">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function direct(arrg) {
        if (arrg == "INAC") {
            $('#HideShow').removeClass('hide');
            $('#HideShow').addClass('hide');
        } else if (arrg == "INPA & INUM") {
            $('#HideShow').removeClass('hide');
            $('#HideShow').addClass('hide');
        }
        else if (arrg == "INFA & ININ") {
            $('#HideShow').addClass('hide');
            $('#HideShow').removeClass('hide');
        }
    }
</script>