
<div class="card">
  <div class="card-body p-0">
    <table class="table table-sm">
    <tbody>
        <tr>
        <th > UNIQ KEY</th>
          <td colspan="3" >{{$data->F564111C_UKID }}</td>
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
          <td  colspan="3" >{{$data->F4111_DCT}} </td>
        </tr>
        <tr>
          <th>LOT NUM</th>
          <td colspan="3" >{{$data->F4111_LOTN }}</td>
        </tr>
        <tr>
          <th>No Daftar</th>
          <td  colspan="3" >{{$data->F564111C_DSCRP }}</td>
        </tr>
        <tr>
          <th>Jenis Dok</th>
          <td colspan="3">{{$data->F564111C_DSC1 }}</td>
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
          <th>IT INVENTORY</th>
          <th>REMARK</th>
        </tr>

        <tr>
          <th>BUSINNES UNIT</th>
          <td>{{$data->F4111_MCU}}</td>
          <td>{{$data->F564111C_MCU}}</td>
          <td>{{$data->Uji_BRANCH }}</td>
        </tr>
        <tr>
          <th>ITEM NUMBER</th>
          <td>{{$data->F564111C_ITM }}</td>
          <td>{{$data->F4111_ITM }}</td>
          <td>{{$data->Uji_ITM }}</td>
        </tr>
        <tr>
          <th>TR DATE</th>
          <td>OR DATE {{$data->F4111_TRDJ }}</td>
          <td>GL DATE {{$data->F564111C_DGL }}</td>
          <td>{{$data->Uji_Tanggal_Trans_GL }}</td>
        </tr>
        <tr>
          <th>QUANTITY</th>
          <td>{{$data->F4111_TRQT }}</td>
          <td>{{$data->F564111C_TRQT }}</td>
          <td>{{$data->Uji_QTY }}</td>
        </tr>
        <tr>
          <th>UM</th>
          <td>{{$data->F4111_TRUM }}</td>
          <td>{{$data->F564111C_TRUM }}</td>
          <td>{{$data->Uji_UOM }}</td>
        </tr>
        <tr>
          <th colspan="4"></th>
        </tr>
        @if($data->konfirmasi_gudang != null)
        <tr>
          <th>Konfirmasi Gugang</th>
          <td colspan="3">{{$data->konfirmasi_gudang }}</td>
        </tr>
        @endif
        @if($data->dipertimbangkan != null)
        <tr>
          <th>Konfirmasi Dipertimbangkan Audit</th>
          <td colspan="3">{{$data->dipertimbangkan }}</td>
        </tr>
        @endif
        @if($data->konfirmasi_audit != null )
        <tr>
          <th>Konfirmasi Diterima Audit</th>
          <td colspan="3">{{$data->konfirmasi_audit }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@if($data->status_tf == 2)
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-success btn-sm" id="diterima" data-toggle="modal">Diterima</a>
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-warning btn-sm" id="dipertimbangkan" data-toggle="modal">Dipertimbangkan</a>
<br>
<a href="javascript:void(0)" class=" btn btn-block btn-primary btn-sm" id="update" data-toggle="modal">Update JDE</a>
@endif
@if($data->status_tf == 3)
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
        <form action="{{ route('temuantfp.updatet')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F564111C_UKID" name="F564111C_UKID" value="{{$data->F564111C_UKID}}">
              <input type="hidden" class="form-control" id="status_tf" name="status_tf" value="4">
              <input type="hidden" class="form-control" id="dipertimbangkan" name="dipertimbangkan" value="{{$data->dipertimbangkan}}">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi_audit" name="konfirmasi_audit"  required="required"></textarea>
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
        <form action="{{ route('temuantfp.updatet')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F564111C_UKID" name="F564111C_UKID" value="{{$data->F564111C_UKID}}">
              <input type="hidden" class="form-control" id="status_tf" name="status_tf" value="4">
              <input type="hidden" class="form-control" id="dipertimbangkan" name="dipertimbangkan" value="{{$data->dipertimbangkan}}">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi_audit" name="konfirmasi_audit"  required="required"></textarea>
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
        <form action="{{ route('temuantfp.updatep')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F564111C_UKID" name="F564111C_UKID" value="{{$data->F564111C_UKID}}">
              <input type="hidden" class="form-control" id="konfirmasi_audit" name="konfirmasi_audit" value="{{$data->konfirmasi_audit}}">
              <input type="hidden" class="form-control" id="status_tf" name="status_tf" value="3">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="dipertimbangkan" name="dipertimbangkan"  required="required"></textarea>
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
        <form action="{{ route('temuantfp.updatej')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <input type="hidden" class="form-control" id="F564111C_UKID" name="F564111C_UKID" value="{{$data->F564111C_UKID}}">
              <input type="hidden" class="form-control" id="dipertimbangkan" name="dipertimbangkan" value="{{$data->dipertimbangkan}}">
              <input type="hidden" class="form-control" id="status_tf" name="status_tf" value="5">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="roll">Deskripsi</label>
                  <textarea class="form-control" rows="3" id="konfirmasi_audit" name="konfirmasi_audit"  required="required"></textarea>
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

