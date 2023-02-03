@include('indah.layouts.header')
@include('indah.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
            <div class="form-group">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    
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
                <h3 class="card-title">Annual Report | <th>{{$tahun}}</td></h3>
                <br>
                <h3 class="card-title">Branch |  <td> {{$dataBranch->nama_branch}}</td></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>id</th>
                            <th>tgl_vote</th>
                            <th>rank</th>
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
                  <?php $no=1;?>
                  @foreach ($test2 as $key => $value)
                      <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['tgl_vote']}}</td>
                          <td scope="row">{{ $no }}</td>
                          <td>{{$value['nik']}}</td>
                          <td>{{$value['nama']}}</td>
                          <td>{{$value['bagian']}}</td>
                          <td>{{$value['like']}}</td>
                          <td>{{$value['dislike']}}</td>
                          <td>{{$value['total']}}</td>
                          <td>{{$value['bintang']}}</td>
                      </tr>    
                  <?php $no++ ;?>    
                  @endforeach  
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>id</th>
                            <th>tgl_vote</th>
                            <th>rank</th>
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
      "order":false,
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