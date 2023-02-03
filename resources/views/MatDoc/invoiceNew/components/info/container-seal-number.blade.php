<?php
    // dD($data);
if ($info_tambahan == null) {
    $container_no = $data->no_kontainer;
    $seal_no = $data->no_seal;
    $container_no2 = $data->no_kontainer2;
    $seal_no2 = $data->no_seal2;
}else {
    $container_no = $info_tambahan->container_no??$data->no_kontainer;
    $seal_no = $info_tambahan->seal_no??$data->no_seal;
    $container_no2 = $info_tambahan->container_no3;
    $seal_no2 = $info_tambahan->no_seal2;
}
?>
@if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.')
    <div class="accordionItem3">            
        <header class="accordionHeader3">
            <div class="title-14-dark2">CONTAINER & SEAL NUMBER</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="title-sm">Container NO</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_no" value="{{$container_no}}"placeholder="Input Container NO">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Seal No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="seal_no" value="{{$seal_no}}"placeholder="Input Seal No">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Container No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_no2" value="{{$container_no2}}"placeholder="Input Container No">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Seal No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="seal_no2" value="{{$seal_no2}}"placeholder="Input Seal No">
                </div>
            </div>
        </div>
    </div>
@endif