<?php
if ($info_tambahan == null) {
    $company = null;
    $address = null;
    $city = null;
    $country = null;
    $telp_bene = null;
}else {
    // dD($info_tambahan); i
    $company = $info_tambahan->company_bene;
    $address = $info_tambahan->address_bene;
    $city = $info_tambahan->city_bene;
    $country = $info_tambahan->country_bene;
    $telp_bene = $info_tambahan->telp_bene;
}
?>
@if ($data->buyer == 'AGRON, INC.' || $data->buyer == 'MARUBENI CORPORATION JEPANG' || $data->buyer == 'MARUBENI FASHION LINK LTD.' || $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' || $data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'YAMATO TRANSPORT (S) PTE LTD' || $data->buyer == 'Ritra Cargo Holland B.V.')
<div class="accordionItem3">        
    <header class="accordionHeader3">
        @if($data->buyer == 'MATSUOKA TRADING CO., LTD.')
        <div class="title-14-dark2">MESSR</div>
        @else
        <div class="title-14-dark2">BENEFICIARY</div>
        @endif
        <div class="justify-center gap-4">
            <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
            <i class="muter fas fa-plus"></i>
        </div>
    </header>
    <div class="accordionContent3">
        <div class="row mt-2">
            <div class="col-12">
                <div class="title-sm">Company</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" value="{{$company}}" placeholder="Input Company">
            </div>
            <div class="col-12">
                <div class="title-sm">Address</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" value="{{$address}}" placeholder="Input Address">
            </div>
            <div class="col-12">
                <div class="title-sm">City</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" value="{{$city}}" placeholder="Input City">
            </div>
            <div class="col-12">
                <div class="title-sm">Country</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" value="{{$country}}" placeholder="Input Country">
            </div>
            <!-- Only for matsuoka  -->
            @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
            <div class="col-12">
                <div class="title-sm">Telp</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_bene" name="telp_bene" value="{{$telp_bene}}" placeholder="Input Country">
            </div>
            @endif
            <!-- End  -->
        </div>
    </div>
</div>
@endif
