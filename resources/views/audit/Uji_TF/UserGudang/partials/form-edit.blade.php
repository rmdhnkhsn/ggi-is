<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
<div class="form-group">
    <label >Nik</label>
    <input type="text" class="form-control" id="nik" name="nik" value="{{$data->nik}}" readonly>
</div>
<div class="form-group">
    <label >Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" readonly>
</div>
<div class="form-group">
    <label >Username JDE</label>
    <input type="text" class="form-control" id="username_jde" name="username_jde" value="{{$data->username_jde}}">
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>





