@extends("layouts.app")
@section("title","Production")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush

@push("sidebar")
  @include('production.layouts.navbar')
@endpush

@section("content")
<section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
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
            <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">SIGNAL TOWER</h3>
            </div>
            <div class="table-responsive-sm">
              <center><h1 style="font-weight:bold;font-size:20px;">REPORT SIGNAL TOWER CUTING KE SEWING</h1></center>
              <table id="example1" class="display" cellspacing="0" width="100%" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Tanggal</td>
                    <td>Nama Line</td>
                    <td>Request Line</td>
                    <td>Respond Line</td>
                    <td>Lost Time</td>
                    <td>Proses</td>
                    <td>Proses End</td>
                    <td>Delivery</td>
                    <td>Delivery End</td>
                    <td>Total Waktu</td>
                    <td>Total Waktu Berakhir</td>
                    <td>PIC</td>
                    <td>Buyer</td>
                    <td>Style</td>
                    <td>WO</td>
                    <td>Size</td>
                    <td>Color</td>
                    <td>Target Perhari</td>
                    <td>Remark</td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script type="text/javascript">
  $(document).ready(function() {
    var strIconSearch = '<i class="fas fa-search"></i>';
	  var tableTitle = 'REPORT SIGNAL';
	  var tableSubTitle = 'REPORT SIGNAL TOWER CUTING KE SEWING';
    var table = $('#example1').DataTable({
      
      //  bSort: false,
        aoColumns: [ { sWidth: "45%" }, { sWidth: "45%" }, { sWidth: "10%", bSearchable: false, bSortable: false } ],
       "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
        scrollY:'50vh',
        scrollCollapse: true,
        processing: true,
        serverSide: true,
        
        // dom: "Bfrtip",
        ajax: "{{ route('prd.data') }}",
        columns: [
           {data: 'id', name: 'id'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'namaline', name: 'namaline'},
            {data: 'reqlin', name: 'reqlin'},
            {data: 'resline', name: 'resline'},
            {data: 'lostim', name: 'lostim'},
            {data: 'proses', name: 'proses'},
            {data: 'prosesend', name: 'prosesend'},
            {data: 'deli', name: 'deli'},
            {data: 'deliend', name: 'deliend'},
            {data: 'totwaktu', name: 'totwaktu'},
            {data: 'T_Lost_Time', name: 'T_Lost_Time'},
            {data: 'PIC', name: 'PIC'},
            {data: 'buyer', name: 'buyer'},
            {data: 'style', name: 'style'},
            {data: 'wo', name: 'wo'},
            {data: 'size', name: 'size'},
            {data: 'color', name: 'color'},
            {data: 'target_perday', name: 'target_perday'},
            {data: 'Remark', name: 'Remark'},            
        ]
    });
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    	$( divTitle ).prependTo( '#dtPluginExample_wrapper .row:eq(0)' );
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+tanggal+'" />' );
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

@endpush
