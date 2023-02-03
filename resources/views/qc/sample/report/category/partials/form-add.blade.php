<div class="form-group">
    <label for="roll">Category Code</label>
    <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" oninput="this.value = this.value.toUpperCase()" value="" placeholder="Insert Category Code">
</div>
<div class="form-group">
    <label for="roll">Category Name</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" oninput="this.value = this.value.toUpperCase()" value="" placeholder="Insert Category Name">
</div>
<br>
<input type="hidden" class="form-control" id="branch" name="branch" value="{{auth()->user()->branch}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
