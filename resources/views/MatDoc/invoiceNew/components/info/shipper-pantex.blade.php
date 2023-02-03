<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $company_ship = null;
    $addres_ship = null;
    $city_ship = null;
    $country_ship = null;
}else {
    $company_ship = $info_tambahan->company_ship??$info_tambahan->company_bene;
    $addres_ship = $info_tambahan->addres_ship??$info_tambahan->address_bene;
    $city_ship = $info_tambahan->city_ship??$info_tambahan->city_bene;
    $country_ship = $info_tambahan->country_bene??$info_tambahan->country_ship;
    // dd($info_tambahan->country_bene);
}
?>
@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">SHIPPER</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Company</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="company_ship" value="{{$company_ship}}" placeholder="Input Company">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="addres_ship" value="{{$addres_ship}}" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">City</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="city_ship" value="{{$city_ship}}" placeholder="Input City">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="country_ship" value="{{$country_ship}}" placeholder="Input Country">
                </div>
            </div>
        </div>
    </div>
@endif