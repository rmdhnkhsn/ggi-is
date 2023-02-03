@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-6">
            <a href="javascript:void(0)" class="btn btn-primary  btn-sm editProduct" data-id="" title="Search Line" data-toggle="modal" data-target="#modal-search"><i class="fas fa-search"></i> Cari Line</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.modal -->
    <div class="modal fade" id="modal-search">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cari WO</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="smallBody">
            <form action="{{ route('line.search')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>NO WO</label>
                <select class="form-control select2bs4" style="width: 100%;" name="no_wo" id="no_wo">
                  <option selected="selected">Pilih NO WO</option>
                  @foreach($wo as $key => $value)
                  <option value="{{$value->F4801_DOCO}}">{{$value->F4801_DOCO}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-block btn-primary btn-sm">Cari</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Line</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>Kode Line</th>
                            <th>Nama Line</th>
                            <th>Pabrik</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>Kode Line</th>
                            <th>Nama Line</th>
                            <th>Pabrik</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
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
    <!-- /.content -->
  </div>
@include('qc.reject_garment.layouts.footer')
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('line.index') }}",
        columns: [
            {data: 'string1', name: 'string1'},
            {data: 'string2', name: 'string2'},
            {data: 'branch', name: 'branch'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
  $('body').on('click', '.editProduct', function (event) {

event.preventDefault();
var id = $(this).data('id');
  $.get('edit/' + id , function (data) {
      $('#modal-edit').modal('show');
      $('#id').val(data.id);
      $('#kode').val(data.kode_box);
      $('#nama').val(data.nama_box);
      console.log(data.id)
  })
});
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>