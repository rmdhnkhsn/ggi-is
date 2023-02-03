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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Line [ {{$request['no_wo']}} ]</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>NO</th>
                            <th>Line</th>
                            <th>Tanggal Pengerjaan 1</th>
                            <th>Tanggal Pengerjaan 2</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;?>
                    @foreach($data as $key => $value)
                    <tr>
                      <td scope="row">{{ $no }}</td>
                      @foreach($line as $key2 => $value2)
                      @if($value2->id == $value->id_line)
                      <td>{{$value2->string2}}</td>
                      @endif
                      @endforeach
                      <td>{{$value->tgl_pengerjaan}}</td>
                      <td>{{$value->tgl_pengerjaan2}}</td>
                      <td>
                        <a href="{{route('line.take', $value->id)}}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr>
                    <?php $no++ ;?>
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
        "order": [[ 0, "asc" ]],
    });
} );

$('body').on('click', '.editProduct', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('edit/' + id , function (data) {
      $('#modal-edit').modal('show');
      $('#id').val(data.id);
      $('#date').val(data.tanggal);
      $('#qty').val(data.qty);
      console.log(data.id)
  })
});
</script>