@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">CONTRACT</div>
            <div class="justify-center gap-4">
                    <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="title-sm">Ref No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="ref_no" placeholder="Input Ref No">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Contract No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="contract_no" placeholder="Input Contract No">
                </div>
            </div>
        </div>
    </div>
@endif