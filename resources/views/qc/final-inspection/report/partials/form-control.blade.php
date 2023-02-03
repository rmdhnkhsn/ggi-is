<div class="form-group">
    <label><b>Work Date</b></label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" id="tanggal" placeholder="Pilih Tanggal" required/>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
