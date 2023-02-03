<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $buyer_notif = null;
    $address_notif = null;
    $shipto_notif = null;
    $street_notif = null;
    $gate_notif = null;
    $country_notif = null;
    $telp_for = null;
}else {
    $buyer_notif = $info_tambahan->buyer_notif;
    $address_notif = $info_tambahan->address_notif;
    $shipto_notif = $info_tambahan->shipto_notif;
    $street_notif = $info_tambahan->street_notif;
    $gate_notif = $info_tambahan->gate_notif;
    $country_notif = $info_tambahan->country_notif;
    $telp_for = $info_tambahan->telp??$info_tambahan->telp_for;
}
?>
@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'OSTIE PLUS GROUP LIMITED' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == 'TOYOTA TSUSHO CORPORATION' || $data->buyer == 'YAMATO TRANSPORT (S) PTE LTD' || $data->buyer == 'Ritra Cargo Holland B.V.' || $data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">NOTIFY PARTY</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
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
                        <input type="text" class="form-control borderInput" id="buyer_notif" name="buyer_notif" value="{{$buyer_notif}}" placeholder="Input buyer">
                    </div>
                </div>
                @if($data->buyer == 'PENTEX LTD')
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="shipto_notif" name="shipto_notif" value="{{$shipto_notif}}" placeholder="Input Address">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Street</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="street_notif" name="street_notif" value="{{$street_notif}}" placeholder="Input Address">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Gate</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="gate_notif" name="gate_notif" value="{{$gate_notif}}" placeholder="Input Address">
                    </div>
                </div>
                @else
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="address_notif" name="address_notif" value="{{$address_notif}}" placeholder="Input Address">
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="country_notif" name="country_notif" value="{{$country_notif}}" placeholder="Input country">
                    </div>
                </div>
                <!-- Buyer Teijimn & Hongkong  -->
                @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="telp_for" name="telp_for" value="{{$telp_for}}" placeholder="Input Country">
                    </div>
                </div>
                @endif
                <!-- End  -->
            </div>
        </div>
    </div>
@endif
