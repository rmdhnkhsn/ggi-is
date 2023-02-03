<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>WO Breakdown</label>
            <select class="form-control select2bs4" style="width: 100%;" name="breakdown" id="breakdown">
            <option selected="selected">Pilih WO Breakdown</option>
            @foreach($detail as $key => $value)
                <option {{ $data->breakdown == $value->F560020_DSC1 ? 'selected' : ''}} value="{{  $value->F560020_DSC1 }}">{{$value->F560020_DSC1}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Defect</label>
            <select class="form-control select2bs4" style="width: 100%;" name="defect_id" id="defect_id">
            <option selected="selected">Pilih Defect</option>
            @foreach($defect as $key => $value)
                <option {{ $value->id == $data->defect_id ? 'selected' : ''}} value="{{  $value->id }}">{{ $value->nama_alasan}} ( {{$value->grade}} )</option>
            @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Box</label>
            <select class="form-control select2bs4" style="width: 100%;" name="box_id" id="box_id">
            <option selected="selected">Pilih Box</option>
            @foreach($box as $key => $value)
                <option {{ $value->id == $data->box_id ? 'selected' : ''}} value="{{  $value->id }}">{{$value->nama_box}} ( {{$value->kode_box}} )</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="roll">Qty</label>
            <input type="text" class="form-control" id="quantity" name="qty" value="{{$data->qty}}" placeholder="Masukan Quantity"  required>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Remark</label>
    <textarea class="form-control" rows="3" placeholder="Enter ..." name="remark" id="konten">{{$data->remark}}</textarea>
</div>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
<input type="hidden" class="form-control" id="reject_id" name="reject_id" value="{{$data->reject_id}}">
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
