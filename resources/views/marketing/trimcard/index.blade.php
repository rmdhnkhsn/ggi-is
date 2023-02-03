@include('marketing.trimcard.layouts.header')
@include('marketing.trimcard.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <form action="{{ route('trimcard.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('marketing.trimcard.partials.form-edit', ['submit' => 'Save'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                    <button type="button" class="close" data-dismiss="alert">×</button>   
                    <center> 
                    <strong>{{ $message }}</strong>
                    </center>
                </div>
                @endif
                <form action="{{route('trimcard.get_wo')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <select class="form-control select2bs4" style="width: 100%;" name="no_wo" id="no_wo">
                      <option value="">Select WO Number</option>
                      @foreach($dataWo as $a)
                          <option>{{$a['no_wo']}}</option>
                      @endforeach
                  </select><br>
                  <button type="submit" class="btn btn-primary btn-sm col-lg-12"><i class="fas fa-users-cog"></i> GET</button>
                </form>
              </div>
            </div>
            @if ($message = Session::get('kodeerror'))
            <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <center> 
                <strong>{{ $message }}</strong>
                </center>
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Trim Card</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:5%;">NO_WO</th>
                            <th style="width:10%;">Agent</th>
                            <th style="width:15%;">Buyer</th>
                            <th style="width:13%;">Destination</th>
                            <th style="width:13%;">Prod_Desc</th>
                            <th style="width:13%;">Style</th>
                            <th style="width:8%;">Art</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>NO_WO</th>
                            <th>Agent</th>
                            <th>Buyer</th>
                            <th>Destination</th>
                            <th>Prod_Desc</th>
                            <th>Style</th>
                            <th>Art</th>
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
@include('marketing.trimcard.layouts.footer')
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: "{{ route('trimcard.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'no_wo', name: 'no_wo'},
            {data: 'agent', name: 'agent'},
            {data: 'buyer', name: 'buyer'},
            {data: 'destination', name: 'destination'},
            {data: 'prod_desc', name: 'prod_desc'},
            {data: 'style', name: 'style'},
            {data: 'art', name: 'art'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  $('body').on('click', '.editProduct', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $.get('edit/' + id , function (data) {
        $('#modal-edit').modal('show');
        $('#id').val(data.id);
        $('#agent').val(data.agent);
        $('#buyer').val(data.buyer);
        $('#destination').val(data.destination);
        $('#prod_desc').val(data.prod_desc);
        $('#style').val(data.style);
        $('#art').val(data.art);
        $('#colorway1').val(data.colorway1);
        $('#colorway2').val(data.colorway2);
        $('#colorway3').val(data.colorway3);
        $('#colorway4').val(data.colorway4);
        $('#colorway5').val(data.colorway5);
        $('#colorway6').val(data.colorway6);
        console.log(data.no_po)
    })
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
<script>
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>