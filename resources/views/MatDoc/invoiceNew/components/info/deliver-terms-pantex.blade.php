<?php
if ($info_tambahan == null) {
    $invoice_no = null;
    $date_invoice = null;
    $contract_no = null;
    $date_contract = null;
    $exp_no = null;
    $date_exp = null;
    $bl_no = null;
    $date_bl = null;
    $payment = null;
    $partOfLoading = null;
    $partOfDestination = null;
    $lc_no = null;
    $date_lc = null;
    $issued_by = null;
    $delivery_terms = null;
    $port_of_delivery = null;
    $advance = null;
}else {
    $invoice_no = $info_tambahan->invoice_no;
    $date_invoice = $info_tambahan->date_invoice;
    $contract_no = $info_tambahan->contract_no;
    $date_contract = $info_tambahan->date_contract;
    $exp_no = $info_tambahan->exp_no;
    $date_exp = $info_tambahan->date_exp;
    $bl_no = $info_tambahan->bl_no;
    $date_bl = $info_tambahan->date_bl;
    $payment = $info_tambahan->payment;
    $partOfLoading = $info_tambahan->partOfLoading;
    $partOfDestination = $info_tambahan->partOfDestination;
    $lc_no = $info_tambahan->lc_no;
    $date_lc = $info_tambahan->date_lc;
    $issued_by = $info_tambahan->issued_by;
    $delivery_terms = $info_tambahan->delivery_terms;
    $port_of_delivery = $info_tambahan->port_of_delivery;
    $advance = $info_tambahan->advance;

}
// dd( $info_tambahan->advance);
?>
@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">DELIVER TERMS</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
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
                        <input type="text" class="form-control borderInput" id="" name="invoice_no" value="{{$invoice_no}}" placeholder="Input Invoice No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" value="{{$date_invoice}}" name="date_invoice">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Contract No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="contract_no" value="{{$contract_no}}" placeholder="Input Contract No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Contract Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" value="{{$date_contract}}" name="date_contract">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">EXP No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="exp_no" value="{{$exp_no}}" placeholder="Input Contract No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">EXP Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" value="{{$date_exp}}" name="date_exp">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">BL NO</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="bl_no" value="{{$bl_no}}" placeholder="Input BL NO">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">BL Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="date_bl" name="date_bl" value="{{$date_bl}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Deliver Terms</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="delivery_terms" required>
                            <option selected disabled>Select Deliver Terms</option>
                            <option {{ $delivery_terms == 'FOB, JAKARTA INDONESIA' ? 'selected' : ''}} value="FOB, JAKARTA INDONESIA">FOB, JAKARTA INDONESIA</option>
                            <option {{ $delivery_terms == 'CIF' ? 'selected' : ''}} value="CIF">CIF</option>
                            <option {{ $delivery_terms == 'C&F' ? 'selected' : ''}} value="C&F">C&F</option>
                        </select>
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
                            <option {{ $partOfLoading == 'TG. PRIOK, JAKARTA INDONESIA' ? 'selected' : ''}} value="TG. PRIOK, JAKARTA INDONESIA">TG. PRIOK, JAKARTA INDONESIA</option>
                            <option {{ $partOfLoading == 'SOEKARNO HATTA, JAKARTA INDONESIA' ? 'selected' : ''}} value="SOEKARNO HATTA, JAKARTA INDONESIA">SOEKARNO HATTA, JAKARTA INDONESIA</option>  
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Final Destination</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="partOfDestination" name="partOfDestination" value="{{$partOfDestination}}" placeholder="Input country">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port of Delivery</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="port_of_delivery" name="port_of_delivery" value="{{$port_of_delivery}}" placeholder="Input country">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Advance Adjustment</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="advance" name="advance" value="{{$advance}}" placeholder="Input country">
                    </div>
                </div>
                <div class="col-12">
                    <div class="flexx gap-5">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="DTpayment" onclick="ptx('PTXPayment')" <?php echo ($payment== 'T/T Payment') ?  "checked" : "" ;  ?>/>
                            <label for="DTpayment" class="optionBlue check">
                                <span class="descBlue">T/T Payment</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="Open Account" class="radioGreen" id="DTopen" onclick="ptx('PTXOpen')" <?php echo ($payment== 'Open Account') ?  "checked" : "" ;  ?>/>
                            <label for="DTopen" class="optionGreen check">
                                <span class="descGreen">Open Account</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="DTlc" onclick="ptx('PTXLC')" <?php echo ($payment== 'T/T Payment') ?  "By LC" : "" ;  ?>/>
                            <label for="DTlc" class="optionOrange check">
                                <span class="descOrange">LC</span>
                            </label>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="row hide" id="showHidePTX">
                <div class="col-md-6">
                    <div class="title-sm">LC No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="lc_no" value="{{$lc_no}}" placeholder="input LC No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_lc" value="{{$date_lc}}" placeholder="input Date">
                    </div>
                </div>
                <!-- <div class="col-12">
                    <div class="title-sm">Issued by</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="issued_by" value="{{$issued_by}}" placeholder="Issued by">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endif