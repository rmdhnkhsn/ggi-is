<?php
if ($info_tambahan == null) {
    $manufacture_name = null;
    $address_manu = null;
    $container_no3 = null;
    $country_manu = null;
    $telp_manu = null;
    $mid_manu = null;
}else {
    $manufacture_name = $info_tambahan->manufacture_name;
    $address_manu = $info_tambahan->address_manu;
    $container_no3 = $info_tambahan->container_no3;
    $country_manu = $info_tambahan->country_manu;
    $telp_manu = $info_tambahan->telp_manu;
    $mid_manu = $info_tambahan->mid_manu;
}
?>
@if ($buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $buyer == 'AGRON, INC.'|| $buyer == 'MARUBENI CORPORATION JEPANG' ||$buyer == 'MARUBENI FASHION LINK LTD.' || $buyer == 'HEXAPOLE COMPANY LIMITED' || $buyer == 'MATSUOKA TRADING CO., LTD.' || $buyer == 'JIANGSU TEXTILE INDUSTRY' || $buyer == 'MARUSA Co.,Ltd.' || $buyer == 'HONG KONG DESCENTE TRADING LTD.')
    <div class="accordionItem3">            
        <header class="accordionHeader3">
            <div class="title-14-dark2">MANUFACTURE</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Manufacture Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="manufacture_name" name="manufacture_name" value="{{$manufacture_name}}" placeholder="Input Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="address_manu" name="address_manu" value="{{$address_manu}}" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="country_manu" name="country_manu" value="{{$country_manu}}" placeholder="Input Country">
                </div>
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_manu" name="telp_manu" value="{{$telp_manu}}" placeholder="Input Telp">
                </div>
                <div class="col-12">
                    <div class="title-sm">MID Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="mid_manu" name="mid_manu" value="{{$mid_manu}}" placeholder="Input MID Code">
                </div>
            </div>
        </div>
    </div>
@endif
