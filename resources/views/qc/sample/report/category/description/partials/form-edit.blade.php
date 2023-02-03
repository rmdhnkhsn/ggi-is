<div class="form-group">
    <label for="roll">Description</label>
    <input type="text" class="form-control" id="description" name="description" oninput="this.value = this.value.toUpperCase()" value="{{$data->description}}" placeholder="Insert Item Code">
</div>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="item_id" name="item_id" value="{{$data->item_id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
