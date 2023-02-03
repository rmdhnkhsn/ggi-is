@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <div class="loader2">Loading..</div>
  </div> -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="preloader flex-column">
        <div class="body-skeleton">
          <div class="card-skeleton">
            <div class="header">
              <div class="details">
                <span class="name-1"></span>
                <span class="name-2"></span>
              </div>
            </div>

            <div class="Skeleton-table-head">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body1">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body2">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body3">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body4">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body5">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body6">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body7">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body8">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
          </div>
        </div>
      </div>  
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-judul text-center">Ledger VS IT INV NA </h3>
                  </div>
                </div>
                <h3 class="card-date text-center">{{$tgl_awal}} s/d {{$tgl_akhir}}</h3>
              </div>
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
                  @foreach ($records as $key => $dp)
                    
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
                            <a href="{{route('temuanna.konfir',$dp['F4111_UKID'])}}" class="btn btn-primary btn-sm" target="_blank">
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
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Ledger VS IT INV NA {{$tgl_awal}} s/d {{$tgl_akhir}}'
        },
        {
            extend: 'pdfHtml5',
            title: 'Ledger VS IT INV NA {{$tgl_awal}} s/d {{$tgl_akhir}}'
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
            