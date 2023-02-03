<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <form action="{{route('budget.monitoring.filter')}}">
        @crsf
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Filter Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Month</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-append">
                                <div class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></div>
                            </div>
                            <input type="month" class="form-control borderInput" name="tanggal" placeholder="Select Date" required/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Account Description</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="AccountDebit" required>
                                <option value="all" selected>All Account</option>
                                @foreach($AccountDebit as $key=>$value)
                                    <option value="{{$value->account}}">{{$value->deskripsi}}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Filter Data</div>
                        <div class="flexx gap-5 mt-1">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="shipment_info" value="all" class="radioBlue" id="all" checked>
                                <label for="all" class="optionBlue check">
                                    <span class="descBlue">All Data</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="shipment_info" value="balance" class="radioGreen" id="balance">
                                <label for="balance" class="optionGreen check">
                                    <span class="descGreen">Balance</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="shipment_info" value="minus" class="radioRed" id="minus">
                                <label for="minus" class="optionRed check">
                                    <span class="descRed">Balance Minus</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>