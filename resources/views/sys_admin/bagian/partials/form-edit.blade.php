<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" required>
<div class="form-group">
    <label for="roll">Division Code</label>
    <input type="text" class="form-control" id="kode_bagian" name="kode_bagian" value="{{$data->kode_bagian}}" required>
</div>
<div class="form-group">
    <label for="branch">Division Name</label>
    <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" value="{{$data->nama_bagian}}" required>
</div>
<div class="form-group">
    <label for="branch">Value</label>
    <input type="number" class="form-control" id="nilai" name="nilai" value="{{$data->nilai}}">
</div>
<div class="form-group">
    <label for="branch">Color</label>
    <input type="number" class="form-control" id="warna" name="warna" value="{{$data->warna}}">
</div>
<div class="form-group">
    <label for="branch">Issues</label>
    <input type="number" class="form-control" id="issues" name="issues" value="{{$data->issues}}">
</div>
<div class="form-group">
    <label for="branch">Good</label>
    <input type="number" class="form-control" id="good" name="good" value="{{$data->good}}">
</div>
<div class="form-group">
    <label for="branch">Poor</label>
    <input type="number" class="form-control" id="poor" name="poor" value="{{$data->poor}}">
</div>
<div class="form-group">
    <label for="branch">Critical</label>
    <input type="number" class="form-control" id="critical" name="critical" value="{{$data->critical}}">
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
