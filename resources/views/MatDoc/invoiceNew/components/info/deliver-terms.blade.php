<?php
if ($info_tambahan == null) {
    $delivery_terms = null;
    $invoice_deliv = null;
    $date_deliv = null;
    $payment = null;
    $lc_deliv = null;
    $date_delive = null;
    $issued_by = null;
    $carrier_deliv = null;
    $partOfLoading = null;
    $partOfDestination = null;
    $country_of_origin = null;
}else {
    $delivery_terms = $info_tambahan->delivery_terms;
    $invoice_deliv = $info_tambahan->invoice_deliv;
    $date_deliv = $info_tambahan->date_deliv;
    $payment = $info_tambahan->payment;
    $lc_deliv = $info_tambahan->lc_deliv;
    $date_delive = $info_tambahan->date_delive;
    $issued_by = $info_tambahan->issued_by;
    $carrier_deliv = $info_tambahan->carrier_deliv;
    $partOfLoading = $info_tambahan->partOfLoading;
    $partOfDestination = $info_tambahan->partOfDestination;
    $country_of_origin = $info_tambahan->country_of_origin??'INDONESIA';
}
?>
@if ($data->buyer == 'TOYOTA TSUSHO CORPORATION' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'MARUSA Co.,Ltd.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
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
                <!-- khusus toyota  -->
                @if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
                <div class="col-12">
                    <div class="title-sm">Sailing On</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-ship"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="" value="" placeholder="Input Sailing On">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Remarks</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-spell-check"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="" value="" placeholder="Input Remarks">
                    </div>
                </div>
                @endif
                <!-- End  -->

                <div class="col-12">
                    <div class="title-sm">Deliver Terms</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="delivery_terms" required>
                            <option selected disabled>Select Part Of Loading</option>
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
                        <select class="form-control borderInput select2bs4 pointer" id="partOfLoading" name="partOfLoading" required>
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
                    <div class="title-sm">Invoice No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="invoice_deliv" value="{{$invoice_deliv}}" placeholder="Input Invoice No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_deliv" value="{{$date_deliv}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Country of Origin</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="country_of_origin" name="country_of_origin" value="{{$country_of_origin}}" placeholder="Input country">
                    </div>
                </div>
                <!-- Khusus Marusa  -->
                @if ($data->buyer == 'MARUSA Co.,Ltd.')
                <div class="col-12">
                    <div class="title-sm">Ref No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="" value="" placeholder="Input Ref No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Contract No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="" value="" placeholder="Input Contract No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Vessel Name & Voyage</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-ship"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="visel_name" value="" placeholder="input vessel name & voyage">
                    </div>
                </div>
                @endif
                <!-- End -->

                <!-- Khusus Marusa  -->
                @if ($data->buyer =! 'MARUSA Co.,Ltd.')
                <div class="col-12">
                    <div class="title-sm">Port Of Loading</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck-loading"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="partOfLoading" required>
                            <option selected disabled>Select Part Of Loading</option>
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
                            <input type="text" class="form-control borderInput" id="finalDes" name="partOfDestination" value="" placeholder="Input Destination">
                    </div>
                </div>
                @endif
                <!-- end  -->

                <!-- khusus Toyota  -->
                @if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
                <div class="col-12">
                    <div class="title-sm">Issued Bank</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-money-bill-wave"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                            <option selected disabled>Select Issued Bank</option>
                            <option name="CIMB">CIMB</option>    
                            <option name="BCA">BCA</option>    
                        </select>
                    </div>
                </div>
                @endif
                <!-- End  -->

                <!-- Payment  -->
                <div class="col-12">
                    <div class="flexx gap-5">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="DTpayment" onclick="Dterms('DTPayment')" <?php echo ($payment== 'T/T Payment') ?  "checked" : "" ;  ?>/>
                            <label for="DTpayment" class="optionBlue check">
                                <span class="descBlue">T/T Payment</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="Open Account" class="radioGreen" id="DTopen" onclick="Dterms('DTOpen')" <?php echo ($payment== 'Open Account') ?  "checked" : "" ;  ?>/>
                            <label for="DTopen" class="optionGreen check">
                                <span class="descGreen">Open Account</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="DTlc" onclick="Dterms('DTLC')" <?php echo ($payment== 'By LC') ?  "checked" : "" ;  ?>/>
                            <label for="DTlc" class="optionOrange check">
                                <span class="descOrange">LC</span>
                            </label>
                        </div>
                    </div>  
                </div>
                <!-- end  -->
            </div>

            <!-- For TT Payment  -->
            <div class="row hide" id="showHideDT">
                <div class="col-md-6">
                    <div class="title-sm">LC No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="lc_deliv" value="{{$lc_deliv}}" placeholder="input LC No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="date_delive" value="{{$date_delive}}" placeholder="input Date">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Issued by</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="" name="issued_by" value="{{$issued_by}}" placeholder="Issued by">
                    </div>
                </div>
            </div>
            <!-- End  -->
            @if($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
            <div class="row">
                <div class="col-12">
                    <div class="title-sm">Carrier</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="carrier_deliv" value="{{$carrier_deliv}}" placeholder="Input Carrier">
                </div>
            </div>
            @endif
        </div>
    </div>
@endif

<script>
    function Dterms(xx) {
        if (xx == "DTPayment") {
            $('#showHideDT').removeClass('hide');
            $('#showHideDT').addClass('hide');
        } else if (xx == "DTOpen") {
            $('#showHideDT').removeClass('hide');
            $('#showHideDT').addClass('hide');
        }
        else if (xx == "DTLC") {
            const accordion = document.getElementsByClassName('accordionContent3')
            let last = accordion[accordion.length - 2];
            last.style.height = 'auto'

            $('#showHideDT').addClass('hide');
            $('#showHideDT').removeClass('hide');
        }
    }
</script>