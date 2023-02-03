
<div class="form-group">
  <label  class="col-form-label">Name</label>
  <select class="form-control select2bs4" style="width: 100%;" name="nik" id="nik">
          <option selected></option>
          @foreach($user as $row)
            <option name="nik" value="{{ $row->nik }}"  >{{ $row['nik'] }} || {{ $row['nama'] }}</option>
          @endforeach
  </select>                                          
</div>
<div class="form-group">
  <label  class="col-form-label">Position</label>
  <select name="jabatan" id="jabatan" class="form-control" required="required">
    <option name="jabatan" value="Kehormatan"  >Kehormatan</option>
    <option name="jabatan" value="Ketua"  >Ketua</option>
    <option name="jabatan" value="Wakil Ketua"  >Wakil Ketua</option>
    <option name="jabatan" value="Penasehat"  >Penasehat</option>
    <option name="jabatan" value="Pengawas"  >Pengawas</option>
    <option name="jabatan" value="Pelaksana Piket"  >Pelaksana Piket</option>      
  </select>                                          
</div>
<div>
    <label for="roll">Quota ✔</label>
    <input type="number" class="form-control" id="kuota_like" name="kuota_like" value="" placeholder="Quota">
</div>
<div class="form-group">
    <label for="roll">Quota ❌</label>
    <input type="number" class="form-control" id="kuota_dislike" name="kuota_dislike" value="" placeholder="Quota">
</div>

<div class="form-group">
  <label  class="col-form-label">Status</label>
  <select name="status" id="status" class="form-control" required="required">
    <option></option>    
    @foreach($status as $key => $value)
    <option name="status" value="{{$key}}"  >{{$value}}</option>    
    @endforeach
  </select>                                          
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
   @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
    @endif