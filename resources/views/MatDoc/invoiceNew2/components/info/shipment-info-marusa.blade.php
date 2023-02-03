@if ($data->buyer == 'MARUSA Co.,Ltd.')
    <div class="accordionItem3">
        <header class="accordionHeader3">
            <div class="title-14-dark2">SHIPMENT INFO</div>
            <div class="justify-center gap-4">
                <div class="checkAccord"><img src="{{url('images/iconpack/invoice/double-check.svg')}}" width="16px"></div>
                <i class="muter fas fa-plus"></i>
            </div>
        </header>
        <div class="accordionContent3">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="title-sm">Ship On Board</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="shipOnBoard">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port Of Loading</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck-loading"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="partOfLoading" required>
                            <option selected disabled>Select Port Of Loading</option>
                            <option value="TG. PRIOK, JAKARTA INDONESIA">TG. PRIOK, JAKARTA INDONESIA</option>    
                            <option value="SOEKARNO HATTA, JAKARTA INDONESIA">SOEKARNO HATTA, JAKARTA INDONESIA</option>    
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Port Of Destination</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="partOfDestination" name="partOfDestination" placeholder="Input country">
                    </div>
                </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Made in Origin</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-europe"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="made_in" name="made_in" placeholder="Input Made in Origin">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif