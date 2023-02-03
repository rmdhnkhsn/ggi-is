@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2 col-lg-3" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.3);">
            <button type="button" class="close" data-dismiss="alert">×</button>   
            <center> 
            <strong>{{ $message }}</strong>
            </center>
        </div>
        @endif
        <div class="row">
          <div class="col-lg-2 col-3">
            <a href="{{route('line.take', $data->target_id)}}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-home"></i> index</a>
          </div>
          <div class="col-lg-2 col-3">
            <button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus"></i> Tambah</button>
          </div>
        </div>
        <br>
        @include('qc.reject_garment.line.partials.form-modalDetail')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Line Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>CTY|Color|Size</th>
                            <th>Reject</th>
                            <th>Qty</th>
                            <th>Remark</th>
                            <th>Box</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach($data->reject_detail as $key => $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->breakdown}}</td>
                      @foreach($defect as $key2 => $value2)
                      @if($value2->id == $value->defect_id)
                      <td>{{$value2->nama_alasan}} ( {{$value2->grade}} )</td>
                      @endif
                      @endforeach
                      <td>{{$value->qty}}</td>
                      <td>{{$value->remark}}</td>
                      @foreach($box as $key3 => $value3)
                      @if($value3->id == $value->box_id)
                      <td>{{$value3->nama_box}} ( {{$value3->kode_box}} )</td>
                      @endif
                      @endforeach
                      <td>
                        <a href="{{route('detail.edit', $value->id)}}" class="btn btn-warning btn-sm editProduct" title="Edit"><i class="fas fa-edit"></i></a>
                        @if($value->qty == 0)
                        <a href="{{route('detail.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Hapus"><i class="far fa-trash-alt"></i></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
@include('qc.reject_garment.layouts.footer')
<script type="text/javascript">

$(document).ready(function() {
  var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "desc" ]],
    });
} );

$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>