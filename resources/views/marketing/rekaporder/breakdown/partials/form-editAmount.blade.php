<label>Total Amount</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
    </div>
    <input type="text" class="form-control" value="{{$detail->total_amount}}" disabled>
</div>
<br>
<label>Total Size</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
    </div>
    <input type="text" class="form-control"  id="total_size" name="total_size" value="{{$jumlah['total_size']}}">
</div>
<br>
<label>Detail</label>
<div class="form-group">
    <select class="custom-select" name="kali" id="kali">
        <option></option>
        <option value="{{$detail->fob}}">FOB ({{$detail->fob}})</option>
        <option value="{{$detail->cmt}}">CMT ({{$detail->cmt}})</option>
        <option value="{{$detail->cmtp}}">CMTP ({{$detail->cmtp}})</option>
    </select>
</div>
<button type="submit" class="btn btn-primary btn-block">Save</button>