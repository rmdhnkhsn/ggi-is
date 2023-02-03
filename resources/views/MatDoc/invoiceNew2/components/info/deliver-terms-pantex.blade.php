@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">DELIVER TERMS</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Invoice No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="invoice_no" placeholder="Input Invoice No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_invoice">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Contract No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="contract_no" placeholder="Input Contract No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_contract">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">BL NO</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="bl_no" placeholder="Input BL NO">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">BL Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="date_bl" name="date_bl">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port Of Loading</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck-loading"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="partOfLoading" required>
                            <option selected disabled>Select Port Of Loading</option>
                            <option value="TG. PRIOK, JAKARTA INDONESIA">TG. PRIOK, JAKARTA INDONESIA</option>    
                            <option value="SOEKARNO HATTA, JAKARTA INDONESIA">SOEKARNO HATTA, JAKARTA INDONESIA</option>    
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Final Destination</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="partOfDestination" name="partOfDestination" placeholder="Input country">
                    </div>
                </div>
                <div class="col-12">
                    <div class="flexx gap-5">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="DTpayment" onclick="dt('DTPayment')">
                            <label for="DTpayment" class="optionBlue check">
                                <span class="descBlue">T/T Payment</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="open" class="radioGreen" id="DTopen" onclick="dt('DTOpen')">
                            <label for="DTopen" class="optionGreen check">
                                <span class="descGreen">Open Account</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="DTlc" onclick="dt('DTLC')">
                            <label for="DTlc" class="optionOrange check">
                                <span class="descOrange">LC</span>
                            </label>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="row" id="showHideDT">
                <div class="col-md-6">
                    <div class="title-sm">LC No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="lc_no" placeholder="input LC No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_lc" placeholder="input Date">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Issued by</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="issued_by" placeholder="Issued by">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif