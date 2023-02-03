<div class="container">
    <label>Tanggal</label>
    <div class="input-group">
        <input type="date" class="form-control" id="date" name="tanggal" value="" placeholder="Masukan Tanggal"  required>
    </div>
</div>
<div class="container">
    <label>Grade</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-copyright"></i></span>
        </div>
        <input type="text" class="form-control"  id="standar" name="grade" value="">
    </div>
</div>
<input type="hidden" class="form-control"  id="id" name="id" value="">
<br>
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
