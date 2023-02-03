@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>KEY</th>
                    <th>ITEM NUMBER</th>
                    <th>PO</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL PRICE</th>
                    <th>BUSINNES UNIT</th>
                    <th>DC TY</th>
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>G-L Class</th>
                    <th>User</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($records as $key => $value)
                    
                    @foreach($value as $dp)
                        <td>{{ $dp['F4111_UKID'] }}</td>
                        <td>{{ $dp['F4111_ITM'] }}</td>
                        <td>{{ $dp['F4111_DOCO'] }}</td>
                        <td>{{ $dp['F4111_UNCS'] }}</td>
                        <td>{{ $dp['F4111_PAID'] }}</td>
                        <td>{{ $dp['F4111_MCU'] }}</td>
                        <td>{{ $dp['F4111_DCT'] }}</td>
                        <td>{{ $dp['F4111_TRDJ'] }}</td>
                        <td>{{ $dp['F4111_DGL'] }} </td>
                        <td>{{ $dp['F4111_LOTN'] }} </td>
                        <td>{{ $dp['F4111_TRQT'] }} </td>
                        <td>{{ $dp['F4111_TRUM'] }} </td>
                        <td>{{ $dp['F4111_GLPT'] }} </td>
                        <td>{{ $dp['F4111_USER'] }} </td>
                        <td>
                          <div class="row">
                            <form action="{{route('temuanna.create',$dp['F4111_UKID'])}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" id="branch" name="branch" value="{{$branch}}">
                              <input type="hidden" id="gl_class" name="gl_class" value="{{$gl_class}}">
                              <input type="hidden" id="dc_ty" name="dc_ty" value="{{$dc_ty}}">
                              <input type="hidden" id="tgl_awal" name="tgl_awal" value="{{$tgl_awal}}">
                              <input type="hidden" id="tgl_akhir" name="tgl_akhir" value="{{$tgl_akhir}}">
                              <button type="submit" class="btn btn-warning btn-sm editProduct"><i class="fas fa-edit"></i></button>
                            </form>
                          </div>
                        </td>
                    </tr> 
                      @endforeach
                    @endforeach
                  </tbody>
                  <tfoot>
                  <th>KEY</th>
                  <th>ITEM NUMBER</th>
                  <th>PO</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL PRICE</th>
                    <th>BUSINNES UNIT</th>
                    <th>DC TY</th>
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>G-L Class</th>
                    <th>User</th>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
            