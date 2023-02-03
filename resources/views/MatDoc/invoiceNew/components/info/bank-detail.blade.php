<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $bank_detail = null;
    $bene_name = null;
    $bank_name = null;
    $bank_address = null;
    $bank_acc = null;
    $bank_swift = null;
}else {
    $bank_detail = $info_tambahan->bank_detail;
    $bene_name = $info_tambahan->bene_name;
    $bank_name = $info_tambahan->bank_name;
    $bank_address = $info_tambahan->bank_address;
    $bank_acc = $info_tambahan->bank_acc;
    $bank_swift = $info_tambahan->bank_swift;
}
?>
@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">            
        <header class="accordionHeader3">
            <div class="title-14-dark2">BANK DETAIL</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Bank Detail</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_detail" value="{{$bank_detail}}" placeholder="Input Bank Detail">
                </div>
                <div class="col-12">
                    <div class="title-sm">Beneficiary Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bene_name" value="{{$bene_name}}" placeholder="Input Beneficiary Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Bank Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_name" value="{{$bank_name}}" placeholder="Input Bank Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Bank Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_address" value="{{$bank_address}}" placeholder="Input Bank Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Account Number</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_acc" value="{{$bank_acc}}" placeholder="Input ACC#">
                </div>
                <div class="col-12">
                    <div class="title-sm">Swift Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_swift" value="{{$bank_swift}}" placeholder="Input Swift Code">
                </div>
            </div>
        </div>
    </div>
@endif