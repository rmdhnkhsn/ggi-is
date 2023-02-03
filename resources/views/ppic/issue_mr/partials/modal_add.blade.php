<div class="modal fade" id="AddIssue" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('ppic.issue_mr.store-request')}}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" name="type" id="type" value="Request Issue MR">
                    <div class="col-6">
                        <div class="title-sm">*WO</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:38px;width:60px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <select class="form-control" id="select2insidemodal" name="no_wo" required>
                                <option selected disabled>Select WO Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_or" name="no_or" value="" placeholder="Insert OR" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_contract" name="no_contract" value="" placeholder="Insert Contract" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_placing" name="placing" value="" placeholder="Insert Placing" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">*Line</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_line" name="line" value="" placeholder="Insert Line" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Branch</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="issue_branch" name="branch" value="" placeholder="Insert Branch">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">*Allowance</div>
                        <div class="input-group flex mt-1 mb-3">
                            <select class="form-control borderInput" name="allowance" required>
                                <option selected disabled>Select Allowance</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Allowance</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="allowance" name="allowance" value="" placeholder="Insert Allowance">
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">*Request Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control borderInput" name="request_date" id="issue_request_date" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Delivery Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div> -->
                            <input type="hidden" class="form-control borderInput" name="delivery_date" id="issue_delivery_date" readonly>
                        <!-- </div>
                    </div> -->
                    <div class="col-12">
                        <div class="title-sm">*Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INAC" class="radioBlue" onclick="getel('INAC')" id="inac" required>
                                <label for="inac" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INPA & INUM" class="radioGreen" onclick="getel('INPA & INUM')" id="infa_inum">
                                <label for="infa_inum" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INFA & ININ" class="radioOrange showHide" onclick="getel('INFA & ININ')" id="infa_inin">
                                <label for="infa_inin" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide" id="showHide">
                    <div id="siRow">
                        <div class="row">
                            <div class="col-12 justify-sb my-3">
                                <div class="title-18">Item List</div>
                                <button id="addRow" type="button" class="btn-blue-md">Item<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                            </div>
                            <!-- <div class="col-4">
                                <div class="title-sm">Item</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="item_infa_inin[]" value="" placeholder="Input Item">
                            </div>
                            <div class="col-md-4">
                                <div class="title-sm">Qty (INFA/ININ)</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="qty_infa_inin[]" value="" placeholder="Input Qty">
                            </div>
                            <div class="col-md-4">
                                <div class="title-sm">UOM</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="uom_infa_inin[]" value="" placeholder="Input UOM">
                            </div> -->
                        </div>
                    </div>
                    <div id="newRow">

                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="created_by" name="created_by" value="{{auth()->user()->nik}}">
                    <input type="hidden" id="created_name" name="created_name" value="{{auth()->user()->nama}}">
                    <input type="hidden" id="created_branch" name="created_branch" value="{{auth()->user()->branch}}">
                    <input type="hidden" id="created_branchdetail" name="created_branchdetail" value="{{auth()->user()->branchdetail}}">
                    <div class="col-12" style="padding-top:40px;">
                        <button type="submit" class="btn-blue-md btn-block">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function getel(arrg) {
        get_partlist();
        if (arrg == "INAC") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');
        } else if (arrg == "INPA & INUM") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');
        }
        else if (arrg == "INFA & ININ") {
            $('#showHide').addClass('hide');
            $('#showHide').removeClass('hide');
        }
    }
    function set_default_ui() {
        $("#newRow").empty();
        getel("INAC");
    }
</script>