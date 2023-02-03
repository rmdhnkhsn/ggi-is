@include('indah.layouts.header')
@include('indah.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
            <div class="form-group">
                   
                
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
                <h3 class="card-title">Weekly Report |  <td>{{ $FirstDate}}</td> to <td>{{ $LastDate}}</td></h3>
                <br>
                <h3 class="card-title">Branch |  <td> {{$dataBranch->nama_branch}}</td></h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>Rank</th>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>✔</th>
                            <th>❌</th>
                            <th>Total</th>
                            <th>⭐</th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                @foreach ($test2 as $key => $value)
                <?php $no++;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $value['nik'] }}</td>
                        <td>{{ $value['nama'] }}</td>
                        <td>{{ $value['bagian'] }}</td>
                        <td>{{ $value['like'] }} </td>
                        <td>{{ $value['dislike'] }}</td>
                        <td>{{ $value['total'] }}</td>
                        <td>{{ $value['bintang'] }}</td>
                    </tr>
                                    
                @endforeach  
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>Rank</th>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>✔</th>
                            <th>❌</th>
                            <th>Total</th>
                            <th>⭐</th>
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
  @include('indah.layouts.footer')
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "order": [ 6, "desc" ],
      "pageLength": 25,
      "buttons": ["copy", "csv", "excel", "pdf", "print", ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
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