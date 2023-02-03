@if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' || $data->buyer == 'Ritra Cargo Holland B.V.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">SHIPMENT INFO</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
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
                        <input type="text" class="form-control borderInput" id="" name="visel_name" placeholder="input vessel name & voyage">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Ship On Board</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="shipOnBoard">
                    </div>
                </div>
                <!-- Jika buyer bukan marubeni  -->
                @if ($data->buyer =! 'MARUBENI CORPORATION JEPANG' || $data->buyer =! 'MARUBENI FASHION LINK LTD.')
                <div class="col-12">
                    <div class="title-sm">Delivery Terms</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="delivery_terms" required>
                            <option selected disabled>Select Port Of Loading</option>
                            <option value="FOB, JAKARTA INDONESIA">FOB, JAKARTA INDONESIA</option>    
                            <option value="CIF">CIF</option>    
                            <option value="C&F">C&F</option>    
                        </select>
                    </div>
                </div>
                @endif
                <!-- End  -->

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
                        <input type="date" class="form-control borderInput" id="" name="date">
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

                <!-- Jika buyer bukan Jiangsu  -->
                @if ($data->buyer =! 'JIANGSU TEXTILE INDUSTRY')
                <div class="col-12">
                    <div class="title-sm">Port Of Destination</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="partOfDestination" name="partOfDestination" placeholder="Input country">
                    </div>
                </div>
                @endif
                <!-- End  -->

                <!-- Payment  -->
                <div class="col-12">
                    <div class="flexx gap-5">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="payment" onclick="getel('PAYMENT')">
                            <label for="payment" class="optionBlue check">
                                <span class="descBlue">T/T Payment</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="open" class="radioGreen" id="open" onclick="getel('OPEN')">
                            <label for="open" class="optionGreen check">
                                <span class="descGreen">Open Account</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="lc" onclick="getel('LC')">
                            <label for="lc" class="optionOrange check">
                                <span class="descOrange">LC</span>
                            </label>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- for LC Payment -->
            <div class="row" id="showHideShipment">
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
            </div>
        </div>
    </div>
@endif