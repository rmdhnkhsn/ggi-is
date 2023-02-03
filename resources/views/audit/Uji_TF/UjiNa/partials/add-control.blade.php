<div class="card">
  <div class="card-body p-0">
    <table class="table table-sm">
      <tbody>
        <tr>
        <th > UNIQ KEY</th>
        <th>:</th>
          <td>{{$data->F4111_UKID}}</td>
        </tr>
        <tr>
          <th>ITEM NUMBER</th>
          <th>:</th>
          <td>{{$data->F4111_ITM }}</td>
        </tr>
        <tr>
          <th>PO</th>
          <th>:</th>
          <td colspan="3">{{$data->F4111_DOCO }}</td>
        </tr> 
        <tr>
          <th>UNIT PRICE</th>
          <th>:</th>
          <td colspan="3">{{$data->F4111_UNCS }}</td>
        </tr> 
        <tr>
          <th>TOTAL PRICE</th>
          <th>:</th>
          <td colspan="3">{{$data->F4111_PAID }}</td>
        </tr>
        <tr>
          <th>BUSINNES UNIT</th>
          <th>:</th>
          <td>{{$data->F4111_MCU}}</td>
        </tr>
        <tr>
          <th>DC TY</th>
          <th>:</th>
          <td>{{$data->F4111_DCT}} </td>
        </tr>
        <tr>
          <th>TR DATE</th>
          <th>:</th>
          <td>{{$data->F4111_TRDJ }}</td>
        </tr>
        <tr>
          <th>G-L DATE</th>
          <th>:</th>
          <td>{{$data->F4111_DGL }}</td>
        </tr>
        <tr>
          <th>LOT NUM</th>
          <th>:</th>
          <td>{{$data->F4111_LOTN }}</td>
        </tr>
        <tr>
          <th>QUANTITY</th>
          <th>:</th>
          <td>{{$data->F4111_TRQT }}</td>
        </tr>
        <tr>
          <th>UM</th>
          <th>:</th>
          <td>{{$data->F4111_TRUM }}</td>
        </tr>
        <tr>
          <th>GLPT</th>
          <th>:</th>
          <td>{{$data->F4111_GLPT }}</td>
        </tr>
        <tr>
          <th>USER</th>
          <th>:</th>
          <td>{{$data->F4111_USER }}</td>
        </tr>
        @if($data->konfirmasi1 != null)
        <tr>
          <th>Konfirmasi Gudang</th>
          <th>:</th>
          <td>{{$data->konfirmasi1 }}</td>
        </tr>
        @endif
        @if($data->konfirmasi3 != null)
        <tr>
          <th>Konfirmasi Audit Dipertimbangkan</th>
          <th>:</th>
          <td>{{$data->konfirmasi3 }}</td>
        </tr>
        @endif
        @if($data->konfirmasi2 != null)
        <tr>
          <th>Konfirmasi Audit Diterima</th>
          <th>:</th>
          <td>{{$data->konfirmasi2 }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<br>

@if((auth()->user()->role == 'SYS_ADMIN') OR($user == $data->F4111_USER))
<input type="hidden" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}" readonly>
<div class="form-group">
    <label >Konfirmasi Gudang</label>
    <textarea class="form-control" rows="3" id="konfirmasi1" name="konfirmasi1"  required="required"></textarea>
</div>
<input type="hidden" class="form-control" id="status_na" name="status_na" value="2" readonly>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
@endif