@include('Indah.layouts.header')
@include('Indah.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
         
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
                <h3 class="card-title">Schedule</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            
                            <th>Day</th>
                            <th>Person 1</th>
                            <th>Person 2</th>
                            <th>Person 3</th>
                            <th>Person 4</th>
                            <th>Person 5</th>
                            <th>Person 6</th>
                            <th>Person 7</th>
                            <th>Person 8</th>
                            <th>Person 9</th>
                            <th>Person 10</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                           
                             <th>Day</th>
                            <th>Person 1</th>
                            <th>Person 2</th>
                            <th>Person 3</th>
                            <th>Person 4</th>
                            <th>Person 5</th>
                            <th>Person 6</th>
                            <th>Person 7</th>
                            <th>Person 8</th>
                            <th>Person 9</th>
                            <th>Person 10</th>
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
@include('Indah.layouts.footer')
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('Jindah.index') }}",
        columns: [
            
            {data: 'hari', name: 'hari', orderable: false},
            {data: 'nama1', name: 'nama1', orderable: false},
            {data: 'nama2', name: 'nama2', orderable: false},
            {data: 'nama3', name: 'nama3', orderable: false},
            {data: 'nama4', name: 'nama4', orderable: false},
            {data: 'nama5', name: 'nama5', orderable: false},
            {data: 'nama6', name: 'nama6', orderable: false},
            {data: 'nama7', name: 'nama7', orderable: false},
            {data: 'nama8', name: 'nama8', orderable: false},
            {data: 'nama9', name: 'nama9', orderable: false},
            {data: 'nama10', name: 'nama10', orderable: false},
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