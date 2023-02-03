
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="roll">COLOR</label>
            <input type="text" class="form-control" id="color" name="color" oninput="this.value = this.value.toUpperCase()" value="{{$data->color}}" placeholder="Insert Color">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="roll">PACK</label>
            <input type="number" step="0.01" class="form-control" id="pack" name="pack" value="{{$data->pack}}" placeholder="Insert Pack">
        </div>
    </div>
    <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
    <input type="hidden" class="form-control" id="report_id" name="report_id" value="{{$data->report_id}}" placeholder="Insert Status">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
    </div>
</div>


