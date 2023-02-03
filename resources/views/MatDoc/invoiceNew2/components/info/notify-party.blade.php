@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'OSTIE PLUS GROUP LIMITED' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == 'TOYOTA TSUSHO CORPORATION' || $data->buyer == 'YAMATO TRANSPORT (S) PTE LTD' || $data->buyer == 'Ritra Cargo Holland B.V.' || $data->buyer == 'PENTEX LTD')
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
                <!-- Buyer Teijimn & Hongkong  -->
                @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_bene" name="telp_bene" placeholder="Input Country">
                </div>
                @endif
                <!-- End  -->
            </div>
        </div>
    </div>
@endif
