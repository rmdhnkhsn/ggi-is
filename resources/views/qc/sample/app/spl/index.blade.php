@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
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
                <h3 class="card-title">Reports Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Buyer</th>
                            <th>Style</th>
                            <th>Status</th>
                            <th>Input_date</th>
                            <th>Detail</th>
                            <th>SPL</th>
                            <th>DEPT</th>
                            <th>SPV</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Buyer</th>
                            <th>Style</th>
                            <th>Status</th>
                            <th>Input_date</th>
                            <th>Detail</th>
                            <th>SPL</th>
                            <th>DEPT</th>
                            <th>SPV</th>
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
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('spl.report') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'buyer_name', name: 'buyer_name'},
            {data: 'style', name: 'style'},
            {data: 'status', name: 'status'},
            {data: 'date', name: 'date'},
            {data: 'detail', name: 'detail'},
            {data: 'spl_app', name: 'spl_app'},
            {data: 'dept_app', name: 'dept_app'},
            {data: 'spv_app', name: 'spv_app'}
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