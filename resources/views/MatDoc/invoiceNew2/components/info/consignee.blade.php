@if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'PENTEX LTD')
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
                <!-- Buyer PENTEX LTD -->
                @if ($data->buyer == 'PENTEX LTD')
                <div class="col-12">
                    <div class="title-sm">Shipment To</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-shipping-fast"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="shipto" name="shipto" placeholder="Input shipment">
                    </div>
                </div>
                @endif
                <!-- End  -->
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="country_cons" name="country_cons" placeholder="Input country">
                    </div>
                </div>
                <!-- Buyer Matsuoka & Jiangsu  -->
                @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY')
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="telp" name="telp" placeholder="Input telp">
                    </div>
                </div>
                @endif
                <!-- End  -->
            </div>
        </div>
    </div>
@endif