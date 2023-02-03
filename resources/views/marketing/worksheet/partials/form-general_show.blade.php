
<div class="row">
    <div class="col-12">
        <div class="cards px-4 py-4">
            <div class="row">
                <div class="col-12">
                <div class="ws-judul">General Identity</div>
                <div class="ws-creation mt-2">WO Creation Date : {{$master_data->date}}</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <span class="ws-sub-title">Garmen PO</span>
                            <div class="ws-field mt-2">
                                <input type="text" id="no_po" name="no_po" value="{{$master_data->general_identity->no_po}}" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">OR Number</span>
                            <div class="ws-field mt-2">
                                <input type="text" id="nomor_or" name="nomor_or" value="{{$master_data->general_identity->nomor_or}}" placeholder="Insert Or Number" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Number Contract</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="contract" id="contract" name="contract" value="{{$master_data->general_identity->contract}}" placeholder="Contract Number..." disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Buyer</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="buyer" id="buyer" name="buyer" value="{{$buyer->F0101_ALPH}}" placeholder="Buyer..." disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Trading CO/Agent</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="agent" id="agent" value="{{$master_data->general_identity->agent}}" name="agent" placeholder="Trading CO/Agent..." disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Article Code</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="article" id="article" value="{{$master_data->general_identity->article}}" name="article" placeholder="Article Code..." disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Product Name</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="product_name" id="product_name" value="{{$master_data->general_identity->product_name}}" name="product_name" placeholder="Product Name..." disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="ws-sub-title">Style Code</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="style" id="style" value="{{$master_data->general_identity->style_code}}" name="style_code" placeholder="Style Code..." disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="ws-sub-title">Style Name</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="style_name" id="style_name" value="" name="style_name" value="{{$master_data->general_identity->style_name}}" placeholder="Style Name..." disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="ws-sub-title">Description</span>
                            <div class="ws-message mt-2">
                                <textarea placeholder="Input Additional Description.." name="description" id="description" value="" disabled>{{$master_data->general_identity->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">Shipment Date</span>
                            <div class="input-group date mt-2" id="reservationdate" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate" class="shipment_date" id="shipment_date" name="shipment_date" value="{{$master_data->general_identity->shipment_date}}" placeholder="Select Date" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">Request Ex Fty Date</span>
                            <div class="input-group date mt-2" id="reservationdate2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span><i class="ml-3 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate2" class="ex_fact" id="ex_fact" name="exfact_date" value="{{$master_data->general_identity->exfact_date}}" placeholder="Select Date" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <span class="ws-sub-title">PO Creation</span>
                            <div class="input-group date mt-2" id="reservationdate3" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                <div class="ws-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span><i class="ml-3 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input input-date-ws" data-target="#reservationdate3" id="po_date" name="po_date" placeholder="Select Date" value="{{$master_data->general_identity->po_date}}" disabled/>
                            </div>
                        </div>
                        <div class="col-12" style="padding-top:10px;">
                            <span class="ws-sub-title">Ship To</span>
                            <div class="ws-field mt-2">
                                <input type="text" class="ship_to" id="ship_to" value="{{$address->F0101_ALPH}}" name="ship_to" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row sticky-top-position">
                        <div class="col-12 mr-auto px-2">
                            <span class="ws-sub-title ml-u">Image</span>
                            <div class="file-upload">
                                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/general_identity/'.$master_data->general_identity->file) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="padding-top:20px;">
                    <a href="javascript:void(0)" class="btn btn-warning btn-sm col-1 editProduct text-white" style="float:right;" data-id="{{ $master_data->general_identity->id }}" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit text-white"></i> Edit</a>
                    <a href="{{route('worksheet.general_delete', $master_data->general_identity->master_id)}}" style="float:right;" class="btn btn-danger btn-sm col-1 mr-2" title="Delete"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>