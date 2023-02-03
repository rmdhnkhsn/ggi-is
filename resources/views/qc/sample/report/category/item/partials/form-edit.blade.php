<div class="form-group">
    <label for="roll">Item Code</label>
    <input type="text" class="form-control" id="kode_item" name="kode_item" oninput="this.value = this.value.toUpperCase()" value="{{$data->kode_item}}" placeholder="Insert Item Code">
</div>
<div class="form-group">
    <label for="roll">Item Name</label>
    <input type="text" class="form-control" id="nama_item" name="nama_item" oninput="this.value = this.value.toUpperCase()" value="{{$data->nama_item}}" placeholder="Insert Item Name">
</div>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="buyer_id" name="buyer_id" value="{{$data->buyer_id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
