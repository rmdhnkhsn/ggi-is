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
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>KEY</th>
                    <th>ITEM NUMBER</th>
                    <th>BUSINNES UNIT</th>
                    <th>DC TY</th>
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>NO DAFTAR</th>
                    <th>JENIS DOKUMEN</th>
                    <th>UJI ITEM </th>
                    <th>UJI QTY</th>
                    <th>UJI UOM</th>
                    <th>UJI UNIT</th>
                    <th>UJI TGL DAFTAR </th>
                    <th>UJI TGL TRANSAKSI </th>
                    <th>REMARK</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach ($records as $key => $value)
                    <tr>
                        <td>{{ $value['F564111C_UKID'] }}</td>
                        <td>{{ $value['F564111C_ITM'] }}</td>
                        <td>{{ $value['F564111C_MCU'] }}</td>
                        <td>{{ $value['F564111C_DCT'] }}</td>
                        <td>{{ $value['F564111C_TRDJ'] }}</td>
                        <td>{{ $value['F564111C_DGL'] }} </td>
                        <td>{{ $value['F564111C_LOTN'] }} </td>
                        <td>{{ $value['F564111C_TRQT'] }} </td>
                        <td>{{ $value['F564111C_TRUM'] }} </td>
                        <td>{{ $value['F564111C_DSCRP'] }} </td>
                        <td>{{ $value['F564111C_DSC1'] }} </td>
                        <td>{{ $value['Uji_ITM'] }} </td>
                        <td>{{ $value['Uji_QTY'] }} </td>
                        <td>{{ $value['Uji_UOM'] }} </td>
                        <td>{{ $value['Uji_BRANCH'] }} </td>
                        <td>{{ $value['Uji_TGL_TRANS'] }} </td>
                        <td>{{ $value['Uji_TGL_DAFTAR'] }} </td>
                        <td>{{ $value['remark'] }} </td>
                        <td>
                          <a href="{{route('temuantf.kaudit', $value['F564111C_UKID'])}}" class="btn btn-primary btn-sm" title="edit">
                            <i class="fas fa-edit"></i></a>
                          </a>
                        </td>
                    </tr> 
                    @endforeach 
                  </tbody>
                  <tfoot>
                  <th>KEY</th>
                  <th>ITEM NUMBER</th>
                    <th>BUSINNES UNIT</th>
                    <th>DC TY</th>
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>NO DAFTAR</th>
                    <th>JENIS DOKUMEN</th>
                    <th>UJI ITEM </th>
                    <th>UJI QTY</th>
                    <th>UJI UOM</th>
                    <th>UJI UNIT</th>
                    <th>UJI TGL DAFTAR </th>
                    <th>UJI TGL TRANSAKSI </th>
                    <th>REMARK</th>
                    <th>ACTION</th>
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
            