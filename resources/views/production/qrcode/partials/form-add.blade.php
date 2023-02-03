<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">

<div class="form-group">
    <label for="roll">Style</label>
    <input type="text" class="form-control" id="po_number" name="po_number" value="" placeholder="Insert PO Number" required>
</div>
<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="buyer" name="buyer" value="" placeholder="Insert Buyer" required>
</div>
<div class="form-group">
    <label for="roll">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto" value="" placeholder="">
</div>
<div class="form-group">
    <label for="roll"> PDF smv</label>
    <input type="file" class="form-control" id="smv" name="smv" value="" placeholder="">
</div>
<div class="form-group">
    <label for="roll"> PDF ppm</label>
    <input type="file" class="form-control" id="ppm" name="ppm" value="" placeholder="">
</div>
<div class="form-group">
    <label for="roll"> PDF work</label>
    <input type="file" class="form-control" id="work" name="work" value="" placeholder="">
</div>
<div class="form-group">
    <label for="roll"> PDF trimcard</label>
    <input type="file" class="form-control" id="trimcard" name="trimcard" value="" placeholder="">
</div>
<div class="form-group">
    <label for="roll"> PDF techspech</label>
    <input type="file" class="form-control" id="techspech" name="techspech" value="" placeholder="">
</div>


<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

