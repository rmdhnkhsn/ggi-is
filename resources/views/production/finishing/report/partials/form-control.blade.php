<label for="pabrik"><b>Branch</b></label>
<div class="form-group clearfix">
    <div class="row">
        <div class="col-md-3">
            @foreach($dataBranch as $db)
            <div class="icheck-primary">
                <input type="radio" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                <label for="{{$db->branchdetail}}"><b>{{$db->nama_branch}}</b></label>
            </div>
            @endforeach
        </div>
    </div>
</div> 
<label for="pabrik"><b>PROSES FINISHING</b></label>
<div class="form-group clearfix">
    <div class="row">
        <div class="col-md-3">
            <div class="icheck-primary">
                <input type="radio" name="status_proses" id="FOLDING" value="Folding" required>
                <label for="FOLDING"><b>FOLDING</b></label>
            </div>
            <div class="icheck-primary">
                <input type="radio" name="status_proses" id="NEEDLE_DETECTOR" value="Needle Detector" required>
                <label for="NEEDLE_DETECTOR"><b>NEEDLE DETECTOR</b></label>
            </div>
            <div class="icheck-primary">
                <input type="radio" name="status_proses" id="FREEMETAL" value="Free Metal" required>
                <label for="FREEMETAL"><b>FREEMETAL</b></label>
            </div>
            <div class="icheck-primary">
                <input type="radio" name="status_proses" id="OTHER" value="other" required>
                <label for="OTHER"><b>OTHER</b></label>
            </div>
        </div>
    </div>
</div>
<div class="form-group" style="padding-right:10px">
    <label><b>select month</b></label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" id="tanggal" required/>
    </div>
</div>
<div class="form-group">
    <div>
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> {{$submit}}</button>
    </div>
</div>