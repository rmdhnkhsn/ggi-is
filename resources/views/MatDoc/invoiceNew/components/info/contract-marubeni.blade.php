<?php
    // dD($info_tambahan);
if ($info_tambahan == null) {
    $ref_no = null;
    $contract_no = null;
}else {
    $ref_no = $info_tambahan->ref_no;
    $contract_no = $info_tambahan->contract_no;
}
?>
@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">CONTRACT</div>
            <div class="justify-center gap-4">
                <div class="ceklis_invoice"> <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="title-sm">Ref No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="ref_no" name="ref_no" value="{{$ref_no}}" placeholder="Input Ref No">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Contract No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="contract_no" name="contract_no" value="{{$contract_no}}" placeholder="Input Contract No">
                </div>
            </div>
        </div>
    </div>
@endif