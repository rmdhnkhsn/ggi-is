<?php
if ($info_tambahan == null) {
    $carrier = null;
    $salling = null;
    $remarks = null;
}else {
    $carrier = $info_tambahan->carrier;
    $salling = $info_tambahan->salling;
    $remarks = $info_tambahan->remarks;
}
?>
@if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">CARRIER</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Carrier</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$carrier}}" name="carrier" placeholder="Input Carrier">
                </div>
                <div class="col-12">
                    <div class="title-sm">Sailing on or about</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" value="{{$salling}}" name="salling">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Remarks</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" value="{{$remarks}}" name="remarks" placeholder="Input Remarks">
                </div>
            </div>
        </div>
    </div>
@endif