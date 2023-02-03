
<div class="form-group">
            <label  class="col-form-label">Satgas</label>
            <select name="nik" id="nik" class="form-control">
                    <option selected>Pilih Satgas</option>
                    @foreach($user as $row)
                      <option name="nik" value="{{ $row->nik }}">{{ $row->nama }}</option>
                    @endforeach
             </select>                                          
</div>
<div>
    <label for="roll">Kuota Like</label>
    <input type="text" class="form-control" id="kuota_like" name="kuota_like" value="" placeholder="Kuota Like">
</div>
<div class="form-group">
    <label for="roll">Kuota Dislike</label>
    <input type="text" class="form-control" id="kuota_dislike" name="kuota_dislike" value="" placeholder="Kuota DisLike">
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
