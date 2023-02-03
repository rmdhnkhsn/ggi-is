<div class="form-group">
    <label>Buyer</label>
    <select class="form-control select2bs4" style="width: 100%;" name="buyer" id="buyer" required>
    <option value="">Select Buyer</option>
    @foreach($buyer as $r)
        <option value="{{  $r->F0101_AN8 }}">{{ $r->F0101_ALPH}}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label for="roll">Customer PO</label>
    <input type="text" class="form-control" id="no_po" name="no_po" value="" placeholder="Insert Customer PO" required>
</div>
<label>Standard</label>
<div class="form-group">
    <select class="custom-select" name="standar" id="standar" required>
        <option>Choose Standard</option>
        <option value="FOB">FOB</option>
        <option value="CMT">CMT</option>
        <option value="CMTP">CMTP</option>
    </select>
</div>
<label>In Hand/Projection</label>
<div class="form-group">
    <select class="custom-select" name="inhand_or_projection" id="inhand_or_projection" required>
        <option value="In Hand">In Hand</option>
        <option value="Projection">Projection</option>
    </select>
</div>
<div class="form-group">
    <label>Order Date</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date" required/>
    </div>
</div>
<div class="form-group">
    <label>ExFact Date</label>
    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate3" name="ex_fact" required/>
    </div>
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{ Auth::user()->nik }}" placeholder="Insert Branch">
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="branch" name="branch" value="{{ Auth::user()->branch }}" placeholder="Insert Branch">
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{ Auth::user()->branchdetail }}" placeholder="Insert Branch Detail">
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
