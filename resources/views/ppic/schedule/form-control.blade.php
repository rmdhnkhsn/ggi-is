<div class="row">
    <div class="col-12 justify-sb">
        <div class="title-20">Create Schedule</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
    </div>
    <div class="col-12 mb-3">
        <div class="borderlight"></div>
    </div>
    <div class="col-12">
        <!-- <div class="title-sm">Filter OR</div> -->
        <div class="flex mt-1 mb-3">
            <button class="btn-blue-md btn-block" onclick="view_all_or();">View All OR</button> 
        </div>
    </div>
    <div class="col-12">
        <div class="title-sm">OR Number</div>
        <div class="flex mt-1 mb-3" id="select_cont">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
            </div>
            <select class="form-control borderInput select2bs4 pointer" style="width:100%" name="rekap_detail_id" id="rekap_detail_id">
                <option value="" disabled selected>Select OR Number</option>
                <!-- <option value="" disabled selected>Select Article/OR Number/Balance Qty/Ex-Fact</option> -->
                @foreach ($master_or as $d)
                    <!-- <option value="$d->id" or_qty="$d->wo_qty_balance" fob="$d->nilai" cm="$d->cm" ex_fact="$d->ex_fact" item_number="$d->item_master==null?:$d->item_master->F4101_LITM">$d->article."/".$d->no_or."/".$d->wo_qty_balance."/".$d->ex_fact</option> -->
                    <option value="{{$d['id']}}" or_qty="{{$d['wo_qty_balance']}}" fob="{{$d['nilai']}}" cm="{{$d['cm']}}" ex_fact="{{$d['ex_fact']}}" item_number="{{$d['item_master']}}">{{$d['article']."/".$d['no_or']."/".$d['wo_qty_balance']."/".$d['ex_fact']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="title-sm">Ex Fact</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="ex_fact" value="" placeholder="" readonly>
    </div>
    <div class="col-md-3">
        <div class="title-sm">Qty OR</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="or_qty" value="" placeholder="" readonly>
    </div>
    <div class="col-md-3">
        <div class="title-sm">FOB</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="fob_amount" value="" placeholder="" readonly>
    </div>
    <div class="col-md-3">
        <div class="title-sm">CM</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="cm_amount" value="" placeholder="" readonly>
    </div>
    <div class="col-md-3">
        <div class="title-sm">WO Number</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="wo_no" name="wo_no" value="" placeholder="" required>
    </div>
    <div class="col-md-3">
        <div class="title-sm">Qty Order</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="qty_order" name="qty_order" value="" placeholder="" required>
    </div>
    <div class="col-md-3">
        <div class="title-sm">Adj Supply</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="qty_adjsupply" name="qty_adjsupply" value="" placeholder="">
    </div>
    <div class="col-md-3">
        <div class="title-sm">Qty Complete</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="qty_complete" value="" placeholder="" readonly>
    </div>
    <div class="col-12">
        <!-- <div class="title-sm">Balance</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue"><i class="fs-20 fas fa-percentage"></i></span>
            </div>
            <input type="number" class="form-control borderInput" id="qty_balance" value="" placeholder="" readonly>
        </div> -->
        
        <div class="title-sm">Balance</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="qty_balance" value="" placeholder="" readonly>
    </div>
    <div class="col-md-3">
        <!-- <div class="flex gap-2">
            <div class="title-sm">Target/Day</div><div class="badge badge-info font-weight-light justify-center" style="border-radius:6px" id="labelsmv" ></div>
        </div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="qty_target_day" name="qty_target_day" value="" placeholder="" required> -->
        <div class="title-sm">Target/Day</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue"><i class="fs-20 fas fa-calendar"></i></span>
            </div>
            <input type="number" class="form-control borderInput" id="qty_target_day" name="qty_target_day" value="" placeholder="" required>
        </div>
    </div>
    <div class="col-md-3">
        <!-- <div class="title-sm">LC 1</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="lc1" name="lc1" value="100" placeholder="" required> -->
        <div class="title-sm">LC 1</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue"><i class="fs-20 fas fa-percentage"></i></span>
            </div>
            <input type="number" class="form-control borderInput" id="lc1" name="lc1" value="100" placeholder="" required>
        </div>
    </div>
    <div class="col-md-3">
        <!-- <div class="title-sm">LC 2</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="lc2" name="lc2" value="100" placeholder="" required> -->
        <div class="title-sm">LC 2</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue"><i class="fs-20 fas fa-percentage"></i></span>
            </div>
            <input type="number" class="form-control borderInput" id="lc2" name="lc2" value="100" placeholder="" required>
        </div>
    </div>
    <div class="col-md-3">
        <!-- <div class="title-sm">LC 3</div>
        <input type="number" class="form-control borderInput mt-1 mb-3" id="lc3" name="lc3" value="100" placeholder="" required> -->
        <div class="title-sm">LC 3</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue"><i class="fs-20 fas fa-percentage"></i></span>
            </div>
            <input type="number" class="form-control borderInput" id="lc3" name="lc3" value="100" placeholder="" required>
        </div>
    </div>
    <div class="col-12">
        <div class="title-sm">Cutting Factory</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
            </div>
            <select class="form-control borderInput pointer" name="cutting_factory_id" id="cutting_factory_id">
                <option value="" disabled selected>Select Cutting Factory</option>
                @foreach ($master_branch as $d)
                    <option value="{{$d->id}}">{{$d->nama_branch}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Set On</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-power-off"></i></span>
            </div>
            <select class="form-control borderInput pointer " name="plot_setting" id="plot_setting">
                <option value="LAST_SCHEDULE">ON LAST SCHEDULE</option>
                <option value="BEFORE_WO">BEFORE WO</option>
                <option value="AFTER_WO">AFTER WO</option>
                <option value="PICK_DATE">PICK MANUAL</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Line</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
            </div>
            <select class="form-control borderInput pointer " name="production_line_id" id="production_line_id">
                <option value="" disabled selected>Select Line Production</option>
                @foreach ($master_line_input as $d)
                    <option value="{{$d->id}}">{{$d->sub." / ".$d->line}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">WO</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
            </div>
            <select class="form-control borderInput pointer " name="prod_wo" id="prod_wo">
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Estimate Finish(D)</div>
        <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stopwatch"></i></span>
            </div>
            <input type="text" class="form-control borderInput" id="day_estimate" name="day_estimate" value="" placeholder="" readonly>
        </div>
    </div>
    <div class="col-12 my-2">
        <input type="hidden" id="adding_process" value="0" name="adding_process">
        <input class="check1" type="checkbox" id="adding_process_check">
        <label class="pointer title-13 ml-1" for="adding_process_check" style="position:relative;top:-3px">
            Adding Process <em>(Cutting Date = 1 or 3 Weeks before start date )</em>
        </label>
    </div>
    <div class="col-12" id="row_adding_process">
        <!-- <div class="flex mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-plus"></i></span>
            </div> -->
            <select class="form-control borderInput pointer mb-3" name="adding_process_desc" id="desc_adding_process" style="width:100%">
                <option value="" disabled selected>Select Adding Process</option>
                <option value="Print">Print</option>
                <option value="Embro">Embro</option>
                <option value="Sublim">Sublim</option>
                <option value="Smoke">Smoke</option>
                <option value="Payet">Payet</option>
                <option value="Pleat">Pleat</option>
                <option value="Washing">Washing</option>
            </select>
        <!-- </div> -->
    </div>
    <div class="col-md-6">
        <div class="title-sm">Fabric ETA</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="date" class="form-control borderInput" id="tgl_fabric" name="fabric_eta">
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Planner</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="text" class="form-control borderInput" id="planner" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Cut Date</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="date" class="form-control borderInput" id="tgl_cutting" name="cutting_date">
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Ship Date</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="date" class="form-control borderInput" id="tgl_shipment" name="shipment_date" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Start Date</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="date" class="form-control borderInput" id="tgl_mulai" name="start_date" readonly required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="title-sm">Finish Date</div>
        <div class="input-group date mt-1 mb-3">
            <div class="input-group-append">
                <div class="inputGroupBlue" style="width: 50px"><i class="fs-20 fas fa-calendar-alt"></i></div> 
            </div>
            <input type="date" class="form-control borderInput" id="tgl_selesai" name="finish_date" readonly required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <input type="hidden" class="form-control" id="id" name="id" value="0">
        <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{ Auth::user()->nik }}" placeholder="">
        <input type="hidden" class="form-control" id="user_role" value="{{ Auth::user()->role }}" placeholder="">
        <!-- <input type="hidden" class="form-control" id="hour_balance" name="hour_balance" value="0"> -->
        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
            <button id="submit" type="submit" class="btn-blue-md btn-block" onclick="return confirm('Save Data ?')">{{$submit}}<i class="ml-3 fs-18 fas fa-plus"></i></button> 
            <a id="btnDelete" href="#" type="button" class="btn btn-red-md btn-block" onclick="return confirm('Delete Schedule ?')">Delete Schedule<i class="ml-3 fs-18 fas fa-trash"></i></a> 
        @endif
    </div>
</div>