
<div class="card">
  <div class="card-body p-0">
    <table class="table table-sm">
      <tbody>
        <tr>
        <th > UNIQ KEY</th>
          <td colspan="3" >{{$data->F564111H_UKID }}</td>
        </tr>
        <tr>
          <th>ITEM NUMBER</th>
          <td colspan="3">{{$data->F4111_ITM }}</td>
        </tr>
        <tr>
          <th>PO</th>
          <td colspan="3">{{$data->F4111_DOCO }}</td>
        </tr> 
        <tr>
          <th>UNIT PRICE</th>
          <td colspan="3">{{$data->F4111_UNCS }}</td>
        </tr> 
        <tr>
          <th>TOTAL PRICE</th>
          <td colspan="3">{{$data->F4111_PAID }}</td>
        </tr>
        <tr>
          <th>BUSINNES UNIT</th>
          <td colspan="3" >{{$data->F4111_MCU}}</td>
        </tr>
        <tr>
          <th>DC TY</th>
          <td  colspan="3" >{{$data->F564111H_DCT}} </td>
        </tr>
        <tr>
          <th>LOT NUM</th>
          <td colspan="3" >{{$data->F564111H_LOTN }}</td>
        </tr>
        <tr>
          <th>No Daftar</th>
          <td  colspan="3" >{{$data->F564111H_DSCP2 }}</td>
        </tr>
        <tr>
          <th>Jenis Dok</th>
          <td colspan="3">{{$data->F564111H_DSC1 }}</td>
        </tr>
        <tr>
          <th>GLPT</th>
          <td colspan="3" >{{$data->F4111_GLPT }}</td>
        </tr>
        <tr>
          <th>USER</th>
          <td colspan="3" >{{$data->F4111_USER }}</td>
        </tr>
        <tr>
        <th colspan="4"></th>
        </tr>
        <tr>
          <th></th>
          <th>Ledger</th>
          <th>Pengeluaran</th>
          <th>REMARK</th>
        </tr>

        <tr>
          <th>BUSINNES UNIT</th>
          <td>{{$data->F4111_MCU}}</td>
          <td>{{$data->F564111H_MCU}}</td>
          <td>{{$uji_branch}}</td>
        </tr>
        <tr>
          <th>ITEM NUMBER</th>
          <td>{{$data->F4111_ITM }}</td>
          <td>{{$data->F564111H_ITM }}</td>
          <td>{{$data->Uji_ITM }}</td>
        </tr>
        @if($data['F564111H_DCT']!='IM')
        <tr>
          <th>TR DATE</th>
          <td>OR DATE {{$data->F4111_TRDJ }}</td>
          <td>GL DATE {{$data->F564111H_DGL }}</td>
          <td>{{$data->Uji_TGL_Trans_GL }}</td>
        </tr>
        @endif
        <tr>
          <th>QUANTITY</th>
          <td>{{$data->F4111_TRQT }}</td>
          <td>{{$data->F564111H_TRQT }}</td>
          <td>{{$Uji_QTY }}</td>
        </tr>
        <tr>
          <th>UM</th>
          <td>{{$data->F4111_TRUM }}</td>
          <td>{{$data->F564111H_TRUM }}</td>
          <td>{{$data->Uji_UOM }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
 @if((auth()->user()->role == 'SYS_ADMIN') OR($user == $data->F4111_USER))
  @if(($data->Uji_ITM == 'FALSE') OR ($Uji_QTY == 'FALSE') OR ($data->Uji_UOM == 'FALSE') OR ($uji_branch == 'FALSE')
  OR ($data->Uji_TGL_Trans_GL == 'FALSE'))
  <form action="{{route ('temuantf.store')}}" method="post" enctype="multipart/form-data">
    @csrf 
        <div class="form-group">
            <label >Konfirmasi Gudang</label>
            <textarea class="form-control" rows="3" id="konfirmasi_gudang" name="konfirmasi_gudang"  required="required"></textarea>
        </div>
        <input type="hidden" class="form-control" id="status_tf" name="status_tf" value="2" readonly>
        <input type="hidden" class="form-control" id="F564111H_UKID" name="F564111H_UKID" value="{{$data->F564111H_UKID }}">
        <input type="hidden" class="form-control" id="F564111H_ITM" name="F564111H_ITM" value="{{$data->F564111H_ITM }}">
        <input type="hidden" class="form-control" id="F4111_DOCO" name="F4111_DOCO" value="{{$data->F4111_DOCO }}">
        <input type="hidden" class="form-control" id="F4111_UNCS" name="F4111_UNCS" value="{{$data->F4111_UNCS }}">
        <input type="hidden" class="form-control" id="F4111_PAID" name="F4111_PAID" value="{{$data->F4111_PAID }}">
        <input type="hidden" class="form-control" id="F564111H_MCU" name="F564111H_MCU" value="{{$data->F564111H_MCU }}">
        <input type="hidden" class="form-control" id="F564111H_DCT" name="F564111H_DCT" value="{{$data->F564111H_DCT }}">
        <input type="hidden" class="form-control" id="F564111H_TRDJ" name="F564111H_TRDJ" value="{{$data->F564111H_TRDJ }}">
        <input type="hidden" class="form-control" id="F564111H_DGL" name="F564111H_DGL" value="{{$data->F564111H_DGL }}">
        <input type="hidden" class="form-control" id="F564111H_LOTN" name="F564111H_LOTN" value="{{$data->F564111H_LOTN }}">
        <input type="hidden" class="form-control" id="F564111H_TRQT" name="F564111H_TRQT" value="{{$data->F564111H_TRQT }}">
        <input type="hidden" class="form-control" id="F564111H_TRUM" name="F564111H_TRUM" value="{{$data->F564111H_TRUM }}">
        <input type="hidden" class="form-control" id="F564111H_DSCP2" name="F564111H_DSCP2" value="{{$data->F564111H_DSCP2 }}">
        <input type="hidden" class="form-control" id="F564111H_DSC1" name="F564111H_DSC1" value="{{$data->F564111H_DSC1 }}">
        <input type="hidden" class="form-control" id="F4111_DCT" name="F4111_DCT" value="{{$data->F4111_DCT }}">
        <input type="hidden" class="form-control" id="F4111_LOTN" name="F4111_LOTN" value="{{$data->F4111_LOTN }}">
        <input type="hidden" class="form-control" id="F4111_ITM" name="F4111_ITM" value="{{$data->F4111_ITM }}">
        <input type="hidden" class="form-control" id="F4111_MCU" name="F4111_MCU" value="{{$data->F4111_MCU }}">
        <input type="hidden" class="form-control" id="F4111_TRDJ" name="F4111_TRDJ" value="{{$data->F4111_TRDJ }}">
        <input type="hidden" class="form-control" id="F4111_DGL" name="F4111_DGL" value="{{$data->F4111_DGL }}">
        <input type="hidden" class="form-control" id="F4111_TRQT" name="F4111_TRQT" value="{{$data->F4111_TRQT }}">
        <input type="hidden" class="form-control" id="F4111_TRUM" name="F4111_TRUM" value="{{$data->F4111_TRUM }}">
        <input type="hidden" class="form-control" id="F4111_GLPT" name="F4111_GLPT" value="{{$data->F4111_GLPT }}">
        <input type="hidden" class="form-control" id="F4111_USER" name="F4111_USER" value="{{$data->F4111_USER }}">
        <input type="hidden" class="form-control" id="Uji_ITM" name="Uji_ITM" value="{{$data->Uji_ITM }}">
        <input type="hidden" class="form-control" id="Uji_QTY" name="Uji_QTY" value="{{$Uji_QTY }}">
        <input type="hidden" class="form-control" id="Uji_UOM" name="Uji_UOM" value="{{$data->Uji_UOM }}">
        <input type="hidden" class="form-control" id="Uji_BRANCH" name="Uji_BRANCH" value="{{$uji_branch}}">
        <input type="hidden" class="form-control" id="Uji_Tanggal_Trans_GL" name="Uji_Tanggal_Trans_GL" value="{{$data->Uji_TGL_Trans_GL}}">
        <button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
    </form>
  @endif
@endif
