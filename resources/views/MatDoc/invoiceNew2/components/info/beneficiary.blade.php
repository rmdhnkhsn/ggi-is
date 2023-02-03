@if ($data->buyer == 'AGRON, INC.' || $data->buyer == 'MARUBENI CORPORATION JEPANG' || $data->buyer == 'MARUBENI FASHION LINK LTD.' || $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' || $data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'YAMATO TRANSPORT (S) PTE LTD' || $data->buyer == 'Ritra Cargo Holland B.V.' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
    <div class="accordionItem3">        
        <header class="accordionHeader3">
            <div class="title-14-dark2">BENEFICIARY</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Company</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">City</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country">
                </div>
                <!-- Only for matsuoka  -->
                @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_bene" name="telp_bene" placeholder="Input Country">
                </div>
                @endif
                <!-- End  -->
            </div>
        </div>
    </div>
@endif