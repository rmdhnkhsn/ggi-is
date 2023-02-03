<div class="row">
    <div class="col-12">
        <div class="px-4 py-4">
            <div class="row">
                <div class="col-12">
                    <div class="ws-judul">General Identity</div>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="" placeholder="">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <span class="ws-sub-title">Garmen PO</span>
                            <div class="ws-field mt-2">
                                <input type="text" id="no_po" name="no_po" value="{{$master_data->no_po}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">OR Number</span>
                            <div class="ws-field mt-2">
                                <input type="text" id="no_or" name="nomor_or" value="" placeholder="Insert Or Number">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Number Contract</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="contract" id="cont" name="contract" value="" placeholder="Contract Number...">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Buyer</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="buyer" id="buyer" name="buyer" value="{{$buyer->F0101_ALPH}}" placeholder="Buyer..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Trading CO/Agent</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="agent" id="age" value="" name="agent" placeholder="Trading CO/Agent..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Article Code</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="article" id="arti" value="" name="article" placeholder="Article Code..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Product Name</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="product_name" id="product_n" value="" name="product_name" placeholder="Product Name..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="ws-sub-title">Style Code</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="style" id="style_c" value="" name="style_code" placeholder="Style Code..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="ws-sub-title">Style Name</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="style_name" id="style_n" value="" name="style_name" placeholder="Style Name..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Description</span>
                            <div class="ws-message mt-2">
                                <textarea placeholder="Input Additional Description.." name="description" id="desc" value=""></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">Shipment Date</span>
                            <div class="input-group date mt-2" id="reservationdate" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate" class="shipment_date" id="shipment_d" name="shipment_date" placeholder="Select Date"/>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">Request Ex Fty Date</span>
                            <div class="input-group date mt-2" id="reservationdate2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span><i class="ml-3 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" value="" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate2" class="ex_fact" id="exfact_d" name="exfact_date" placeholder="Select Date" required/>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">PO Creation</span>
                            <div class="input-group date mt-2" id="reservationdate3" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span><i class="ml-3 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate3" id="po_d" name="po_date" placeholder="Select Date" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-block col-12">{{$submit}}</button>