<input type="hidden" class="form-control" id="id_line" name="id_line" value="" placeholder="Insert ID LINE">
<div class="form-group">
                <label  class="col-form-label">Petugas 1</label>
                <select name="petugas1" id="petugas1" class="form-control" style="width: 95%;" placeholder="Select Petugas2">
                        <option selected></option>        
                        
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
<div class="form-group">
    <input type="text" class="form-control" id="day" name="day" value="{{$haria->day}}" >
    <input type="text" class="form-control" id="hari" name="hari" value="{{$haria->hari}}" >
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
