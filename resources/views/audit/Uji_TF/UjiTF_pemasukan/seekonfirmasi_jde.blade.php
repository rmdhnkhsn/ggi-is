@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
<style>
.btn_abu {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #DBDBDB;
}
.btn_ijo {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #67C965;
}
.label_ijo{
    font-size: 18px;
    color: #67C965;
    text-align:center;
    font-weight:bold;
}
.label_abu{
    font-size: 18px;
    color: #DBDBDB;
    text-align:center;
    font-weight:bold;
}
</style>

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
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <a href="{{ route('audittfp.jde')}}">
                        <div>
                            <div class="label_ijo"> Anomali FALSE Diperbaiki JDE</div>
                            <div class="container btn_ijo"></div>
                        </div>
                    </a>
                  </div>
                  <div class="col-lg-6 col-6">
                    <a href="{{ route('auditna.jde')}}">
                        <div>
                            <div class="label_abu"> Anomali #N/A diperbaiki JDE</div>
                            <div class="container btn_abu"></div>
                        </div>
                    </a>
                  </div>
                </div>
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
                    <th>G-L Class</th>
                    <th>TR DATE Ledger</th>
                    <th>G-L DATE Pemasukan</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>NO DAFTAR</th>
                    <th>JENIS DOKUMEN</th>
                    <th>USER</th>
                    <th>UJI ITEM </th>
                    <th>UJI QTY</th>
                    <th>UJI UOM</th>
                    <th>UJI UNIT</th>
                    <th>UJI TGL TRANSAKSI </th>
                    <th>REMARK</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach ($records as $key => $value)
                    <tr>
                        <td>{{ $value['F564111C_UKID'] }}</td>
                        <td>{{ $value['F4111_ITM'] }}</td>
                        <td>{{ $value['F4111_DOCO'] }}</td>
                        <td>{{ $value['F4111_DOCO'] }}</td>
                        <td>{{ $value['F4111_PAID'] }}</td>
                        <td>{{ $value['F4111_MCU'] }}</td>
                        <td>{{ $value['F4111_DCT'] }}</td>
                        <td>{{ $value['F4111_GLPT'] }} </td>
                        <td>{{ $value['F4111_TRDJ'] }}</td>
                        <td>{{ $value['F564111C_DGL'] }} </td>
                        <td>{{ $value['F4111_LOTN'] }} </td>
                        <td>{{ $value['F4111_TRQT'] }} </td>
                        <td>{{ $value['F4111_TRUM'] }} </td>
                        <td>{{ $value['F564111C_DSCRP'] }} </td>
                        <td>{{ $value['F564111C_DSC1'] }} </td>
                        <td>{{ $value['F4111_USER'] }} </td>
                        <td>{{ $value['Uji_ITM'] }} </td>
                        <td>{{ $value['Uji_QTY'] }} </td>
                        <td>{{ $value['Uji_UOM'] }} </td>
                        <td>{{ $value['Uji_BRANCH'] }} </td>
                        <td>{{ $value['Uji_Tanggal_Trans_GL'] }} </td>
                        <th>{{ $value['remark'] }} </th>
                        <td>
                          <a href="{{route('temuantfp.kaudit', $value['F564111C_UKID'])}}" class="btn btn-primary btn-sm" title="edit" target="_blank">
                            <i class="fas fa-edit"></i></a>
                          </a>
                        </td>
                    </tr> 
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
                    <th>G-L Class</th>
                    <th>TR DATE Ledger</th>
                    <th>G-L DATE Pemasukan</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>NO DAFTAR</th>
                    <th>JENIS DOKUMEN</th>
                    <th>USER</th>
                    <th>UJI ITEM </th>
                    <th>UJI QTY</th>
                    <th>UJI UOM</th>
                    <th>UJI UNIT</th>
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
      dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: '{{$title}}'
            },
            {
                extend: 'pdfHtml5',
                title: '{{$title}}'
            }
        ]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", ]
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
            