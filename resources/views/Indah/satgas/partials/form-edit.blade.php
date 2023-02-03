
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
<input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik}}">
<div class="form-group">
    <label >Name</label>
<input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" readonly>
</div>
<div class="form-group">
    <label  class="col-form-label">Position</label>
    <select name="jabatan" id="jabatan" class="form-control" required="required">
    <option selected>{{$data->jabatan}}</option>
            <option name="jabatan" value="Kehormatan"  >Kehormatan</option>
            <option name="jabatan" value="Ketua"  >Ketua</option>
            <option name="jabatan" value="Wakil Ketua"  >Wakil Ketua</option>
            <option name="jabatan" value="Penasehat"  >Penasehat</option>
            <option name="jabatan" value="Pengawas"  >Pengawas</option>
            <option name="jabatan" value="Pelaksana Piket"  >Pelaksana Piket</option>
                    
    </select>                                          
</div>
<div class="form-group">
    <label >Quota ✔</label>
    <input type="number" class="form-control" id="kuota_like" name="kuota_like" value="{{$data->kuota_like}}" placeholder="Quota">
</div>
<div class="form-group">
    <label >Quota ❌</label>
    <input type="number" class="form-control" id="kuota_dislike" name="kuota_dislike" value="{{$data->kuota_dislike}}" placeholder="Quota">
</div>
<div class="form-group">
  <label  class="col-form-label">Status</label>
  <select name="status" id="status" class="form-control" required="required">   
    @foreach($status as $key => $value)
    <option {{ $data->status == $key ? 'selected' : ''}} value="{{ $key }}">{{$value}}</option>
    @endforeach
  </select>                                          
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
