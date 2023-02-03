<input type="hidden" class="form-control" id="id" name="id" value="" placeholder="Insert id" required>
<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="name" name="buyer" value="" placeholder="Insert Buyer" required>
</div>
<div class="form-group">
    <label for="roll">Customer PO</label>
    <input type="text" class="form-control" id="detail" name="no_po" value="" placeholder="Insert Customer PO" required>
</div>
<div class="form-group">
    <label for="roll">Standard</label>
    <input type="text" class="form-control" id="standard" name="standar" value="" placeholder="FOB / CMT / CMTP" required>
</div>
<div class="form-group">
    <label for="roll">In Hand / Projection</label>
    <input type="text" class="form-control" id="inhand" name="inhand_or_projection" value="" required>
</div>
<div class="form-group">
    <label>Order Date</label>
    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="date" name="date" required/>
    </div>
</div>
<div class="form-group">
    <label>ExFact Date</label>
    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate4" id="ex_fact" name="ex_fact" required/>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
