@include('layouts.header')
@include('layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <div class="btn-group">
              <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
            </div>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>NO WO</th>
                            <th>2nd_Item</th>
                            <th>Description</th>
                            <th>NO_SO</th>
                            <th>Country | Color | Size</th>
                            <th>Order_Quantity</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach($finaldata as $fn)
                    <tr>
                      <td>{{$fn['no_wo']}}</td>
                      <td>{{$fn['second_item']}}</td>
                      <td>{{$fn['description']}}</td>
                      <td>{{$fn['no_so']}}</td>
                      <td>{{$fn['country']}}</td>
                      <td>{{$fn['order_quantity']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>NO WO</th>
                            <th>2nd_Item</th>
                            <th>Description</th>
                            <th>NO_SO</th>
                            <th>Country | Color | Size</th>
                            <th>Order_Quantity</th>
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
@include('layouts.footer')
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 25,
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