
<div class="form-group">
    <center><label >{{$item->item}}</label></center>
    <input type="hidden" class="form-control" id="id_item" name="id_item" value="{{$item->id}}">
    <input type="hidden" class="form-control" id="item" name="item" value="{{$item->item}}">
    <div class="-grouformp">
    <label  class="col-form-label">Business Unit </label>
      <select class="form-control select2bs4" style="width: 100%;" name="branch" id="branch" required>
              <option selected></option>
              @foreach($dataBranch as $row)
                <option name="branch" value="{{ $row->id }}"  >{{ $row->nama_branch }}</option>
              @endforeach
      </select>                                          
    </div>
    <!-- <label >Location Code</label>
    <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" required> -->
    <label >Location</label>
    <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
  @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
      </div>
  @endif


<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
          <th>No</th>
          <th>Item</th>
          <th>Location Code</th>
          <th>Location</th>
          <th>Business Unit</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0;?>
      @foreach ($item_location as $key => $value)
      <?php $no++;?>
      <tr>
          <td>{{$no}}</td>
          <td>{{ $value['item'] }}</td>
          <td>{{ $value['kode_lokasi'] }}</td>
          <td>{{ $value['nama_lokasi'] }}</td>
          <td>{{ $value['branchdetail'] }}</td>
          <td>
            <!-- <a href="{{route('kategorir.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="edit">
              <i class="fas fa-edit"></i></a>
            </a> -->
            <a href="{{route('hr_ga.item.delete', $value['id'])}}" class="btn btn-danger btn-sm" title="Delete">
              <i class="fas fa-trash"></i></a>
            </a>
          </td>
      </tr>          
      @endforeach  
    </tbody>
    <tfoot>
      <tr>
          <th>No</th>
          <th>Item</th>
          <th>Location Code</th>
          <th>Location</th>
          <th>Business Unit</th>
          <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>




