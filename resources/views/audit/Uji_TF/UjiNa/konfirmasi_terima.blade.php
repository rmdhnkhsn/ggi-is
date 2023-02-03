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
                      <a href="{{ route('audittfp.diterima')}}">
                        <div>
                            <div class="label_abu">Konfirmasi Anomali FALSE Diterima</div>
                            <div class="container btn_abu"></div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-6 col-6">
                      <a href="{{ route('auditna.diterima')}}">
                        <div>
                            <div class="label_ijo">Konfirmasi Anomali #N/A Diterima</div>
                            <div class="container btn_ijo"></div>
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
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>GLPT</th>
                    <th>USER</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($records as $key => $dp)
                    <tr>
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
                          <a href="{{route('temuanna.kaudit', $dp['F4111_UKID'])}}" class="btn btn-primary btn-sm" title="edit">
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
                    <th>TR DATE</th>
                    <th>G-L DATE</th>
                    <th>LOT NUM</th>
                    <th>QUANTITY</th>
                    <th>UM</th>
                    <th>GLPT</th>
                    <th>USER</th>
                    <th>Action </th>
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
  $('body').on('click', '.editProduct', function (event) {

event.preventDefault();
  var F4111_UKID = $(this).data('F4111_UKID');
  $.get('edit/' + F4111_UKID , function (data) {
    $('#modal-edit').modal('show');
    $('#F4111_UKID').val(data.F4111_UKID);
    $('#name').val(data.buyer);
    $('#date').val(data.date);
    $('#ex_fact').val(data.ex_fact);
    $('#detail').val(data.no_po);
    console.log(data.no_po)
})
});
</script>
            