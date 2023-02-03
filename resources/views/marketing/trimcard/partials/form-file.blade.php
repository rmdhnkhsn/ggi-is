<label>Note</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-clipboard"></i></span>
    </div>
    <input type="text" class="form-control"  id="note" name="note" value=""  placeholder="Insert Note">
</div><br>
<div class="form-group">
    <label for="po">File</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="file" required>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
</div>  

<input type="hidden" class="form-control" id="tc_id" name="tc_id" value="{{$data->id}}">
<input type="hidden" class="form-control" id="nik" name="nik" value="{{auth()->user()->nik}}">
<input type="hidden" class="form-control" id="nama" name="nama" value="{{auth()->user()->nama}}">
<input type="hidden" class="form-control" id="branch" name="branch" value="{{auth()->user()->branch}}">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}">

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
