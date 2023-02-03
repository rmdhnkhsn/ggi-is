<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $visel_name = null;
    $shipOnBoard = null;
    $invoice_no = null;
    $date = null;
    $partOfLoading = null;
    $partOfDestination = null;
    $delivery_terms = null;
    $payment = null;
    $lc_no = null;
    $date_lc = null;
    $country_lc = null;
    $issued_by = null;
}else {
    // dd($info_tambahan);
    $visel_name = $info_tambahan->visel_name;
    $shipOnBoard = $info_tambahan->shipOnBoard;
    $invoice_no = $info_tambahan->invoice_no;
    $date = $info_tambahan->date;
    $partOfLoading = $info_tambahan->partOfLoading;
    $partOfDestination = $info_tambahan->partOfDestination;
    $delivery_terms = $info_tambahan->delivery_terms;
    $payment = $info_tambahan->payment;
    $lc_no = $info_tambahan->lc_no;
    $date_lc = $info_tambahan->date_lc;
    $country_lc = $info_tambahan->country_lc;
    $issued_by = $info_tambahan->issued_by;
}
?>
@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' || $data->buyer == 'MARUBENI FASHION LINK LTD.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">SHIPMENT INFO</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Vessel Name & Voyage</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-ship"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="visel_name" name="visel_name" value="{{$visel_name}}" placeholder="input vessel name & voyage">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Ship On Board</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="shipOnBoard" name="shipOnBoard" value="{{$shipOnBoard}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Invoice No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="invoice_no" name="invoice_no" value="{{$invoice_no}}" placeholder="Input Invoice No">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="date" name="date" value="{{$date}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port Of Loading</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck-loading"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="partOfLoading" name="partOfLoading" required>
                            <option disabled>Select Port Of Loading</option>
                            <option {{ $partOfLoading == 'TG. PRIOK, JAKARTA INDONESIA' ? 'selected' : ''}} value="TG. PRIOK, JAKARTA INDONESIA">TG. PRIOK, JAKARTA INDONESIA</option>
                            <option {{ $partOfLoading == 'SOEKARNO HATTA, JAKARTA INDONESIA' ? 'selected' : ''}} value="SOEKARNO HATTA, JAKARTA INDONESIA">SOEKARNO HATTA, JAKARTA INDONESIA</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port Of Destination</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="partOfDestination" name="partOfDestination" value="{{$partOfDestination}}" placeholder="Input country">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Deliver Terms</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="delivery_terms" required>
                            <option disabled>Select Part Of Loading</option>
                            <option {{ $delivery_terms == 'FOB, JAKARTA INDONESIA' ? 'selected' : ''}} value="FOB, JAKARTA INDONESIA">FOB, JAKARTA INDONESIA</option>
                            <option {{ $delivery_terms == 'CIF' ? 'selected' : ''}} value="CIF">CIF</option>
                            <option {{ $delivery_terms == 'C&F' ? 'selected' : ''}} value="C&F">C&F</option>
                        </select>
                    </div>
                </div>
                <!-- Payment  -->
                <div class="col-12">
                    <div class="flexx gap-5">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="payment" onclick="paymentMarubendi('PAYMENT')" <?php echo ($payment== 'T/T Payment') ?  "checked" : "" ;  ?>/>
                            <label for="payment" class="optionBlue check">
                                <span class="descBlue">T/T Payment</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="Open Account" class="radioGreen" id="open" onclick="paymentMarubendi('OPEN')" <?php echo ($payment== 'open') ?  "checked" : "" ;  ?>/>
                            <label for="open" class="optionGreen check">
                                <span class="descGreen">Open Account</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="lc" onclick="paymentMarubendi('LC')" <?php echo ($payment== 'By LC') ?  "checked" : "" ;  ?>/>
                            <label for="lc" class="optionOrange check">
                                <span class="descOrange">LC</span>
                            </label>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- for LC Payment -->
            <div class="row hide" id="showHideShipmentMarubendi">
                <div class="col-md-6">
                    <div class="title-sm">LC No</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="lc_no" name="lc_no" value="{{$lc_no}}" placeholder="input LC No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="date_lc" name="date_lc" value="{{$date_lc}}" placeholder="input Date">
                    </div>
                </div>
                @if($data->buyer == 'MARUBENI CORPORATION JEPANG')
                <div class="col-md-6">
                    <div class="title-sm">LC Country</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="country_lc" name="country_lc" value="{{$country_lc}}" placeholder="input LC Country">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Issued By</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-edit"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="issued_by" name="issued_by" value="{{$issued_by}}" placeholder="input Issued By">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endif