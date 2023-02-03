<?php
if ($info_tambahan == null) {
    $company_eksp = null;
    $address_eksp = null;
    $city_eksp = null;
    $country_eksp = null;
    $telp_eksp = null;
}else {
    $company_eksp = $info_tambahan->company_eksp??$info_tambahan->company_bene;
    $address_eksp = $info_tambahan->address_eksp??$info_tambahan->address_bene;
    $city_eksp = $info_tambahan->city_eksp??$info_tambahan->city_bene;
    $country_eksp = $info_tambahan->country_eksp??$info_tambahan->country_bene;
    $telp_eksp = $info_tambahan->telp_eksp??$info_tambahan->telp_bene;
}
?>
@if ($data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'TOYOTA TSUSHO CORPORATION')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">EXPORTER</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Company</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$company_eksp}}"name="company_eksp" placeholder="Input Company">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$address_eksp}}"name="address_eksp" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">City</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$city_eksp}}"name="city_eksp" placeholder="Input City">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$country_eksp}}"name="country_eksp" placeholder="Input Country">
                </div>
                @if ($data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'TOYOTA TSUSHO CORPORATION')
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_eksp" value="{{$telp_eksp}}"name="telp_eksp" placeholder="Input Country">
                </div>
                @endif
            </div>
        </div>
    </div>
@endif