<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $consigne = null;
    $address_cons = null;
    $shipto = null;
    $country_cons = null;
    $cons_shipto = null;
    $cons_gate = null;
    $cons_street = null;
    $telp = null;
}else {
    $consigne = $info_tambahan->consigne;
    $address_cons = $info_tambahan->address_cons;
    $shipto = $info_tambahan->shipto;
    $country_cons = $info_tambahan->country_cons;
    $cons_gate = $info_tambahan->cons_gate;
    $cons_street = $info_tambahan->cons_street;
    $cons_shipto = $info_tambahan->cons_shipto;
    $telp = $info_tambahan->telp;
}
?>
@if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'PENTEX LTD')
<div class="accordionItem3">            
    <header class="accordionHeader3">
        <div class="title-14-dark2">CONSIGNEE/ SHIP TO</div>
        <div class="justify-center gap-4">
            <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
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
                    <input type="text" class="form-control borderInput" id="consigne" name="consigne" value="{{$consigne}}" placeholder="Input Address">
                </div>
            </div>
            @if ($data->buyer == 'PENTEX LTD')
            <div class="col-12">
                <div class="title-sm">Address</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                    </div>
                    <input type="text" class="form-control borderInput" id="" name="cons_shipto" value="{{$cons_shipto}}" placeholder="Input Address">
                </div>
            </div>
            @else
            <div class="col-12">
                <div class="title-sm">Address</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                    </div>
                    <input type="text" class="form-control borderInput" id="" name="address_cons" value="{{$address_cons}}" placeholder="Input Address">
                </div>
            </div>
            @endif
            <!-- Buyer PENTEX LTD -->
            @if ($data->buyer == 'PENTEX LTD')
            <div class="col-12">
                <div class="title-sm">Street</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                    </div>
                    <input type="text" class="form-control borderInput" id="cons_street" name="cons_street" value="{{$cons_street}}" placeholder="Input shipment">
                </div>
            </div>
            <div class="col-12">
                <div class="title-sm">Gate</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-shipping-fast"></i></span>
                    </div>
                    <input type="text" class="form-control borderInput" id="cons_gate" name="cons_gate" value="{{$cons_gate}}" placeholder="Input shipment">
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
                    <input type="text" class="form-control borderInput" id="country_cons" name="country_cons" value="{{$country_cons}}" placeholder="Input country">
                </div>
            </div>
            <!-- Buyer Matsuoka & Jiangsu  -->
            @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY')
            <div class="col-12">
                <div class="title-sm">Telp</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>
                    </div>
                    <input type="text" class="form-control borderInput" id="telp" name="telp" value="{{$telp}}" placeholder="Input telp">
                </div>
            </div>
            @endif
            <!-- End  -->
        </div>
    </div>
</div>
@endif