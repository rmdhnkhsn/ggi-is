<label for="pabrik">Pabrik</label>
<div class="form-group clearfix">
    <div class="row">
        <div class="col-md-3">
            @foreach($dataBranch as $db)
            <div class="icheck-primary">
                <input type="radio" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                <label for="{{$db->branchdetail}}"> {{$db->nama_branch}}</label>
            </div>
            @endforeach
    </div>
</div>
<br>
<div class="row">
    <div class="col-3">
        <div class="form-group">
            <label>Tanggal Awal</label>
            <div class="input-group date" id="tgl_awal" data-target-input="nearest">
                <div class="input-group-append" data-target="#tgl_awal" data-toggle="datetimepicker">
                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input" data-target="#tgl_awal" name="FirstDate" placeholder="Pilih Tanggal" required/>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Tanggal Akhir</label>
            <div class="input-group date" id="tgl_akhir" data-target-input="nearest">
                <div class="input-group-append" data-target="#tgl_akhir" data-toggle="datetimepicker">
                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input" data-target="#tgl_akhir" name="LastDate" placeholder="Pilih Tanggal" required/>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
