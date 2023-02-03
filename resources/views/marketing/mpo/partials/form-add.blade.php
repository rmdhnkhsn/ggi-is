<input type="hidden" class="form-control" id="po_id" name="po_id" value="{{$data->id}}">
<div class="form-group">
    <label for="roll">PO Number</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->po_number}}" readonly>
</div>
<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->buyer}}" readonly>
</div>
<div class="form-group">
    <label for="roll">Style Number</label>
    <input type="text" class="form-control" id="style_number" name="style_number" value="" placeholder="Insert Style Number" required>
</div>
<div class="form-group">
    <label for="roll">Article</label>
    <input type="text" class="form-control" id="article" name="article" value="" placeholder="Insert Article" required>
</div>
<div class="form-group">
    <label for="roll">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="" placeholder="Insert Product Name" required>
</div>
<div class="form-group">
    <label for="roll">Total Quality</label>
    <input type="text" class="form-control" id="total_qty" name="total_qty" value="" placeholder="Insert Total Quality" required>
</div>
<div class="form-group">
    <label for="roll">OR Number</label>
    <input type="text" class="form-control" id="or_number" name="or_number" value="" placeholder="Insert OR Number" required>
</div>
<div class="form-group">
    <label for="roll">EX Fact</label>
    <input type="date" class="form-control" id="ex_fact" name="ex_fact" value="" placeholder="Insert EX Fact" required>
</div>
<div class="form-group">
    <label for="roll">FOB</label>
    <input type="text" class="form-control" id="fob" name="fob" value="" placeholder="Insert FOB" required>
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

