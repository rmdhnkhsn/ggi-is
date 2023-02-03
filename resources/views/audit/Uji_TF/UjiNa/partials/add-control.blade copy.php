<input type="hidden" class="form-control" id="branch" name="branch" value="{{$branch}}" readonly>
<input type="hidden" class="form-control" id="gl_class" name="gl_class" value="{{$gl_class}}" readonly>
<input type="hidden" class="form-control" id="dc_ty" name="dc_ty" value="{{$dc_ty}}" readonly>
<input type="hidden" class="form-control" id="tgl_awal" name="tgl_awal" value="{{$tgl_awal}}" readonly>
<input type="hidden" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{$tgl_akhir}}" readonly>
<div class="form-group">
    <label >UNIQ KEY</label>
    <input type="text" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}" readonly>
</div>
<div class="form-group">
    <label >ITEM NUMBER </label>
    <input type="text" class="form-control" id="F4111_ITM" name="F4111_ITM" value="{{$data->F4111_ITM}}" readonly>
</div>
<div class="form-group">
    <label >BUSINNES UNIT</label>
    <input type="text" class="form-control" id="F4111_MCU" name="F4111_MCU" value="{{$data->F4111_MCU}}" readonly>
</div>
<div class="form-group">
    <label >DC TY</label>
    <input type="text" class="form-control" id="F4111_DCT" name="F4111_DCT" value="{{$data->F4111_DCT}}" readonly>
</div>
<div class="form-group">
    <label >TR DATE</label>
    <input type="text" class="form-control" id="F4111_TRDJ" name="F4111_TRDJ" value="{{$data->F4111_TRDJ}}" readonly>
</div>
<div class="form-group">
    <label >G-L DATE </label>
    <input type="text" class="form-control" id="F4111_DGL" name="F4111_DGL" value="{{$data->F4111_DGL}}" readonly>
</div>
<div class="form-group">
    <label >LOT NUM</label>
    <input type="text" class="form-control" id="F4111_LOTN" name="F4111_LOTN" value="{{$data->F4111_LOTN}}" readonly>
</div>
<div class="form-group">
    <label >QUANTITY</label>
    <input type="text" class="form-control" id="F4111_TRQT" name="F4111_TRQT" value="{{$data->F4111_TRQT}}" readonly>
</div>
<div class="form-group">
    <label >UM</label>
    <input type="text" class="form-control" id="F4111_TRUM" name="F4111_TRUM" value="{{$data->F4111_TRUM}}" readonly>
</div>
<div class="form-group">
    <label >GLPT</label>
    <input type="text" class="form-control" id="F4111_GLPT" name="F4111_GLPT" value="{{$data->F4111_GLPT}}" readonly>
</div>
<div class="form-group">
    <label >USER</label>
    <input type="text" class="form-control" id="F4111_USER" name="F4111_USER" value="{{$data->F4111_USER}}" readonly>
</div>
<div class="form-group">
    <label >Konfirmasi Gudang</label>
    <textarea class="form-control" rows="3" id="konfirmasi1" name="konfirmasi1"  required="required"></textarea>
</div>
<input type="hidden" class="form-control" id="status_na" name="status_na" value="2" readonly>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>