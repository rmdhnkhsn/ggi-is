@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">            
        <header class="accordionHeader3">
            <div class="title-14-dark2">BANK DETAIL</div>
            <div class="justify-center gap-4">
                    <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Bank Detail</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_detail" placeholder="Input Bank Detail">
                </div>
                <div class="col-12">
                    <div class="title-sm">Beneficiary Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bene_name" placeholder="Input Beneficiary Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Bank Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_name" placeholder="Input Bank Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">ACC#</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_acc" placeholder="Input ACC#">
                </div>
                <div class="col-12">
                    <div class="title-sm">Swift Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="bank_swift" placeholder="Input Swift Code">
                </div>
            </div>
        </div>
    </div>
@endif