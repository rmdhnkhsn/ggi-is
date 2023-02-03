<div class="form-group">
    <label for="roll">Buyer Code</label>
    <input type="text" class="form-control" id="kode_buyer" name="kode_buyer" oninput="this.value = this.value.toUpperCase()" value="{{$data->kode_buyer}}" placeholder="Insert Buyer Code">
</div>
<div class="form-group">
    <label for="roll">Buyer Name</label>
    <input type="text" class="form-control" id="nama_buyer" name="nama_buyer" oninput="this.value = this.value.toUpperCase()" value="{{$data->nama_buyer}}" placeholder="Insert Buyer Name">
</div>
<br>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="category_id" name="category_id" value="{{$data->category_id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
