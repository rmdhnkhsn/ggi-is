<label for="pabrik"><b>Branch</b></label>
<div class="form-group clearfix">
    <div class="row">
        <div class="col-md-3">
            @foreach($dataBranch as $db)
            <div class="icheck-primary">
                <input type="radio" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                <label for="{{$db->branchdetail}}"> <b>{{$db->nama_branch}}</b></label>
            </div>
            @endforeach
    </div>
</div>
<br>
<div class="form-group" style="padding-right:10px">
    <label><b>Choose Year</b></label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tahun" id="tahun" required/>
    </div>
</div>
<div class="form-group">
    <div>
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> {{$submit}}</button>
    </div>
</div>