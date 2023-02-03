@include('qc.reject_cutting.layouts.header')
@include('qc.reject_cutting.layouts.navbar')
<style>
  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

</style>
 <div class="content-wrapper f-poppins">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card-navigate">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
            <!-- <li class="breadcrumb-item"><a href="{{ route('hrga.index') }}" class="title-navigate">Dashboard</a></li> -->
            <li class="breadcrumb-item"><a href="{{ route('RejectCutting.index') }}" class="title-navigate">Quality Controll</a></li>
            <li class="breadcrumb-item title-navigate-active" aria-current="page"><span class="active">Reject Cutting</span></li>
            <li class="navigate-active ml-Rcutting"></li>
          </ol>
        </nav>
      </div>
    </div>

      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xl-2 col-sm-6">
              <span class="reject-cutting-tittle">Reject Cutting</span>
              </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Master Reject Cutting</h3>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Table</th>
                                            <th>WO</th>
                                            <th>Style</th>
                                            <th>Colour</th>
                                            <th>Total Ratio</th>
                                            <th>Qty gelar</th>
                                            <th>Qty Table</th>
                                            <th>Total Reject</th>
                                            <th>%Tase</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataMenuReject as $key => $value)
                                            <tr>
                                                <td>{{ $value['meja'] }}</td>
                                                <td>{{ $value['t_v4801c_doco'] }}</td>
                                                <td>{{ $value['style'] }}</td>
                                                <td>{{ $value['color'] }}</td>
                                                <td>{{ $value['total_ratio'] }}</td>
                                                <td>{{ $value['qty_gelar'] }}</td>
                                                <td>{{ $value['qty_check'] }}</td>
                                                <td>{{ $value['total_reject'] }}</td>
                                                <td>{{ $value['percentage'] }}</td>
                                                <td></td>
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Table</th>
                                                <th>WO</th>
                                                <th>Style</th>
                                                <th>Colour</th>
                                                <th>Total Ratio</th>
                                                <th>Qty gelar</th>
                                                <th>Qty Table</th>
                                                <th>Total Reject</th>
                                                <th>%Tase</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
</div>

@include('qc.reject_cutting.layouts.footer')
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

