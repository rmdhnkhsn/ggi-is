@if ($data->buyer == 'PENTEX LTD')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">SHIPPER</div>
            <div class="justify-center gap-4">
                    <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Company</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="company_ship" placeholder="Input Company">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="addres_ship" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">City</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="city_ship" placeholder="Input City">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="country_ship" placeholder="Input Country">
                </div>
            </div>
        </div>
    </div>
@endif