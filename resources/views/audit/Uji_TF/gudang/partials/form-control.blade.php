
<div class="row">
    <div class="col-md-3">
        <div class="form-group clearfix">
            <label for="pabrik">BUSINESS UNIT</label>
            @foreach($dataBranch as $db)
            <div class="icheck-primary">
                <input type="radio" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                <label for="{{$db->branchdetail}}"> {{$db->nama_branch}}({{$db->kode_jde}})</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group clearfix">
            <label for="pabrik">User</label>
            @foreach($user as $db)
            <div class="icheck-primary">
                <input type="radio" name="user" id="{{$db->username_jde}}" value="{{$db->username_jde}}" required>
                <label for="{{$db->username_jde}}"> {{$db->username_jde}}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>


<br>
<div class="row">
    <div class="col-md-6">
        <label>First Date </label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_awal" placeholder="Pilih Tanggal" required/>
        </div>
    </div>
    <div class="col-md-6">
        <label>Last Date</label>
        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tgl_akhir" placeholder="Pilih Tanggal" required/>
        </div>
    </div>
</div>
<br>

<button type="submit" href="javascript:void(0)" id="test1" onclick="test()" class="btn btn-primary btn-block">{{$submit}}</button>
