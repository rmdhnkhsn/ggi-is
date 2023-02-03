<form action="{{route('invoice.storeInvoiceHeader')}}" method="post" enctype="multipart/form-data">
    @csrf 
    <input type="hidden" id="buyer_detail" name="buyer_detail" value="buyer_detail">
    <input type="hidden" name="invoice_final_id" value="{{ $filter }}">
    <div class="row p-4">
        <div class="col-md-5">
            <div class="row sticky-top-position">
                <div class="pd-info">
                    <div class="title-26"><span class="text-biru">#Step 2</span> Information</div>
                    <div class="title-14-dark mt-3">Isi Informasi Invoice dengan lengkap untuk Beneficiary, Consigne, Account & Risk, Container & Seal Number, Delivery Therm, Shipment information, Notify Party, Exporter, Account dll.</div>
                </div>
                <div class="notice">
                    <img src="{{url('images/iconpack/invoice/paper.svg')}}" class="imgPaper">
                    <div class="text">
                        <div class="judul">Form tidak Lengkap..? </div>
                        <div class="content my-1">Jika form tidak lengkap atau tidak sesuai dengan kebutuhan, silahkan pilih buyer yang sesuai dengan invoice yang akan dibuat.</div>
                        <a class="selectBuyer btnPrevious">Select Buyer <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-7"> 
            <div class="cardFlat p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="title-24-blue mb-3">INVOICE HEADER</div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Invoice Title</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="invoice_title" value="Commercial Invoice" placeholder="Commercial Invoice" readonly>
                    </div>
                    <!-- (-BENEFICIARY-) AGRON, MARUBENI, HEXAPOLE, MATSUOKA, JIANGSU, MARUSA -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'PENTEX LTD' ||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                    <div class="accordionItem3">            
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">BENEFICIARY</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Company</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">City</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-EXPORTER-) TAIJIN, HONGKONG (belum database) -->
                    @if ($data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">EXPORTER</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Company</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="company_eksp" placeholder="Input Company">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="address_eksp" placeholder="Input Address">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">City</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="city_eksp" placeholder="Input City">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="country_eksp" placeholder="Input Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-SHIPPER-) PANTEX -->
                    @if ($data->buyer == 'PENTEX LTD')
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">SHIPPER</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Company</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="company_ship" placeholder="Input Company">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="addres_ship" placeholder="Input Address">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">City</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="city_ship" placeholder="Input City">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="country_ship" placeholder="Input Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                     <!-- (-CONSIGNEE/ SHIP TO-) AGRON, MARUBENI, HEXAPOLE, MATSUOKA, JIANGSU, MARUSA -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.')
                    <div class="accordionItem3">            
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">CONSIGNEE/ SHIP TO</div>
                            <div class="justify-center gap-4">
                                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Consignee</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="consigne" name="consigne" placeholder="Input Address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="" name="address_cons" placeholder="Input Address">
                                    </div>
                                </div>
                                    <div class="col-12">
                                    <div class="title-sm">Shipment To</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-shipping-fast"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="shipto" name="shipto" placeholder="Input shipment">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="country_cons" name="country_cons" placeholder="Input country">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-NOTIFY PARTY-) MARUBENI, TAIJIN, HONGKONG, MARUSA -->
                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'OSTIE PLUS GROUP LIMITED' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == 'TOYOTA TSUSHO CORPORATION' || $data->buyer == 'YAMATO TRANSPORT (S) PTE LTD' || $data->buyer == 'Ritra Cargo Holland B.V.')
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">NOTIFY PARTY</div>
                            <div class="justify-center gap-4">
                                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Buyer</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="buyer_notif" name="buyer_notif" placeholder="Input buyer">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="address_notif" name="address_notif" placeholder="Input Address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="country_notif" name="country_notif" placeholder="Input country">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                     <!-- (-CONTRACT-) MARUBENI -->
                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">CONTRACT</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="title-sm">Ref No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="ref_no" placeholder="Input Ref No">
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm">Contract No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="contract_no" placeholder="Input Contract No">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-CONTAINER & SEAL NUMBER-) AGRON, HEXAPOLE, MATSUOKA -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.')
                    <div class="accordionItem3">            
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">CONTAINER & SEAL NUMBER</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="title-sm">Container NO</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_no" placeholder="Input Container NO">
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm">Seal No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="seal_no" placeholder="Input Seal No">
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm">Container No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_no2" placeholder="Input Container No">
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm">Seal No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="seal_no2" placeholder="Input Seal No">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-CARRIER-) TAIJIN, HONGKONG -->
                    @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">CARRIER</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Carrier</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="carrier" placeholder="Input Carrier">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Sailing on or about</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control borderInput" id="" name="salling">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Remarks</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="remarks" placeholder="Input Remarks">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-FOR ACCOUNT & RISK-) AGRON, HEXAPOLE, TEIJIN, HONGKONG, JIANGSU -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                    <div class="accordionItem3">         
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">FOR ACCOUNT & RISK</div>
                            <div class="justify-center gap-4">
                                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Buyer</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                        </div> 
                                        <input type="text" class="form-control borderInput" id="buyer_detail" name="buyer_for">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="address" name="address_for" placeholder="Input Address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="country" name="country_for">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Telp/Fax</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="telp" name="telp_for" placeholder="Input telp/fax">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'MARUSA Co.,Ltd.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                    <!-- (-DELIVER TERMS-) TAIJIN, HONGKONG, MARUSA -->
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
                                    <div class="title-sm">Deliver Terms</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="" name="" placeholder="Input Deliver Terms">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Invoice No</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="" name="" placeholder="Input Invoice No">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Date</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control borderInput" id="" name="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Part Of Loading</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck-loading"></i></span>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                                            <option selected disabled>Select Part Of Loading</option>
                                            <option name="lorem">lorem</option>    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Final Destination</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                                            <option selected disabled>Select Final Destination</option>
                                            <option name="lorem">lorem</option>    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="flexx gap-5">
                                        <div class="wrapperRadio w-100 mt-1">
                                            <input type="radio" name="deliver_terms" value="payment" class="radioBlue" id="DTpayment">
                                            <label for="DTpayment" class="optionBlue check">
                                                <span class="descBlue">T/T Payment</span>
                                            </label>
                                        </div>
                                        <div class="wrapperRadio w-100 mt-1">
                                            <input type="radio" name="deliver_terms" value="open" class="radioGreen" id="DTopen">
                                            <label for="DTopen" class="optionGreen check">
                                                <span class="descGreen">Open Account</span>
                                            </label>
                                        </div>
                                        <div class="wrapperRadio w-100 mt-1">
                                            <input type="radio" name="deliver_terms" value="lc" class="radioOrange" id="DTlc">
                                            <label for="DTlc" class="optionOrange check">
                                                <span class="descOrange">LC</span>
                                            </label>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Carrier</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Carrier">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($data->buyer == 'PENTEX LTD')
                    <!-- (-NEGOTIATION BANK-) PANTEX -->
                    <div class="accordionItem3">
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">NEGOTIATION BANK</div>
                            <div class="justify-center gap-4">
                                <!-- <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div> -->
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Negotiation Bank</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="nego_bank" placeholder="Input Negotiation Bank">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Remark</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="remark_bank" placeholder="Input Remark">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Deliver Terms</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="delive_bank" placeholder="Input Deliver Terms">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- (-MANUFACTURE-) AGRON, MARUBENI, HEXAPOLE, TAIJIN, HONGKONG, MATSUOKA, JIANGSU, MARUSA -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                    <div class="accordionItem3">            
                        <header class="accordionHeader3">
                            <div class="title-14-dark2">MANUFACTURE</div>
                            <div class="justify-center gap-4">
                                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                                <i class="muter fas fa-plus"></i>
                            </div>
                        </header>
                        <div class="accordionContent3">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="title-sm">Manufacture Name</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="manufacture_name" name="manufacture_name" placeholder="Input Name">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Address</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="address_manu" name="address_manu" placeholder="Input Address">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Container No</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_noyyyyz" placeholder="Input Container No">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Country</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="country_manu" name="country_manu" placeholder="Input Country">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">Telp</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_manu" name="telp_manu" placeholder="Input Telp">
                                </div>
                                <div class="col-12">
                                    <div class="title-sm">MID Code</div>
                                    <input type="text" class="form-control borderInput mt-1 mb-3" id="mid_manu" name="mid_manu" placeholder="Input MID Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                     <!-- (-SHIPMENT INFO-) AGRON, MARUBENI, HEXAPOLE, MATSUOKA, JIANGSU, MARUSA -->
                    @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.')
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
                                <div class="col-12">
                                    <div class="title-sm">Delivery Terms</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="delivery_terms" required>
                                            <option selected disabled>Select Part Of Loading</option>
                                            <option value="FOB, JAKARTA INDONESIA">FOB, JAKARTA INDONESIA</option>    
                                            <option value="CIF">CIF</option>    
                                            <option value="C&F">C&F</option>    
                                        </select>
                                    </div>
                                </div>
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
                                    <div class="title-sm">Part Of Loading</div>
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
                                    <div class="title-sm">Part Of Destination</div>
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
                                            <input type="radio" name="payment" value="T/T Payment" class="radioBlue" id="payment">
                                            <label for="payment" class="optionBlue check">
                                                <span class="descBlue">T/T Payment</span>
                                            </label>
                                        </div>
                                        <div class="wrapperRadio w-100 mt-1">
                                            <input type="radio" name="payment" value="open" class="radioGreen" id="open">
                                            <label for="open" class="optionGreen check">
                                                <span class="descGreen">Open Account</span>
                                            </label>
                                        </div>
                                        <div class="wrapperRadio w-100 mt-1">
                                            <input type="radio" name="payment" value="By LC" class="radioOrange" id="lc">
                                            <label for="lc" class="optionOrange check">
                                                <span class="descOrange">LC</span>
                                            </label>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="row" id="showHide">
                                <div class="col-md-6">
                                    <div class="title-sm">LC No</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input type="text" class="form-control borderInput" id="" name="" placeholder="input LC No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm">Date</div>
                                    <div class="input-group flex mt-1 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control borderInput" id="" name="" placeholder="input Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btnNext d-inline-block">Next & Save <i class="fs-18 ml-2 fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function getel(xx) {
        if (xx == "PAYMENT") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');
        } else if (xx == "OPEN") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');
        }
        else if (xx == "LC") {
            $('#showHide').addClass('hide');
            $('#showHide').removeClass('hide');
        }
    }
</script>