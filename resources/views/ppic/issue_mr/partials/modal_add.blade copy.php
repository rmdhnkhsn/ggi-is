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
                    <div class="col-md-6">
                        <span class="general-identity-title">WO</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_wo" name="no_wo" value="" placeholder="Insert Wo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">OR</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_or" name="no_or" value="" placeholder="Insert OR">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Contract</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="no_contract" name="no_contract" value="" placeholder="Insert Contract">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Placing</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="placing" name="placing" value="" placeholder="Insert Placing">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Line</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="line" name="line" value="" placeholder="Insert Line">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Branch</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="branch" name="branch" value="" placeholder="Insert Branch">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Allowance</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="allowance" name="allowance" value="" placeholder="Insert Allowance">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <span class="general-identity-title">Request Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="request_date" id="request_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Delivery Date</span>
                        <div class="input-group dates mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="delivery_date" id="delivery_date">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Select Category</div>
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INAC" class="radioBlue" id="inac">
                                <label for="inac" class="optionBlue check">
                                    <span class="descBlue">INAC</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INPA & INUM" class="radioGreen" id="infa_inum">
                                <label for="infa_inum" class="optionGreen check">
                                    <span class="descGreen">INPA & INUM</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="category" value="INFA" class="radioOrange" id="infa_inin">
                                <label for="infa_inin" class="optionOrange check">
                                    <span class="descOrange">INFA & ININ</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="hide" id="showHide">
                    <div class="col-12">
                        <div class="title-sm">Item</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="item" name="item" value="" placeholder="Input Item">
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Qty (INFA/ININ)</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="item" name="item" value="" placeholder="Input Qty">
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">UOM</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="item" name="item" value="" placeholder="Input UOM">
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

    // console.log('haooo');
    // $('.select2bs4_test').select2({
    //     theme: 'bootstrap4'
    // });
    // $("input[name=category]:radio").click(function(ev) {
    //     if (ev.currentTarget.value == "INFA") {
    //         $('#showHide').removeClass('hide');
    //         $('#showHide').addClass('hide');

    //     } else if (ev.currentTarget.value == "Ya") {
    //         $('#showHide').addClass('hide');
    //         $('#showHide').removeClass('hide');

    //     }
    // });
</script>