@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">NEGOTIATION BANK</div>
            <div class="justify-center gap-4">
                    <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Negotiation Bank</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="nego_bank" placeholder="Input Negotiation Bank">
                </div>
                <div class="col-12">
                    <div class="title-sm">Remark</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="remark_bank" placeholder="Input Remark">
                </div>
                <div class="col-12">
                    <div class="title-sm">Deliver Terms</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="delive_bank" placeholder="Input Deliver Terms">
                </div>
            </div>
        </div>
    </div>
@endif