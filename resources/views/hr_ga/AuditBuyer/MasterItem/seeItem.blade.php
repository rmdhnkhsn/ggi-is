@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush
@section("content")
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Item</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                @foreach ($ItemMaster as $key => $value)
                <?php $no++;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $value['item'] }}</td>
                        <td>
                          <a href="{{route('hr_ga.item.add_location',$value['id'])}}" class="btn btn-primary btn-sm" title="Location List">
                            <i class="fas fa-list"></i></a>
                          </a>
                        </td>
                    </tr>      
                @endforeach  
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
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
  <div class="modal fade" id="add_item1" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="title"></h4>
          </div>
        <div class="modal-body">
          <form name="custForm" action="{{route('hr_ga.itemmaster.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                  <label for="roll">Item Master</label>
                  <input type="text" class="form-control" id="item" name="item" required>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class=" btn btn-block btn-primary btn-sm">Submit</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@push("scripts")
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

<script>
    $(document).ready(function () {
  /* When click New customer button */
  $('#add_item').click(function () {
  $('#btn-save').val("create-item");
  $('#customer').trigger("reset");
  $('#title').html("Add Item");
  $('#add_item1').modal('show');
  });
  });
</script>
@endpush