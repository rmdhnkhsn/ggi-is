@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-1 col-4">
            <a href="{{ route('description_item.create', $data->id)}}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-plus"></i> Add new</a>
          </div>
          <div class="col-lg-1 col-4">
            <a href="{{ route('item_category.index', $data->buyer_id)}}" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Item </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ITEM [ {{$data->nama_item}} ]</h3>
              </div>
              <!-- /.card-header -->
              <input type="hidden" id="id_item" value="{{$data->id}}" >
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
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
@include('qc.sample.layouts.footer')
<script type="text/javascript">
  $(function () {
    var id = $('#id_item').val();
    var url = "{{ route('description_item.index',[':id']) }}";
    url=url.replace(':id',id);
    
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'description', name: 'description'},
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
</script>