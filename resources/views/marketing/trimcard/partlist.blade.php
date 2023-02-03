@include('marketing.trimcard.layouts.header')
@include('marketing.trimcard.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">PartList [ WO - {{$no_wo}}]</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{route('trimcard.get', $no_wo)}}" method="post" enctype="multipart/form-data">
              @csrf
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width:120px">Item Number</th>
                    <th>Desc 1</th>
                    <th>Desc 2</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $value)
                  <tr>
                    <td>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="input_{{$value->F3111_CPIT}}" id="customCheckbox{{$value->F3111_CPIT}}" value="{{$value->F3111_CPIT}}">
                        <label for="customCheckbox{{$value->F3111_CPIT}}" class="custom-control-label">{{$value->F3111_CPIT}}</label>
                      </div>
                    </td>
                    <td>{{$value->F3111_DSC1}}</td>
                    <td>{{$value->F3111_DSC2}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Item Number</th>
                    <th >Desc 1</th>
                    <th>Desc 2</th>
                  </tr>
                </tfoot>
              </table>
              <br>
              <button type="submit" class="btn btn-primary btn-sm col-lg-12"><i class="fas fa-users-cog"></i> GET</button>
              </form>
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
@include('marketing.trimcard.layouts.footer')
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 10,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 0, "desc" ]]
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