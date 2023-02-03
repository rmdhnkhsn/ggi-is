<div class="container">
    <label>Tanggal</label>
    <div class="input-group">
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="Masukan Tanggal"  required>
    </div>
</div>
<div class="container">
    <label>Grade</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-copyright"></i></span>
        </div>
        <input type="text" class="form-control"  id="grade" name="grade" value="">
    </div>
</div>
<br>
<input type="hidden" class="form-control"  id="created_by" name="created_by" value="{{auth()->user()->nama}}">
<input type="hidden" class="form-control"  id="branch" name="branch" value="{{auth()->user()->branch}}">
<input type="hidden" class="form-control"  id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}">
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
