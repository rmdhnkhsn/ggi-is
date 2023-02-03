@if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'MARUSA Co.,Ltd.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
    <div class="accordionItem3">            
        <header class="accordionHeader3">
            <div class="title-14-dark2">MANUFACTURE</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Manufacture Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="manufacture_name" name="manufacture_name" placeholder="Input Name">
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="address_manu" name="address_manu" placeholder="Input Address">
                </div>
                <div class="col-12">
                    <div class="title-sm">Container No</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="container_no3" placeholder="Input Container No">
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="country_manu" name="country_manu" placeholder="Input Country">
                </div>
                <div class="col-12">
                    <div class="title-sm">Telp</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="telp_manu" name="telp_manu" placeholder="Input Telp">
                </div>
                <div class="col-12">
                    <div class="title-sm">MID Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="mid_manu" name="mid_manu" placeholder="Input MID Code">
                </div>
            </div>
        </div>
    </div>
@endif
