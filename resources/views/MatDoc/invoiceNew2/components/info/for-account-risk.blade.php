 @if ($data->buyer == 'AGRON, INC.'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.' ||$data->buyer == 'PENTEX LTD' ||$data->buyer == 'TOYOTA TSUSHO CORPORATION')
    <div class="accordionItem3">         
        <header class="accordionHeader3">
            <div class="title-14-dark2">FOR ACCOUNT & RISK</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Buyer</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                        </div> 
                        <input type="text" class="form-control borderInput" id="buyer_detail" name="buyer_for">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Address</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="address" name="address_for" placeholder="Input Address">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Country</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-asia"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="country" name="country_for">
                    </div>
                </div>

                <!-- Khusus teijin && hongkong  -->
                @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
                <div class="col-12">
                    <div class="title-sm">Telp/Fax</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="telp" name="telp_for" placeholder="Input telp/fax">
                    </div>
                </div>
                @endif
                <!-- end  -->
            </div>
        </div>
    </div>
@endif