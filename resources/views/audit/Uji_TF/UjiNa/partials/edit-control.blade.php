
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

@if($data->status_na == 2)
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-success btn-sm" id="diterima" data-toggle="modal">Diterima</a>
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-warning btn-sm" id="dipertimbangkan" data-toggle="modal">Dipertimbangkan</a>
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-primary btn-sm" id="update" data-toggle="modal">Update JDE</a>
@endif
@if($data->status_na == 3)
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-success btn-sm" id="diterima2" data-toggle="modal">Diterima</a>
@endif

<div class="modal fade" id="Status_diterima" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
      </div>
        <div class="modal-body">
        <form action="{{ route('temuanna.updatet')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}">
              <input type="hidden" class="form-control" id="status_na" name="status_na" value="4">
              <input type="hidden" class="form-control" id="konfirmasi3" name="konfirmasi3" value="{{$data->konfirmasi3}}">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi2" name="konfirmasi2"  required="required"></textarea>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class=" btn btn-success btn-block">Diterima</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="Status_diterima2" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
      </div>
        <div class="modal-body">
        <form action="{{ route('temuanna.updatet')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}">
              <input type="hidden" class="form-control" id="status_na" name="status_na" value="4">
              <input type="hidden" class="form-control" id="konfirmasi3" name="konfirmasi3" value="{{$data->konfirmasi3}}">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi2" name="konfirmasi2"  required="required"></textarea>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class=" btn btn-success btn-block">Diterima</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="Status_dipertimbangkan" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titledone"></h4>
      </div>
        <div class="modal-body">
        <form action="{{ route('temuanna.updatep')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}">
              <input type="hidden" class="form-control" id="konfirmasi2" name="konfirmasi2" value="{{$data->konfirmasi2}}">
              <input type="hidden" class="form-control" id="status_na" name="status_na" value="3">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi3" name="konfirmasi3"  required="required"></textarea>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class=" btn btn-warning btn-block">Dipertimbangkan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="update_jde" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titledone"></h4>
      </div>
        <div class="modal-body">
        <form action="{{ route('temuanna.updatej')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F4111_UKID" name="F4111_UKID" value="{{$data->F4111_UKID}}">
              <input type="hidden" class="form-control" id="konfirmasi3" name="konfirmasi3" value="{{$data->konfirmasi3}}">
              <input type="hidden" class="form-control" id="status_na" name="status_na" value="5">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi2" name="konfirmasi2"  required="required"></textarea>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class=" btn btn-primary btn-block">Update JDE</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
