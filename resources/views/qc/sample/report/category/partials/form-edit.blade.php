<div class="form-group">
    <label for="roll">Category Code</label>
    <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" oninput="this.value = this.value.toUpperCase()" value="{{$data->kode_kategori}}" placeholder="Insert Category Code">
</div>
<div class="form-group">
    <label for="roll">Category Name</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" oninput="this.value = this.value.toUpperCase()" value="{{$data->keterangan}}" placeholder="Insert Category Name">
</div>
<br>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
