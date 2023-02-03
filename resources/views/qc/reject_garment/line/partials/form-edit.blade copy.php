<input type="hidden" class="form-control" id="id" name="id" value="" placeholder="Masukan Tanggal"  required>
<div class="form-group">
    <label for="roll">Tanggal</label>
    <input type="date" class="form-control" id="date" name="tanggal" value="" placeholder="Masukan Tanggal"  required>
</div>
<input type="hidden" class="form-control" id="created_by" name="created_by" value="{{auth()->user()->nama}}">
<input type="hidden" class="form-control" id="id_line" name="id_line" value="{{$request['id_line']}}">
<input type="hidden" class="form-control" id="no_wo" name="no_wo" value="{{$request['no_wo']}}">
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
