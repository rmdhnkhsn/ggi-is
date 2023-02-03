<div class="form-row" id="select_cont">
    <div class="form-group col-md-12">
        <label>OR Number</label>
        <select class="form-control select2bs4" style="width: 100%;" name="rekap_detail_id" id="rekap_detail_id" required>
        <option value="" disabled selected>Select Article/OR Number/Balance Qty/Ex-Fact</option>
            @foreach ($master_or as $d)
                <option value="{{$d->id}}" or_qty="{{$d->wo_qty_balance}}" fob="{{$d->nilai}}" cm="{{$d->cm}}" ex_fact="{{$d->ex_fact}}" item_number="{{$d->item_master==null?:$d->item_master->F4101_LITM}}">{{$d->article."/".$d->no_or."/".$d->wo_qty_balance."/".$d->ex_fact}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="roll">Ex Fact</label>
        <input type="text" class="form-control" id="ex_fact" value="" placeholder="" readonly>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">Qty OR</label>
        <input type="text" class="form-control" id="or_qty" value="" placeholder="" readonly>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">FOB</label>
        <input type="text" class="form-control" id="fob_amount" value="" placeholder="" readonly>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">CM</label>
        <input type="text" class="form-control" id="cm_amount" value="" placeholder="" readonly>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="roll">WO Number</label>
        <input type="text" class="form-control" id="wo_no" name="wo_no" value="" placeholder="" required>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">Qty Order</label>
        <input type="number" class="form-control" id="qty_order" name="qty_order" placeholder="" required>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">Adj.Supply </label>
        <input type="number" class="form-control" id="qty_adjsupply" name="qty_adjsupply" value="" placeholder="">
    </div>
    <div class="form-group col-md-3">
        <label for="roll">Complete</label>
        <input type="number" class="form-control" id="qty_complete" value="" placeholder="" readonly>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="roll">Balance</label>
        <input type="number" class="form-control" id="qty_balance" value="" placeholder="" readonly>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="roll">Target/Day<span class="badge badge-info font-weight-light ml-1" id="labelsmv" ></span></label>
        <input type="number" class="form-control" id="qty_target_day" name="qty_target_day" value="" placeholder="" required>
    </div>  
    <div class="form-group col-md-3">
        <label for="roll">LC 1</label>
        <input type="number" class="form-control" id="lc1" name="lc1" value="100" placeholder="" required>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">LC 2</label>
        <input type="number" class="form-control" id="lc2" name="lc2" value="100" placeholder="" required>
    </div>
    <div class="form-group col-md-3">
        <label for="roll">LC 3</label>
        <input type="number" class="form-control" id="lc3" name="lc3" value="100" placeholder="" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label>Cutting Factory</label>
        <select class="form-control select2bs4" style="width: 100%;" name="cutting_factory_id" id="cutting_factory_id" required>
        <option value="" disabled selected>Select Cutting Factory</option>
            @foreach ($master_branch as $d)
                <option value="{{$d->id}}">{{$d->nama_branch}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label>Set On</label>
        <select class="form-control select2bs4" style="width: 100%;" name="plot_setting" id="plot_setting" required>
            <option value="LAST_SCHEDULE">ON LAST SCHEDULE</option>
            <option value="BEFORE_WO">BEFORE WO</option>
            <option value="AFTER_WO">AFTER WO</option>
            <option value="PICK_DATE">PICK MANUAL</option>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label>Line<span class="badge badge-info font-weight-light ml-1" id="labelline" ></span></label>
        <select class="form-control select2bs4" style="width: 100%;" name="production_line_id" id="production_line_id" required>
        <option value="" disabled selected>Select Line Production</option>
            @foreach ($master_line as $d)
                <option value="{{$d->id}}">{{$d->sub." / L ".$d->line}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-3">
        <label>WO</label>
        <select class="form-control select2bs4" style="width: 100%;" name="prod_wo" id="prod_wo">
            <!-- @foreach ($master_line as $d)
                <option value="{{$d->id}}">{{$d->sub." / ".$d->line}}</option>
            @endforeach -->
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="roll">Estimate Finish</label>
        <input type="text" class="form-control" id="day_estimate" name="day_estimate" value="" placeholder="" readonly>
    </div>
</div>

<div class="form-row">
    <div class="form-check flex">
        <input class="form-check-input" type="hidden" id="adding_process" value="0" name="adding_process">
        <input class="form-check-input check1" type="checkbox" id="adding_process_check">
        <label class="form-check-label" for="check1">
            <span class="kondisi-sign">Adding Process <em>(Cutting Date = 1 or 3 Weeks before start date )</em></span>
        </label>
    </div>
</div>

<div class="form-row d-none" id="row_adding_process">
    <div class="form-group col-md-12">
        <!-- <label>Desc Adding Process</label> -->
        <select class="form-control select2bs4" style="width: 100%;" name="adding_process_desc" id="desc_adding_process">
        <option value="" disabled selected>Select Adding Process</option>
            <option value="Print">Print</option>
            <option value="Embro">Embro</option>
            <option value="Sublim">Sublim</option>
            <option value="Smoke">Smoke</option>
            <option value="Payet">Payet</option>
            <option value="Pleat">Pleat</option>
            <option value="Washing">Washing</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <span class="wp-subtitle-modal"></span>
        <div class="input-group date mt-1" id="fabriceta" data-target-input="nearest">
            <div class="input-group-append">
                <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Fabric ETA</span></div>
            </div>
            <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#fabriceta" id="tgl_fabric" name="fabric_eta" placeholder=""/>
        </div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <span class="wp-subtitle-modal"></span>
        <div class="input-group date mt-1" id="cuttingdate" data-target-input="nearest">
            <div class="input-group-append">
                <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Cutt Date</span></div>
            </div>
            <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#cuttingdate" id="tgl_cutting" name="cutting_date" placeholder=""/>
        </div>
    </div>

    <div class="form-group col-md-6">
        <span class="wp-subtitle-modal"></span>
        <div class="input-group date mt-1" id="shipdate" data-target-input="nearest">
            <div class="input-group-append">
                <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Ship Date</span></div>
            </div>
            <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#shipdate" id="tgl_shipment" name="shipment_date" placeholder="" required/>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <span class="wp-subtitle-modal"></span>
        <div class="input-group date mt-1" id="startdate" data-target-input="nearest">
            <div class="input-group-append">
                <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Start Date</span></div>
            </div>
            <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#startdate" id="tgl_mulai" name="start_date" placeholder="" readonly required/>
        </div>
    </div>

    <div class="form-group col-md-6">
        <span class="wp-subtitle-modal"></span>
        <div class="input-group date mt-1" id="finishdate" data-target-input="nearest">
            <div class="input-group-append">
                <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Finish Date</span></div>
            </div>
            <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#finishdate" id="tgl_selesai" name="finish_date" placeholder="" readonly required/>
        </div>
    </div>
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="id" name="id" value="0">
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{ Auth::user()->nik }}" placeholder="">
    <input type="hidden" class="form-control" id="user_role" value="{{ Auth::user()->role }}" placeholder="">
</div>
<!-- <div class="form-group">
    <input type="hidden" class="form-control" id="hour_balance" name="hour_balance" value="0">
</div> -->
@if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
    <button id="submit" type="submit" class="btn btn-primary btn-block" onclick="return confirm('Save Data ?')">{{$submit}}</button>
    <a href="#" id="btnDelete" type="button" class="btn btn-danger btn-block" onclick="return confirm('Delete Schedule ?')">Delete Schedule</a>
@endif

