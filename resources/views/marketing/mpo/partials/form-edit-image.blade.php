
<div class="form-group">
    <label for="roll">PO Number</label>
    <input type="text" class="form-control" id="po_number" name="po_number" value="{{ $data->po_number }}" required>
</div>
<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="buyer" name="buyer" value="{{ $data->buyer }}" required>
</div>
<div class="form-group">
    <label for="roll">Order Date</label>
    <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $data->order_date }}" required>
</div>
<div class="form-group">
    <label for="roll">MD User</label>
    <input type="text" class="form-control" id="md_user" name="md_user" value="{{ $data->md_user }}" required>
</div>
<div class="form-group">
    <label for="roll">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto" value="">
</div>
<div class="form-group">
    <img src="{{ url('/marketing/img/'.$data->foto) }}" height="120px" alt="No Image" style="margin: 5px 0px 5px 15px">
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

