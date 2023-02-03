@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
            <a href="{{ route('user.gudang.create')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-plus"></i> Add New</a>
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
                <h3 class="card-title">Master User Gudang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username JDE</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                @foreach ($data as $key => $value)
                <?php $no++;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $value['nik'] }}</td>
                        <td>{{ $value['nama'] }}</td>
                        <td>{{ $value['username_jde'] }}</td>
                        <td>
                        <a href="{{route('user.gudang.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="fas fa-edit"></i></a>
                          </a>
                          <a href="{{route('user.gudang.delete', $value['id'])}}" class="btn btn-danger btn-sm" title="edit">
                          <i class="fas fa-trash"></i></a>
                          </a>
                          
                        </td>
                        
                    </tr>
                          
                @endforeach  
                  </tbody>
                  <tfoot>
                        <tr>
                        <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username JDE</th>
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
  @include('audit.Uji_TF.layouts.footer')
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 25,
             "responsive": true, "lengthChange": true, "autoWidth": false,
            
        } 
    );
} );
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>